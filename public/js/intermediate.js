/**
 * Created by Jaffar Raza on 10/21/2016.
 */


app.controller('intermediate', function($scope, $http, API_URL,$compile,$q) {
    $scope.default = 'N'
    $scope.doCalculation = function() {
        var url = API_URL + "estimate/intermediate";
        $scope.data = {
            'sloc':$scope.sloc,'class':$scope.class,'rely':$scope.rely,'data':$scope.dat,'cplx':$scope.cplx,'time':$scope.time,'stor':$scope.stor,'virt':$scope.virt,
            'turn':$scope.turn,'acap':$scope.acap,'aexp':$scope.aexp,'pcap':$scope.pcap,'vexp':$scope.vexp,'lexp':$scope.lexp,'modp':$scope.modp,
            'tool':$scope.tool,'sced':$scope.sced
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