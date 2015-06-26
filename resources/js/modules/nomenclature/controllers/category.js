angular.module('cookApp.nomenclatureModule.controllers')
.controller('CategoryCtrl', function($scope, $http, $routeParams, $location, Category, Share, Notification) {
  $scope.saving = false;
  $scope.category = {};

  if ($routeParams.categoryId) {
    $scope.nomenclaturePromise = Category.get($routeParams.categoryId).success(function (category) {
      $scope.category = category;
    });
  } else {
    setTimeout(function() {
      var selected = Share.get('selected');

      $scope.category.name = 'Новая категория';
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

      $scope.$apply();
    }, 1);
  }

  $scope.save = function () {
    $scope.saving = true;

    var selected = Share.get('selected');

    // Сохраним изменения
    if ($scope.category.id) {
      Category.save($scope.category).success(function (response) {
        $scope.saving = false;
        selected.$parent.$modelValue.title = $scope.category.name;

        Notification.success('Изменения сохранены.');
      }).error(function (data) {
        console.log(data);
        $scope.saving = false;

        Notification.error('Произошла ошибка.');
      });
    }
    // Создадим новую категорию
    else {
      Category.create($scope.category).success(function (response) {
        $scope.saving = false;
        $location.url('nomenclature');

        Notification.success('Категория создана.');

        $scope.$emit('categoryCreated');
      }).error(function (data) {
        console.log(data);
        $scope.saving = false;

        Notification.error('Произошла ошибка.');
      });
    }
  };
});