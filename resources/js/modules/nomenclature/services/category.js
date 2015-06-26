angular.module('cookApp.nomenclatureModule.services')
.factory('Category', function($http) {
  return {
    all: function() {
      return $http.get('api/categories');
    },

    // получить данные по категории
    get: function(id) {
      return $http.get('api/categories/'+ id);
    },

    // переместить категорию в другую родительскую
    move: function(sourceId, destId) {
      return $http({
        method: 'PATCH',
        url: 'api/categories/'+ sourceId + '/move',
        headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
        data: $.param({destId: destId})
      });
    },

    // создать новую категорию
    create: function(categoryData) {
      return $http({
        method: 'POST',
        url: 'api/categories',
        headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
        data: $.param(categoryData)
      });
    },

    // сохранить изменения в категории
    save: function(categoryData) {
      return $http({
        method: 'PATCH',
        url: 'api/categories/'+ categoryData.id,
        headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
        data: $.param(categoryData)
      });
    },

    destroy: function(id) {
      return $http({
        method: 'DELETE',
        url: 'api/categories/'+ id
      });
    },

    getProducts: function(id) {
      return $http.get('api/products/'+ id);
    }
  }
});