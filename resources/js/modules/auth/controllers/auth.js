angular.module('cookApp.authModule.controllers').controller('AuthCtrl', function($scope, $modal) {
  $scope.openVK = function(link) {
    window.open(link, '', 'width=700,height=500,toolbar=0,menubar=0,location=0');

    window.onmessage = function(e) {
      if (e.data == 'close') {
        window.location = '/';
      }
    }
  };
});