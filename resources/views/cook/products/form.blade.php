<!-- Название Form Input -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  {!! Form::label('name', 'Название:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Категория Form Input -->
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
  {!! Form::label('category_id', 'Категория:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::select('category_id', $categoriesList, null, ['class' => 'form-control']) !!}
    {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Тип продукта Form Input -->
<div class="form-group {{ $errors->has('product_type') ? 'has-error' : '' }}">
  {!! Form::label('product_type', 'Тип продукта:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::select('product_type', $productTypesList, null, ['class' => 'form-control']) !!}
    {!! $errors->first('product_type', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    <div class="row">
      <div class="col-sm-3 {{ $errors->has('unit') ? 'has-error' : '' }}">
        {!! Form::label('unit', 'Единица измерения') !!}
        <div class="input-group">
          {!! Form::select('unit', array_combine($unitsList, $unitsList), null, ['class' => 'form-control']) !!}
          {!! $errors->first('unit', '<span class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="col-sm-3 {{ $errors->has('gramm') ? 'has-error' : '' }}">
        {!! Form::label('gramm', 'Граммов в единице') !!}
        <div class="input-group">
          {!! Form::text('gramm', null, ['class' => 'form-control']) !!}
          {!! $errors->first('gramm', '<span class="help-block">:message</span>') !!}
        </div>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    <div class="form-header">Содержание пищевых веществ в граммах на 100 грамм продукта</div>
    <div class="row">
      <div class="col-sm-3">
        {!! Form::label('protein', 'Белки') !!}
        <div class="input-group">
          {!! Form::text('protein', null, ['class' => 'form-control']) !!}
          <div class="input-group-addon">г</div>
        </div>
        {!! $errors->first('protein', '<span class="help-block">:message</span>') !!}
      </div>
      <div class="col-sm-3">
        {!! Form::label('grease', 'Жиры') !!}
        <div class="input-group">
          {!! Form::text('grease', null, ['class' => 'form-control']) !!}
          <div class="input-group-addon">г</div>
        </div>
        {!! $errors->first('grease', '<span class="help-block">:message</span>') !!}
      </div>
      <div class="col-sm-3">
        {!! Form::label('ch', 'Углеводы') !!}
        <div class="input-group">
          {!! Form::text('ch', null, ['class' => 'form-control']) !!}
          <div class="input-group-addon">г</div>
        </div>
        {!! $errors->first('ch', '<span class="help-block">:message</span>') !!}
      </div>
      <div class="col-sm-3">
        {!! Form::label('dry', 'Сухие вещества') !!}
        <div class="input-group">
          {!! Form::text('dry', null, ['class' => 'form-control']) !!}
          <div class="input-group-addon">г</div>
        </div>
        {!! $errors->first('dry', '<span class="help-block">:message</span>') !!}
      </div>
    </div>
    <div class="row" style="margin-top: 10px">
      <div class="col-sm-4" style="margin-top: 20px">
        {!! Form::label('sugar', 'Сахароза') !!}
        <div class="input-group">
          {!! Form::text('sugar', null, ['class' => 'form-control']) !!}
          <div class="input-group-addon">г</div>
        </div>
        {!! $errors->first('sugar', '<span class="help-block">:message</span>') !!}
      </div>
      <div class="col-sm-4">
        {!! Form::label('fat', 'Жир (указывается для основных жиросодержащих продуктов)') !!}
        <div class="input-group">
          {!! Form::text('fat', null, ['class' => 'form-control']) !!}
          <div class="input-group-addon">масс. доля</div>
        </div>
        {!! $errors->first('fat', '<span class="help-block">:message</span>') !!}
      </div>
      <div class="col-sm-4" style="margin-top: 20px">
        {!! Form::label('alco', 'Спирт этиловый') !!}
        <div class="input-group">
          {!! Form::text('alco', null, ['class' => 'form-control']) !!}
          <div class="input-group-addon">г/100 мл</div>
        </div>
        {!! $errors->first('alco', '<span class="help-block">:message</span>') !!}
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
  </div>
</div>