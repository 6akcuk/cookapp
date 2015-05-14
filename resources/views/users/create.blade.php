@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ url('users') }}">Список пользователей</a></li>
    <li class="active">Добавить пользователя</li>
  </ol>

  {!! Form::open(['url' => 'users', 'class' => 'form-horizontal']) !!}
  @include('users.form', ['roles' => $roles, 'submitButtonText' => 'Добавить пользователя'])
  {!! Form::close() !!}
@stop

@section('javascript')
  $('select[name="role_list[]"]').select2();
@stop