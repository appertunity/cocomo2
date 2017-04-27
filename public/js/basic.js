/**
 * Created by Jaffar Raza on 10/21/2016.
 */


app.controller('basic', function($scope, $http, API_URL,$compile,$q) {
    $scope.default = 'N'
    $scope.doCalculation = function() {
        var url = API_URL + "estimate/basic";
        $scope.data = {
            'sloc':$scope.sloc,'class':$scope.class
        }
        $http({
            method: 'POST',
            url: url,
            data:$scope.data,
            headers: {'Content-Type': 'application/json' }
        }).then(function successCallback(response) {

            $("#effort").html(response.data.EFFORT_APPLIED.toFixed(2) )
            $("#develop").html(response.data.DEVELOPMENT_TIME.toFixed(2))
            $("#staff").html(response.data.PEOPLE_REQUIRED.toFixed(2))
            $("#cost").html( (response.data.PEOPLE_REQUIRED * $scope.salary).   toFixed(2) )
        }, function errorCallback(response) {});

    }
    $scope.changeCost = function () {
        $("#cost").html( (eval($("#staff").html()) * $scope.salary).toFixed(2) )
    }

});