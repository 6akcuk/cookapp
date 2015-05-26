@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Авторизация</div>
				<div class="panel-body" ng-controller="AuthCtrl">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

          <div class="auth-social-group">
            <div class="text-center">
              Авторизация через социальные сети:
            </div>

            <div class="auth-social-network">
              <a ng-click="openVK('https://oauth.vk.com/authorize?client_id={{ config('auth.vk')['app_id'] }}&scope={{ config('auth.vk')['scope'] }}&redirect_uri={{ config('auth.vk')['redirect_uri'] }}&response_type=code&v={{ config('auth.vk')['version'] }}&state=&display=popup')" class="icon vk">&nbsp;</a>
            </div>
          </div>

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Пароль</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Запомнить меня
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Войти</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Забыли пароль?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
