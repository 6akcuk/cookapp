@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li class="active">Список пользователей</li>
  </ol>

  @include('partials.admin_list_header', [
    'header' => 'Пользователи',
    'total' => $usersTotal,
    'createRoute' => 'users.create',
    'createButtonText' => 'Добавить пользователя'
  ])

  @include('partials.list_data', [
    'fields' => [
      'name' => ['label' => 'Имя'],
      'email' => ['label' => 'E-Mail'],
      'roles' => [
        'label' => 'Роли',
        'value' => 'lists'
      ],
      'phone' => ['label' => 'Номер телефона']
    ],
    'data' => $users,
    'editRoute' => 'users.edit',
    'destroyRoute' => 'users.destroy',
    'emptyText' => 'Пользователи не найдены.',
    'confirmDeleteText' => 'Вы хотите удалить пользователя?'
  ])

  {!! $users->render() !!}
@stop