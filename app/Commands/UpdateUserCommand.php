<?php namespace App\Commands;

use App\Commands\Command;

use App\Models\User;
use Hash;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateUserCommand extends Command implements SelfHandling {

  /**
   * @var
   */
  private $name;

  /**
   * @var
   */
  private $email;

  /**
   * @var
   */
  private $phone;

  /**
   * @var
   */
  private $password;

  /**
   * @var array
   */
  private $role_list;
  /**
   * @var
   */
  private $id;

  /**
   * Create a new command instance.
   *
   * @param $id
   * @param $name
   * @param $email
   * @param $phone
   * @param $password
   * @param array $role_list
   * @internal param User $user
   */
	public function __construct($id, $name, $email, $phone, $password, $role_list = array())
	{
    $this->name = $name;
    $this->email = $email;
    $this->phone = $phone;
    $this->password = $password;
    $this->role_list = $role_list;
    $this->id = $id;
  }

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
    $update = [
      'name' => $this->name,
      'email' => $this->email,
      'phone' => $this->phone
    ];

    if ($this->password)
      $update['password'] = Hash::make($this->password);

    $user = User::findOrFail($this->id);
		$user->update($update);
    $user->roles()->sync($this->role_list);
	}

}
