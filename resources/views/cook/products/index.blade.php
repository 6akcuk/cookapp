@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li class="active">Список продуктов</li>
  </ol>

  @include('partials.admin_list_header', [
    'header' => 'Продукты',
    'total' => $productsTotal,
    'createRoute' => 'products.create',
    'createButtonText' => 'Добавить продукт'
  ])

  @include('partials.list_data', [
    'fields' => [
      'name' => 'Название',
    ],
    'data' => $products,
    'editRoute' => 'products.edit',
    'destroyRoute' => 'products.destroy',
    'emptyText' => 'Продукты не найдены.',
    'confirmDeleteText' => 'Вы хотите удалить продукт?'
  ])
@stop