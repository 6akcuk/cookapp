@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ url('/roles') }}">Список ролей</a></li>
    <li class="active">Редактировать роль</li>
  </ol>

  {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
    @include('roles.form', ['submitButtonText' => 'Сохранить изменения'])
  {!! Form::close() !!}
@stop