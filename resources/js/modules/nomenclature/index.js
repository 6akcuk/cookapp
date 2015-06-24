angular.module('cookApp.nomenclatureModule', [
  'ngRoute',
  'cookApp.nomenclatureModule.controllers',
  'cookApp.nomenclatureModule.services'
])
.config([
 '$routeProvider',
 '$locationProvider',
 function($routeProvider, $locationProvider) {
   $routeProvider
     .when('/nomenclature/category', {
       templateUrl: 'category.html',
       controller: 'CategoryCtrl',
       controllerAs: 'category'
     })
     .when('/nomenclature/category/:categoryId', {
       templateUrl: 'category.html',
       controller: 'CategoryCtrl',
       controllerAs: 'category'
     })
     .when('/nomenclature/product/:productId', {
       templateUrl: 'product.html',
       controller: 'ProductCtrl',
       controllerAs: 'product'
     });

  $locationProvider.html5Mode(true).hashPrefix('!');
 }
]);