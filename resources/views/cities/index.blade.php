@extends('app')

@section('content')
  <ol class="breadcrumb">
    <li class="active">Список городов</li>
  </ol>

  @include('partials.admin_list_header', [
    'header' => 'Города',
    'total' => $citiesTotal,
    'createRoute' => 'cities.create',
    'createButtonText' => 'Добавить город'
  ])

  @include('partials.list_data', [
    'fields' => [
      'name' => 'Название',
      'country' => [
        'label' => 'Страна',
        'value' => 'rel'
      ],
      'phonecode' => 'Код города'
    ],
    'data' => $cities,
    'editRoute' => 'cities.edit',
    'destroyRoute' => 'cities.destroy',
    'emptyText' => 'Города не найдены.',
    'confirmDeleteText' => 'Вы хотите удалить город?'
  ])
@stop