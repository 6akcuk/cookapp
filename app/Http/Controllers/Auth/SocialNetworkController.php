<?php namespace App\Http\Controllers\Auth;

use App\Commands\CreateUserCommand;
use App\Commands\Geography\CreateCityCommand;
use App\Commands\Geography\CreateCountryCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\Geography\CityRequest;
use App\Http\Requests\Geography\CountryRequest;
use App\Models\Geography\City;
use App\Models\Geography\Country;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SocialNetworkController extends Controller {

  /**
   * Проверить наличие страны и города в базе и вернуть их модели.
   *
   * @param $country
   * @param $city
   * @return array[Country, City]
   */
  protected function _checkCountryAndCity($country, $city) {
    // Если указана страна, проверим ее наличие в базе.
    $countryModel = Country::where('name', $country)->first();
    if (!$countryModel) {
      // Страна не найдена, добавим ее в базу.
      $countryModel = $this->dispatch(new CreateCountryCommand($country, '13'));
    }

    $cityModel = City::where('name', $city)->where('country_id', $countryModel->id)->first();
    if (!$cityModel) {
      // Город не найден, добавим его в базу.
      $cityModel = $this->dispatch(new CreateCityCommand($city, $countryModel->id, '13'));
    }

    return [$countryModel, $cityModel];
  }

  public function vk() {
    $code = Input::get('code');
    $error = Input::get('error');
    $error_description = Input::get('error_description');

    if ($code) {
      $client = new \GuzzleHttp\Client();
      $response = $client->get('https://oauth.vk.com/access_token?client_id='. config('auth.vk')['app_id'] .'&client_secret='. config('auth.vk')['secret_key'] .'&code='. $code .'&redirect_uri='. config('auth.vk')['redirect_uri'])->json();

      if ($response['access_token']) {
        /**
         * @var $email
         * @var $user_id
         * @var $access_token
         * @var $secret
         */
        extract($response);

        $method = "/method/users.get?user_id=$user_id&fields=city,country,photo_50,photo_100,photo_200,photo_200_orig&v=". config('auth.vk')['version'] ."&access_token=$access_token";
        $sig = md5($method . $secret);
        $user = $client->get("https://api.vk.com$method&sig=$sig")->json()['response'][0];

        list($country, $city) = $this->_checkCountryAndCity($user['country']['title'], $user['city']['title']);

        $model = User::where('email', $email)->first();
        if (!$model) {
          $name = $user['first_name'] .' '. $user['last_name'];
          $password = 'vk'. $user_id .'_'. rand(1000000, 9999999);

          $model = $this->dispatch(new CreateUserCommand($name, $email, $password, ''));
        }

        $model->update([
          'social_network' => 'vk',
          'social_id' => $user_id,
          'photo' => json_encode([
            'photo_50' => $user['photo_50'],
            'photo_100' => $user['photo_100'],
            'photo_200' => $user['photo_200'],
            'photo_200_orig' => $user['photo_200_orig']
          ]),
          'city_id' => $city->id
        ]);

        Auth::login($model);

        return redirect()->intended();
      }
    }

    flash()->error($error_description ?: 'Ошибка связи с сервером ВКонтакте.');

    return redirect('/auth/login');
  }
}
