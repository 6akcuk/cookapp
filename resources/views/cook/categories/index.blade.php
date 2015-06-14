@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li class="active">Список категорий</li>
  </ol>

  @include('partials.admin_list_header', [
    'header' => 'Категории',
    'total' => $categoriesTotal,
    'createRoute' => 'categories.create',
    'createButtonText' => 'Добавить категорию'
  ])

  @include('partials.list_data', [
    'fields' => [
      'name' => 'Название',
      'product_type' => [
        'label' => 'Тип категории',
        'value' => 'set',
        'set' => config('cook.product_types_list')
      ]
    ],
    'data' => $categories,
    'editRoute' => 'categories.edit',
    'destroyRoute' => 'categories.destroy',
    'emptyText' => 'Категории не найдены.',
    'confirmDeleteText' => 'Вы хотите удалить категорию?'
  ])
@stop