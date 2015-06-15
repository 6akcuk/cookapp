@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ route('categories.index') }}">Список категорий</a></li>
    <li class="active">Редактировать категорию</li>
  </ol>

  {!! Form::model($category, ['route' => ['categories.update', $category], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
  @include('cook.categories.form', [
    'submitButtonText' => 'Сохранить изменения'
  ])
  {!! Form::close() !!}
@stop

@section('javascript')
  $('select[name="parent_id"]').select2();
  $('select[name="product_type"]').select2();
@stop