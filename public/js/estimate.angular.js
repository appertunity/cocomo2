/**
 * Created by Jaffar Raza on 10/21/2016.
 */


var app = angular.module('app', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
}).constant('API_URL', 'http://'+window.location.hostname+"/cocomo/public/");