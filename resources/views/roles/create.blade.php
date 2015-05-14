@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ url('/roles') }}">Список ролей</a></li>
    <li class="active">Создать роль</li>
  </ol>

  {!! Form::open(['url' => 'roles', 'class' => 'form-horizontal']) !!}
    @include('roles.form', ['submitButtonText' => 'Создать роль'])
  {!! Form::close() !!}
@stop