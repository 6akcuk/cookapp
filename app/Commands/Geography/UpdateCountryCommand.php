<?php namespace App\Commands\Geography;

use App\Commands\Command;

use App\Models\Geography\Country;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateCountryCommand extends Command implements SelfHandling {

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
  private $phonecode;

  /**
   * Create a new command instance.
   *
   * @param $id
   * @param $name
   * @param $phonecode
   */
	public function __construct($id, $name, $phonecode)
	{
    $this->id = $id;
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
		$country = Country::findOrFail($this->id);
    $country->update([
      'name' => $this->name,
      'phonecode' => $this->phonecode
    ]);
	}

}
