<!-- Название Form Input -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  {!! Form::label('name', 'Название:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Холодная обработка Form Input -->
<div class="form-group {{ $errors->has('coldproc') ? 'has-error' : '' }}">
  {!! Form::label('coldproc', 'Холодная обработка:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::text('coldproc', null, ['class' => 'form-control']) !!}
    {!! $errors->first('coldproc', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Тепловая обработка Form Input -->
<div class="form-group {{ $errors->has('hotproc') ? 'has-error' : '' }}">
  {!! Form::label('hotproc', 'Тепловая обработка:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::text('hotproc', null, ['class' => 'form-control']) !!}
    {!! $errors->first('hotproc', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Окончательная обработка Form Input -->
<div class="form-group {{ $errors->has('finalproc') ? 'has-error' : '' }}">
  {!! Form::label('finalproc', 'Окончательная обработка:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::text('finalproc', null, ['class' => 'form-control']) !!}
    {!! $errors->first('finalproc', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Потери белков Form Input -->
<div class="form-group {{ $errors->has('protein') ? 'has-error' : '' }}">
  {!! Form::label('protein', 'Потери белков:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::text('protein', null, ['class' => 'form-control']) !!}
    {!! $errors->first('protein', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Потери жиров Form Input -->
<div class="form-group {{ $errors->has('grease') ? 'has-error' : '' }}">
  {!! Form::label('grease', 'Потери жиров:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::text('grease', null, ['class' => 'form-control']) !!}
    {!! $errors->first('grease', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Потери углеводов Form Input -->
<div class="form-group {{ $errors->has('ch') ? 'has-error' : '' }}">
  {!! Form::label('ch', 'Потери углеводов:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::text('ch', null, ['class' => 'form-control']) !!}
    {!! $errors->first('ch', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('is_default') ? 'has-error' : '' }}">
  <div class="col-sm-10 col-sm-offset-2">
    <label class="control-label">
      {!! Form::checkbox('is_default') !!} По умолчанию
    </label>
    {!! $errors->first('is_default', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
  </div>
</div>