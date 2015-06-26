angular.module('cookApp.nomenclatureModule.controllers')
.controller('NomenclatureCtrl', function($scope, $http, $location, Category, Share, Notification) {
  $scope.data = [];
  $scope.selectedId = false;
  $scope.selectedType = '';
  $scope.selected = null;
  $scope.error = false;

  $scope.tgl = function(scope) {
    var model = scope.$parent.$modelValue;

    if (model.type == 'root') scope.toggle();
    else {
      if (model.loaded) scope.toggle();
      else {
        $scope.categoriesPromise = Category.getProducts(model.id).success(function (data) {
          model.nodes = $.extend({}, model.nodes, data);

          model.loaded = true;
          scope.toggle();
        }).error(function () {
          model.loaded = true;
          scope.toggle();
        });
      }
    }
  };

  $scope.select = function(scope) {
    $scope.selectedId = scope.$modelValue.id;
    $scope.selectedType = scope.$modelValue.type;
    $scope.selected = scope;

    Share.set('selected', scope);
  };

  $scope.filter = function(node, query) {
    return !(node && node.title.match(new RegExp(query, 'ig')));
  };

  $scope.categoryTree = {
    // Разрешение на перенос элемента
    accept: function(sourceNodeScope, destNodesScope, destIndex) {
      return (
        (
          destNodesScope.$parent.$modelValue &&
          destNodesScope.$parent.$modelValue.hasOwnProperty('product_type') &&
          sourceNodeScope.$modelValue.product_type == destNodesScope.$parent.$modelValue.product_type
        )
        ||
        (
          destNodesScope.$parent.$modelValue &&
          sourceNodeScope.$modelValue.product_type == destNodesScope.$parent.$modelValue.id
        )
        ||
        false
      );
    },

    // После окончания drag, сохраняем новую родительскую категорию
    dropped: function(event) {
      var sourceModel = event.source.nodeScope.$modelValue;
      var parentModel = event.dest.nodesScope.$parent.$modelValue;

      $scope.categoryMovePromise = Category.move(sourceModel.id, parentModel.id).success(function(response) {

      });
    }
  };

  $scope.newCategory = function() {
    function show() {
      $location.url('nomenclature/category');

      var nodeData = $scope.selected.$modelValue || $scope.selected.$parent.$modelValue;
      nodeData.nodes.push({
        id: 0,
        title: 'Новая категория',
        type: 'category',
        product_type: $scope.selected.$modelValue.product_type,
        nodes: []
      });
    }

    if ($scope.selected.$parent.collapsed) {
      $scope.tgl($scope.selected);

      $scope.categoriesPromise && $scope.categoriesPromise.success(function() {
        show();
      });
    }
    else {
      show();
    }
  };

  $scope.rm = function(scope) {
    if (confirm('Вы хотите удалить категорию?')) {
      $scope.categoryRemovePromise = Category.destroy(scope.$modelValue.id).success(function() {
        scope.remove();
        Notification.success('Категория удалена.');
      }).error(function() {
        Notification.error('Произошла ошибка.');
      });
    }
  };

  function getAll() {
    $scope.categoryPromise = Category.all().success(function(data) {
      $scope.data = data;
    }).error(function() {
    });
  }

  getAll();

  $scope.$on('categoryUpdated', function(event, args) {
    getAll();
  });
  $scope.$on('categoryCreated', function(event, args) {
    getAll();
  });
});