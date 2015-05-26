<?php namespace App\Commands;

use App\Commands\Command;

use App\Models\User;
use Hash;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateUserCommand extends Command implements SelfHandling {

  /**
   * @var
   */
  private $email;

  /**
   * @var
   */
  private $password;

  /**
   * @var
   */
  private $phone;

  /**
   * @var
   */
  private $name;

  /**
   * @var array
   */
  private $role_list;

  /**
   * Create a new command instance.
   *
   * @param $name
   * @param $email
   * @param $password
   * @param $phone
   * @param array $role_list
   */
	public function __construct($name, $email, $password, $phone, $role_list = array())
	{
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->phone = $phone;
    $this->role_list = $role_list;
  }

	/**
	 * Execute the command.
	 *
	 * @return User
	 */
	public function handle()
	{
		$user = User::create([
      'name' => $this->name,
      'email' => $this->email,
      'password' => Hash::make($this->password),
      'phone' => $this->phone
    ]);

    $user->roles()->sync($this->role_list);

    return $user;
	}

}
