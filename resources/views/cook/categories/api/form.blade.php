<input type="hidden" ng-model="category.parent_id">
<input type="hidden" ng-model="category.product_type">

<!-- Название Form Input -->
<div class="form-group">
  <label for="name" class="col-sm-2 control-label">Название:</label>
  <div class="col-sm-10">
    <input type="text" id="name" ng-model="category.name" class="form-control">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    <div class="form-header">Нормируемые показатели (массовая доля)</div>
    <label class="checkbox-inline">
      <input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="category.dry" value="1"> Сухие вещества
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="category.grease" value="1"> Жир
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="category.sugar" value="1"> Сахар
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="category.salt" value="1"> Соль
    </label>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    <div class="row">
      <div class="col-sm-3">
        <label for="gerber">Количество жира, открываемое в изделиях методом Гербера</label>
        <div class="input-group">
          <input type="text" id="gerber" ng-model="category.gerber" class="form-control">
          <div class="input-group-addon">%</div>
        </div>
      </div>
      <div class="col-sm-3">
        <label for="salt_max">Соль (максимально допустимое содержание, %)</label>
        <div class="input-group">
          <input type="text" id="salt_max" class="form-control" ng-model="category.salt_max">
          <div class="input-group-addon">%</div>
        </div>
      </div>
      <div class="col-sm-3">
        <label for="dry_koef">Коэффициент расчета минимального кол-ва сухих в-в</label>
        <div class="input-group">
          {!! Form::select('dry_koef', config('cook.dry_koef_list'), null, ['class' => 'form-control col-sm-3', 'ng-model' => 'category.dry_koef', 'convert-to-number' => true]) !!}
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
          {!! Form::text('biosanpin', null, ['class' => 'form-control', 'ng-model' => 'category.biosanpin']) !!}
        </div>
      </div>
      <div class="col-sm-3">
        {!! Form::label('kma', 'КМА-ФАнМ КОЕ/г, не более') !!}
        <div class="input-group">
          {!! Form::text('kma', null, ['class' => 'form-control', 'ng-model' => 'category.kma']) !!}
        </div>
      </div>
    </div>

    <div class="form-header">Масса продукта (грамм), в которой не допускаются</div>
    <div class="row">
      <div class="col-sm-2">
        {!! Form::label('bgkp', 'БГКП (колиформы)') !!}
        <div class="input-group">
          {!! Form::text('bgkp', null, ['class' => 'form-control', 'ng-model' => 'category.bgkp']) !!}
        </div>
      </div>
      <div class="col-sm-2">
        {!! Form::label('ecoli', 'E/coli') !!}
        <div class="input-group">
          {!! Form::text('ecoli', null, ['class' => 'form-control', 'ng-model' => 'category.ecoli']) !!}
        </div>
      </div>
      <div class="col-sm-2">
        {!! Form::label('saureus', 'S.aureus') !!}
        <div class="input-group">
          {!! Form::text('saureus', null, ['class' => 'form-control', 'ng-model' => 'category.saureus']) !!}
        </div>
      </div>
      <div class="col-sm-2">
        {!! Form::label('proteus', 'Proteus') !!}
        <div class="input-group">
          {!! Form::text('proteus', null, ['class' => 'form-control', 'ng-model' => 'category.proteus']) !!}
        </div>
      </div>
      <div class="col-sm-3">
        {!! Form::label('patogen', 'Патогенные, в т.ч. сальмонеллы') !!}
        <div class="input-group">
          {!! Form::text('patogen', null, ['class' => 'form-control', 'ng-model' => 'category.patogen']) !!}
        </div>
      </div>
    </div>
  </div>
</div>