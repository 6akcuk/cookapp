@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ route('countries.index') }}">Список стран</a></li>
    <li class="active">Редактировать страну</li>
  </ol>

  {!! Form::model($country, ['route' => ['countries.update', $country], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
  @include('countries.form', ['submitButtonText' => 'Сохранить изменения'])
  {!! Form::close() !!}
@stop