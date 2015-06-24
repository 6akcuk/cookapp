angular.module('cookApp.nomenclatureModule.controllers')
.controller('CategoryCtrl', function($scope, $http, $routeParams, Category, Share) {
  $scope.saving = false;

  if ($routeParams.categoryId) {
    $scope.nomenclaturePromise = Category.get($routeParams.categoryId).success(function (category) {
      $scope.category = category;
    });
  } else {

    var selected = Share.get('selected');

    $scope.category = {};
    $scope.category.parent_id = null;
    $scope.category.product_type = null;

    if (selected.$modelValue.hasOwnProperty('product_type')) {
      $scope.category.parent_id = selected.$parent.$modelValue.id;
      $scope.category.product_type = selected.$parent.$modelValue.product_type;
    }
    else if (selected.$modelValue.type && selected.$modelValue.type == 'root') {
      $scope.category.parent_id = 0;
      $scope.category.product_type = selected.$modelValue.id;
    }
    else {
      $scope.category.parent_id = selected.$modelValue.id;

    }

    source = (selected.$modelValue.hasOwnProperty('product_type') && selected.$modelValue.product_type >= 0)
      ? selected.$parent.$modelValue.id
      : ((selected.$modelValue.type && selected.$modelValue.type == 'root') ? 0 : selected.$modelValue.id);


  }

  $scope.save = function () {
    $scope.saving = true;

    // Сохраним изменения
    if ($scope.category.id) {
      Category.save($scope.category).success(function (response) {
        $scope.saving = false;

        $scope.$emit('categoryUpdated', $scope.category);
      }).error(function (data) {
        console.log(data);
        $scope.saving = false;
      });
    }
    // Создадим новую категорию
    else {

    }
  };
});