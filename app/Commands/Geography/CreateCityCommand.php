<?php namespace App\Commands\Geography;

use App\Commands\Command;

use App\Models\Geography\City;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateCityCommand extends Command implements SelfHandling {

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
   * @param $name
   * @param $country_id
   * @param $phonecode
   */
	public function __construct($name, $country_id, $phonecode)
	{
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
		City::create([
      'name' => $this->name,
      'country_id' => $this->country_id,
      'phonecode' => $this->phonecode
    ]);
	}

}
