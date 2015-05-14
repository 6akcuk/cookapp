<table class="table table-striped">
  <thead>
  <tr>
    @foreach ($fields as $field => $label)
      <th>{{ is_array($label) ? $label['label'] : $label }}</th>
    @endforeach
    <th></th>
  </tr>
  </thead>
  <tbody>
  @if ($data->count())
    @foreach ($data as $obj)
      <tr>
        @foreach ($fields as $field => $conf)
          <?php
            // Defaults
            $conf = is_array($conf) ? $conf : [];

            if (!isset($conf['escape'])) $conf['escape'] = true;
            if (!isset($conf['value'])) $conf['value'] = 'raw';

            if ($conf['value'] == 'lists') {
              if (!isset($conf['list_value'])) $conf['list_value'] = 'name';
            }
            // End of defaults

            if ($conf['value'] == 'raw') $value = $obj->$field;
            elseif ($conf['value'] == 'lists') {
              $value = !isset($conf['list_key']) ? $obj->$field->lists($conf['list_value']) : $obj->$field->lists($conf['list_value'], $conf['list_key']);

              if (isset($conf['filter'])) $value = $conf['filter']($value);
              else $value = implode(', ', $value);
            }
            elseif ($conf['value'] == 'rel') {
              $value = !isset($conf['rel_key']) ? $obj->$field->name : $obj->$field->$conf['rel_key'];
            }
          ?>

          @if ($conf['escape'])
            <td>{{ $value }}</td>
          @else
            <td>{!! $value !!}</td>
          @endif
        @endforeach
        <td>
          @include('partials.list_buttons', ['editRoute' => $editRoute, 'destroyRoute' => $destroyRoute, 'model' => $obj, 'confirmDeleteText' => $confirmDeleteText])
        </td>
      </tr>
    @endforeach
  @else
    <td colspan="{{ count($fields) + 1 }}">
      {{ $emptyText }}
    </td>
  @endif
  </tbody>
</table>

{!! method_exists($data, 'render') ? $data->render() : null !!}