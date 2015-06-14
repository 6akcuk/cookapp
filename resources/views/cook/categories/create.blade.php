@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ route('categories.index') }}">Список категорий</a></li>
    <li class="active">Добавить категорию</li>
  </ol>

  {!! Form::open(['route' => 'categories.store', 'class' => 'form-horizontal']) !!}
  @include('cook.categories.form', [
    'submitButtonText' => 'Добавить категорию',
    'categoriesList' => $categoriesList,
    'productTypesList' => $productTypesList
  ])
  {!! Form::close() !!}
@stop

@section('javascript')
  $('select[name="parent_id"]').select2();
  $('select[name="product_type"]').select2();
@stop