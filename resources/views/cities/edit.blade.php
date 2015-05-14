@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ route('cities.index') }}">Список городов</a></li>
    <li class="active">Редактировать город</li>
  </ol>

  {!! Form::model($city, ['route' => ['cities.update', $city], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
  @include('cities.form', ['submitButtonText' => 'Сохранить изменения'])
  {!! Form::close() !!}
@stop