@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li class="active">Список ролей</li>
  </ol>

  @include('partials.admin_list_header', [
    'header' => 'Роли',
    'total' => $rolesTotal,
    'createRoute' => 'roles.create',
    'createButtonText' => 'Создать роль'
  ])

  @include('partials.list_data', [
    'fields' => [
      'name' => 'Название'
    ],
    'data' => $roles,
    'editRoute' => 'roles.edit',
    'destroyRoute' => 'roles.destroy',
    'emptyText' => 'Роли не найдены.',
    'confirmDeleteText' => 'Вы хотите удалить роль?'
  ])
@stop