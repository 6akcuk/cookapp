@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{ route('products.index') }}">Список продуктов</a></li>
    <li><a href="{{ route('products.edit', $product) }}">Редактирование {{ $product->name }}</a></li>
    <li class="active">Виды обработки</li>
  </ol>

  @include('partials.admin_list_header', [
    'header' => 'Виды обработки',
    'total' => $processesTotal,
    'createRoute' => ['processes.create', $product],
    'createButtonText' => 'Добавить вид обработки'
  ])

  @include('partials.list_data', [
    'fields' => [
      'name' => 'Название',
      'coldproc' => 'Холодная обработка',
      'hotproc' => 'Тепловая обработка',
      'finalproc' => 'Окончательная обработка',
      'protein' => 'Потери белков',
      'grease' => 'Потери жиров',
      'ch' => 'Потери углеводов',
      'is_default' => [
        'label' => 'По умолчанию',
        'value' => 'boolean'
      ]
    ],
    'data' => $processes,
    'editRoute' => 'processes.edit',
    'destroyRoute' => 'processes.destroy',
    'emptyText' => 'Виды обработки не найдены.',
    'confirmDeleteText' => 'Вы хотите удалить вид обработки?'
  ])
@stop