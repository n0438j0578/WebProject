var app = angular.module('qa-setting', []);

app.directive('loading', function () {
    return {
        restrict: 'E',
        replace:true,
        template: '<p><img src="img/loading.gif"/></p>', // Define a template where the image will be initially loaded while waiting for the ajax request to complete
        link: function (scope, element, attr) {
            scope.$watch('loading', function (val) {
                val = val ? $(element).show() : $(element).hide();  // Show or Hide the loading image   
            }); 
        }
    }
});

app.controller('myCtrl', function ($scope, $http) {
    $scope.question = "";
    $scope.answer = "";
    $scope.type = "";
    $scope.sendData = function () {
        var a = $scope.question + " " + $scope.answer + " " + $scope.type;
        console.log(a);
        $scope.loading = true;
        var req = {
            method: 'POST',
            url: 'http://localhost:3000/',
            headers: {
                // 'Access-Control-Allow-Origin' : "*" ,
                // 'Access-Control-Allow-Methods' : 'POST',,
                // 'Access-Control-Allow-Credentials': 'true',
				'Content-Type': 'application/json; charset=utf-8',
				'Accept': 'application/json'
            },
            data: {
                "text": $scope.question,
                "type": $scope.type,
                "answer": $scope.answer
            }
        }

        $http(req).then(function (res) {
            $scope.loading = false;
        }, function () {
            $scope.loading = false;
        });
    }
});