@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ route('products.index') }}">Список продуктов</a></li>
    <li class="active">Добавить продукт</li>
  </ol>

  {!! Form::open(['route' => 'products.store', 'class' => 'form-horizontal']) !!}
  @include('cook.products.form', [
    'submitButtonText' => 'Добавить продукт'
  ])
  {!! Form::close() !!}
@stop

@section('javascript')
  $('select[name="category_id"]').select2();
  $('select[name="product_type"]').select2();
@stop