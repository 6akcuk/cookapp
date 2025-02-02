<!-- Name Form Input -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  {!! Form::label('name', 'Имя пользователя:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Email Form Input -->
<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
  {!! Form::label('email', 'E-Mail:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Password Form Input -->
<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
  {!! Form::label('password', 'Пароль:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::password('password', ['class' => 'form-control']) !!}
    @if (isset($showPasswordHelpText))
      <span class="help-block">Чтобы изменить пароль пользователя, введите новый в данное поле.</span>
    @endif
    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Phone Form Input -->
<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
  {!! Form::label('phone', 'Номер телефона:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Roles Form Input -->
<div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
  {!! Form::label('role_list', 'Роли:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::select('role_list[]', $roles, null, ['multiple' => true, 'class' => 'form-control']) !!}
    {!! $errors->first('role_list', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
  </div>
</div>