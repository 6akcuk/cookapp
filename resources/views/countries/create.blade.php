@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ route('countries.index') }}">Список стран</a></li>
    <li class="active">Добавить страну</li>
  </ol>

  {!! Form::open(['route' => 'countries.store', 'class' => 'form-horizontal']) !!}
  @include('countries.form', ['submitButtonText' => 'Добавить страну'])
  {!! Form::close() !!}
@stop