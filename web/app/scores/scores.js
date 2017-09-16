'use strict';

angular.module('myApp.scores', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/scores', {
    templateUrl: 'scores/scores.html',
    controller: 'scoresCtrl'
  });
}])

.controller('scoresCtrl', ['$scope', '$http',
                          function($scope, $http) {
	   
	$http.get('http://localhost:8000/games/get_scores.php')
       .success(function(data,status,headers,config,statusText){
               $scope.HttpStatus = status;
               $scope.HttpHeaders = headers;
               $scope.HttpConfig = config;
               $scope.scores = data;
               $scope.HttpStatusText = statusText;
               $scope.foo = 'SUCCESS';
       }).error(function(data,status,headers,config,statusText){
               $scope.HttpStatus = status;
               $scope.HttpHeaders = headers;
               $scope.HttpConfig = config;
               $scope.scores = data;
               $scope.HttpStatusText = statusText;
               $scope.foo = 'ERROR';
       });


}]);
