'use strict';

angular.module('myApp.view1', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view1', {
    templateUrl: 'view1/view1.html',
    controller: 'View1Ctrl'
  });
}])

.controller('View1Ctrl', ['$scope', '$http',
                          function($scope, $http) {
	   
	$http.get('games/get_games.php')
       .success(function(data,status,headers,config,statusText){
               $scope.HttpStatus = status;
               $scope.HttpHeaders = headers;
               $scope.HttpConfig = config;
               $scope.games = data;
               $scope.HttpStatusText = statusText;
               $scope.foo = 'SUCCESS';
       }).error(function(data,status,headers,config,statusText){
               $scope.HttpStatus = status;
               $scope.HttpHeaders = headers;
               $scope.HttpConfig = config;
               $scope.games = data;
               $scope.HttpStatusText = statusText;
               $scope.foo = 'ERROR';
       });


}]);