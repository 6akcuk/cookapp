<?php namespace App\Commands\Geography;

use App\Commands\Command;

use App\Models\Geography\City;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateCityCommand extends Command implements SelfHandling {

  /**
   * @var
   */
  private $id;

  /**
   * @var
   */
  private $name;

  /**
   * @var
   */
  private $country_id;

  /**
   * @var
   */
  private $phonecode;

  /**
   * Create a new command instance.
   *
   * @param $id
   * @param $name
   * @param $country_id
   * @param $phonecode
   */
	public function __construct($id, $name, $country_id, $phonecode)
	{
		//
    $this->id = $id;
    $this->name = $name;
    $this->country_id = $country_id;
    $this->phonecode = $phonecode;
  }

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$city = City::findOrFail($this->id);
    $city->update([
      'name' => $this->name,
      'country_id' => $this->country_id,
      'phonecode' => $this->phonecode
    ]);
	}

}
