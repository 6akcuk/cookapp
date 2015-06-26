@extends('app')

@section('content')
  <div ng-controller="NomenclatureCtrl">
    <script type="text/ng-template" id="category.html">
      <form ng-submit="save()" class="form-horizontal">
        @include('cook.categories.api.form')

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" ng-disabled="saving">Сохранить</button>
          </div>
        </div>
      </form>
    </script>

    <script type="text/ng-template" id="busy_template.html">
      <div class="busy-loader-container">
        <div class="busy-loader"><% $message %></div>
      </div>
    </script>
    <script type="text/ng-template" id="busy_16.html">
      <div class="busy-loader-container-16">
        <div class="busy-loader-16"><% $message %></div>
      </div>
    </script>

    <div class="row">
      <div class="nomenclature-left col-sm-4">
        <div class="nomenclature-search">
          <input type="search" placeholder="Найти" class="form-control" ng-model="query">
        </div>

        <div class="nomenclature-buttons">
          <button ng-click="newCategory()" ng-disabled="selectedType != 'root' && selectedType != 'category'" class="btn btn-primary" data-toggle="tooltip" title="Добавить новую категорию">
            <span class="glyphicon glyphicon-plus"></span>
          </button>
          <a ng-disabled="(selectedType != 'category' && selectedType != 'product') || selected.$modelValue.product_type != 0" class="btn btn-primary" data-toggle="tooltip" title="Добавить новый ингредиент">
            <span class="glyphicon glyphicon-apple"></span>
          </a>
          <a ng-disabled="(selectedType != 'category' && selectedType != 'product') || selected.$modelValue.product_type != 1" class="btn btn-primary" data-toggle="tooltip" title="Добавить новый полуфабрикат">
            <span class="glyphicon glyphicon-grain"></span>
          </a>
          <a ng-disabled="(selectedType != 'category' && selectedType != 'product') || selected.$modelValue.product_type != 2" class="btn btn-primary" data-toggle="tooltip" title="Добавить новое блюдо">
            <span class="glyphicon glyphicon-cutlery"></span>
          </a>
          <a class="btn btn-primary" data-toggle="tooltip" title="Добавить новый рецепт">
            <span class="glyphicon glyphicon-book"></span>
          </a>
        </div>

        <!-- Nested node template -->
        <script type="text/ng-template" id="categories_renderer.html">
          <div class="tree-node" ng-class="{selected: selectedId == node.id && selectedType == node.type}">
            <div ng-if="node.type == 'root'" class="pull-left">
              <a class="btn btn-success btn-xs" ng-click="tgl(this)">
                <span class="glyphicon" ng-class="{'glyphicon-folder-close': collapsed, 'glyphicon-folder-open': !collapsed}"></span>
              </a>
              <a ng-click="select(this)"><% node.title %></a>
            </div>

            <div ng-if="node.type == 'category'" class="pull-left">
              <a cg-busy="{promise:categoriesPromise,backdrop:true,message:'',templateUrl:'busy_16.html'}" class="btn btn-success btn-xs" ng-click="tgl(this)">
                <span class="glyphicon" ng-class="{'glyphicon-folder-close': collapsed, 'glyphicon-folder-open': !collapsed}"></span>
              </a>
              <a href="nomenclature/category/<% node.id %>" ng-click="select(this)"><% node.title %></a>
            </div>

            <div ng-if="node.type == 'product'" class="pull-left">
              <span class="btn btn-success btn-xs">
                <span class="glyphicon" ng-class="{'glyphicon-apple': node.product_type == 0, 'glyphicon-grain': node.product_type == 1, 'glyphicon-cutlery': node.product_type == 2}"></span>
              </span>
              <a href="nomenclature/product/<% node.id %>" ng-click="select(this)"><% node.title %></a>
            </div>

            <a ng-if="node.type != 'root' && node.type != 'null'" cg-busy="{promise:categoryRemovePromise,backdrop:true,message:'',templateUrl:'busy_16.html'}" class="pull-right btn btn-danger btn-xs" ng-click="rm(this)">
              <span class="glyphicon glyphicon-remove"></span>
            </a>
            <a style="margin-right: 10px" cg-busy="{promise:categoryMovePromise,backdrop:true,message:'',templateUrl:'busy_16.html'}" ng-show="node.type != 'root' && node.type != 'null'" class="pull-right btn btn-default btn-xs" ui-tree-handle>
              <span class="glyphicon glyphicon-sort"></span>
            </a>
          </div>
          <ol ui-tree-nodes="" ng-model="node.nodes" ng-class="{hidden: collapsed}">
            <li data-collapsed="true" ng-hide="filter(node, query)" ng-repeat="node in node.nodes" ui-tree-node ng-include="'categories_renderer.html'"></li>
          </ol>
        </script>
        <div ui-tree="categoryTree" cg-busy="{promise:categoryPromise,backdrop:true,message:'Ожидайте..',templateUrl:'busy_template.html'}">
          <ol ui-tree-nodes="" ng-model="data" id="tree-root">
            <li ng-repeat="node in data" ui-tree-node ng-include="'categories_renderer.html'"></li>
          </ol>
        </div>

        <div ng-show="error" class="alert alert-danger hide">Упс, произошла ошибка!</div>
      </div>

      <div class="nomenclature-right col-sm-8">
        <div data-spy="affix">
          <div cg-busy="{promise:nomenclaturePromise,backdrop:true,message:'',templateUrl:'busy_template.html'}" ng-view></div>
        </div>
      </div>
    </div>
  </div>
@stop