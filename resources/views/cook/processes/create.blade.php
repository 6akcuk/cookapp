@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ route('products.index') }}">Список продуктов</a></li>
    <li><a href="{{ route('products.edit', $product) }}">Редактирование {{ $product->name }}</a></li>
    <li><a href="{{ route('processes.index', $product) }}">Виды обработки</a></li>
    <li class="active">Добавить вид обработки</li>
  </ol>

  {!! Form::open(['route' => ['processes.store', $product], 'class' => 'form-horizontal']) !!}
  @include('cook.processes.form', [
    'submitButtonText' => 'Добавить вид обработки'
  ])
  {!! Form::close() !!}
@stop