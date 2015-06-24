angular.module('cookApp', [
  'ngRoute',
  'ui.bootstrap',
  'ui.tree',
  'ui-notification',
  'cgBusy',

  'cookApp.nomenclatureModule'
], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});