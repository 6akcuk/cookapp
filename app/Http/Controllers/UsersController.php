<?php namespace App\Http\Controllers;

use App\Models\Authority\Role;
use App\Commands\CreateUserCommand;
use App\Commands\UpdateUserCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller {

  public function __construct() {
    $this->loadAndAuthorizeResource(['class' => 'App\Models\User']);
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $users = User::latest()->paginate(20);
    $usersTotal = User::count();

    return view('users.index', compact('users', 'usersTotal'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    $roles = Role::lists('name', 'id');
		return view('users.create', compact('roles'));
	}

  /**
   * Store a newly created resource in storage.
   *
   * @param CreateUserRequest $request
   * @return Response
   */
	public function store(CreateUserRequest $request)
	{
		$this->dispatchFrom(CreateUserCommand::class, $request);

    flash()->success('Пользователь успешно добавлен.');
    return redirect('users');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
    $roles = Role::lists('name', 'id');
    return view('users.edit', compact('user', 'roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UpdateUserRequest $request)
	{
    $this->dispatchFrom(UpdateUserCommand::class, $request, compact('id'));

    flash()->success('Изменения успешно сохранены.');
    return redirect('users');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
    $user->delete();

    flash()->success('Пользователь удален.');
    return redirect('users');
	}

}
