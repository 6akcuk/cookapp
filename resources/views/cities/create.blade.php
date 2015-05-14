@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ route('cities.index') }}">Список городов</a></li>
    <li class="active">Добавить город</li>
  </ol>

  {!! Form::open(['route' => 'cities.store', 'class' => 'form-horizontal']) !!}
  @include('cities.form', ['submitButtonText' => 'Добавить город'])
  {!! Form::close() !!}
@stop