{!! Form::open(['onsubmit' => 'return confirm("'. $confirmDeleteText .'")', 'class' => 'form-inline', 'method' => 'DELETE', 'route' => [$destroyRoute, $model]]) !!}
  {!! link_to_route($editRoute, 'Редактировать', $model, ['class' => 'btn btn-info']) !!}
  {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}