<!-- Название Form Input -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  {!! Form::label('name', 'Название:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Родительская категория Form Input -->
<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
  {!! Form::label('parent_id', 'Родительская категория:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::select('parent_id', $categoriesList, null, ['class' => 'form-control']) !!}
    {!! $errors->first('parent_id', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- Тип категории Form Input -->
<div class="form-group {{ $errors->has('product_type') ? 'has-error' : '' }}">
  {!! Form::label('product_type', 'Тип категории:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10">
    {!! Form::select('product_type', $productTypesList, null, ['class' => 'form-control']) !!}
    {!! $errors->first('product_type', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    <div class="form-header">Нормируемые показатели (массовая доля)</div>
    <label class="checkbox-inline">
      {!! Form::checkbox('dry') !!} Сухие вещества
    </label>
    <label class="checkbox-inline">
      {!! Form::checkbox('grease') !!} Жир
    </label>
    <label class="checkbox-inline">
      {!! Form::checkbox('sugar') !!} Сахар
    </label>
    <label class="checkbox-inline">
      {!! Form::checkbox('salt') !!} Соль
    </label>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    <div class="row">
      <div class="col-sm-3">
        {!! Form::label('gerber', 'Количество жира, открываемое в изделиях методом Гербера') !!}
        <div class="input-group">
          {!! Form::text('gerber', null, ['class' => 'form-control']) !!}
          <div class="input-group-addon">%</div>
        </div>
      </div>
      <div class="col-sm-3">
        {!! Form::label('salt_max', 'Соль (максимально допустимое содержание, %)') !!}
        <div class="input-group">
          {!! Form::text('salt_max', null, ['class' => 'form-control']) !!}
          <div class="input-group-addon">%</div>
        </div>
      </div>
      <div class="col-sm-3">
        {!! Form::label('dry_koef', 'Коэффициент расчета минимального кол-ва сухих в-в') !!}
        <div class="input-group">
          {!! Form::select('dry_koef', config('cook.dry_koef_list'), null, ['class' => 'form-control col-sm-3']) !!}
        </div>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    <div class="form-header">Микробиологические показатели</div>
    <div class="row">
      <div class="col-sm-3">
        {!! Form::label('biosanpin', 'Индекс') !!}
        <div class="input-group">
          {!! Form::text('biosanpin', null, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="col-sm-3">
        {!! Form::label('kma', 'КМА-ФАнМ КОЕ/г, не более') !!}
        <div class="input-group">
          {!! Form::text('kma', null, ['class' => 'form-control']) !!}
        </div>
      </div>
    </div>

    <div class="form-header">Масса продукта (грамм), в которой не допускаются</div>
    <div class="row">
      <div class="col-sm-2">
        {!! Form::label('bgkp', 'БГКП (колиформы)') !!}
        <div class="input-group">
          {!! Form::text('bgkp', null, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="col-sm-2">
        {!! Form::label('ecoli', 'E/coli') !!}
        <div class="input-group">
          {!! Form::text('ecoli', null, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="col-sm-2">
        {!! Form::label('saureus', 'S.aureus') !!}
        <div class="input-group">
          {!! Form::text('saureus', null, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="col-sm-2">
        {!! Form::label('proteus', 'Proteus') !!}
        <div class="input-group">
          {!! Form::text('proteus', null, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="col-sm-3">
        {!! Form::label('patogen', 'Патогенные, в т.ч. сальмонеллы') !!}
        <div class="input-group">
          {!! Form::text('patogen', null, ['class' => 'form-control']) !!}
        </div>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
  </div>
</div>