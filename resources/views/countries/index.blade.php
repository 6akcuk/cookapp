@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li class="active">Список стран</li>
  </ol>

  @include('partials.admin_list_header', [
    'header' => 'Страны',
    'total' => $countriesTotal,
    'createRoute' => 'countries.create',
    'createButtonText' => 'Добавить страну'
  ])

  @include('partials.list_data', [
    'fields' => [
      'name' => 'Название',
      'phonecode' => 'Код страны'
    ],
    'data' => $countries,
    'editRoute' => 'countries.edit',
    'destroyRoute' => 'countries.destroy',
    'emptyText' => 'Страны не найдены.',
    'confirmDeleteText' => 'Вы хотите удалить страну?'
  ])
@stop