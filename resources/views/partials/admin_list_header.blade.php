<div class="clearfix">
  <span class="pull-left admin-list-counter-header">{{ $header }} <span class="admin-list-counter">{{ $total }}</span></span>
  <a href="{{ is_array($createRoute) ? route($createRoute[0], $createRoute[1]) : route($createRoute) }}" class="btn btn-primary pull-right">
    {{ $createButtonText }}
  </a>
</div>
