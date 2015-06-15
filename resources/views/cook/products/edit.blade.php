@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ route('products.index') }}">Список продуктов</a></li>
    <li class="active">Редактировать продукт</li>
  </ol>

  {!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
  @include('cook.products.form', [
    'submitButtonText' => 'Сохранить изменения'
  ])
  {!! Form::close() !!}
@stop

@section('javascript')
  $('select[name="category_id"]').select2();
  $('select[name="product_type"]').select2();
@stop