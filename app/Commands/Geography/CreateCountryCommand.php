<?php namespace App\Commands\Geography;

use App\Commands\Command;

use App\Models\Geography\Country;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateCountryCommand extends Command implements SelfHandling {

  /**
   * @var
   */
  private $name;

  /**
   * @var
   */
  private $phonecode;

  /**
   * Create a new command instance.
   *
   * @param $name
   * @param $phonecode
   */
	public function __construct($name, $phonecode)
	{
    $this->name = $name;
    $this->phonecode = $phonecode;
  }

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		Country::create([
      'name' => $this->name,
      'phonecode' => $this->phonecode
    ]);
	}

}
