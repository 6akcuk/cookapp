@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ url('users') }}">Список пользователей</a></li>
    <li class="active">Редактировать пользователя</li>
  </ol>

  {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
  @include('users.form', ['roles' => $roles, 'showPasswordHelpText' => true, 'submitButtonText' => 'Сохранить изменения'])
  {!! Form::close() !!}
@stop

@section('javascript')
  $('select[name="role_list[]"]').select2();
@stop