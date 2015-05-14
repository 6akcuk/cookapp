<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

  use SoftDeletes;

  protected $dates = ['deleted_at'];

  /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'phone'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


  /**
   * Получить список ролей пользователя.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function roles()
  {
    return $this->belongsToMany('App\Models\Authority\Role');
  }

  /**
   * Получить список идентификаторов ролей текущего пользователя.
   *
   * @return array
   */
  public function getRoleListAttribute() {
    return $this->roles->lists('id');
  }

  /**
   * Получить список разрешений для пользователя.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function permissions()
  {
    return $this->hasMany('App\Models\Authority\Permission');
  }

  /**
   * Проверить, принадлежит ли роль пользователю.
   *
   * @param $key
   * @return bool
   */
  public function hasRole($key)
  {
    $hasRole = false;
    foreach ($this->roles as $role) {
      if ($role->name === $key) {
        $hasRole = true;
        break;
      }
    }

    return $hasRole;
  }

}
