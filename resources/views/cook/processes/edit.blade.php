@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ route('products.index') }}">Список продуктов</a></li>
    <li><a href="{{ route('products.edit', $product) }}">Редактирование {{ $product->name }}</a></li>
    <li><a href="{{ route('processes.index', $product) }}">Виды обработки</a></li>
    <li class="active">Редактировать вид обработки</li>
  </ol>

  {!! Form::model($process, ['route' => ['processes.update', $process], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
  @include('cook.processes.form', [
    'submitButtonText' => 'Сохранить'
  ])
  {!! Form::close() !!}
@stop