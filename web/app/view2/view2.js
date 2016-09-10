'use strict';

angular.module('myApp.view2', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view2/:quizId', {
    templateUrl: 'view2/view2.html',
    controller: 'View2Ctrl'
  });
}])

.controller('View2Ctrl', ['$scope', '$routeParams','$http',
                          function($scope, $routeParams, $http) {

	$http.get('games/get_quiz.php?quizId=' + $routeParams.quizId)
    .success(function(data,status,headers,config,statusText){
            $scope.HttpStatus = status;
            $scope.HttpHeaders = headers;
            $scope.HttpConfig = config;
            $scope.questions = data;
            $scope.quizId = $routeParams.quizId;
            $scope.HttpStatusText = statusText;
            $scope.foo = 'SUCCESS';
    }).error(function(data,status,headers,config,statusText){
            $scope.HttpStatus = status;
            $scope.HttpHeaders = headers;
            $scope.HttpConfig = config;
            $scope.questions = data;
            $scope.HttpStatusText = statusText;
            $scope.foo = 'ERROR';
    });
}]);