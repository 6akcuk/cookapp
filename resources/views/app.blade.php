<!DOCTYPE html>
<html lang="en" ng-app="cookApp">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>

  <base href="/">

  <link href="{{ elixir('css/all.css') }}" rel="stylesheet">

  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CookApp</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ url('/') }}">Главная</a></li>
        @if (Authority::can('manage', 'App\Models\User') || Authority::can('manage', 'App\Models\Authority\Role'))
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Пользователи <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('/roles') }}">Роли</a></li>
            <li><a href="{{ url('/users') }}">Пользователи</a></li>
          </ul>
        </li>
        @endif
        @if (Authority::can('manage', 'App\Models\Geography\Country') || Authority::can('manage', 'App\Models\Geography\City'))
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">География <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('countries') }}">Страны</a></li>
            <li><a href="{{ url('cities') }}">Города</a></li>
          </ul>
        </li>
        @endif
        @if (Authority::can('manage', 'App\Models\Cook\Category'))
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Кулинария <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('categories') }}">Категории</a></li>
            <li><a href="{{ url('products') }}">Продукты</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('nomenclature') }}">Номенклатура</a></li>
          </ul>
        </li>
        @endif
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
          <li><a href="{{ url('/auth/login') }}">Вход</a></li>
          <li><a href="{{ url('/auth/register') }}">Регистрация</a></li>
        @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/auth/logout') }}">Выход</a></li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  @include('flash::message')

  @yield('content')
</div>

<!-- Scripts -->
<script type="text/javascript" src="{{ elixir('js/all.js') }}"></script>

<script>
  $('#flash-overlay-modal').modal();

  @yield('javascript')
</script>
</body>
</html>
