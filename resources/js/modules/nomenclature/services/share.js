angular.module('cookApp.nomenclatureModule.services')
.factory('Share', function($http) {
  var mem = {};

  return {
    set: function(key, value) {
      mem[key] = value;
    },

    get: function(key) {
      return mem[key];
    }
  }
});