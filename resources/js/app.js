angular.module('cookApp', [
  'ngRoute',
  'ui.bootstrap',
  'ui.tree',
  'ui-notification',
  'cgBusy',

  'cookApp.authModule',
  'cookApp.nomenclatureModule'
], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});