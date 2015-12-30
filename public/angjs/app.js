/**
 * Created by Angkor Wat on 12/28/2015.
 */
var app =angular.module('ngApp', ['ngRoute'])


app.config(function ($routeProvider) {
    $routeProvider
        .when('/',
        {
            controller: 'UserController',
            templateUrl: 'user/info'
        })
        .when('/info',
        {
            controller: 'UserController',
            templateUrl: 'user/info'
        })
        .when('/about',
        {
            controller: 'UserController',
            templateUrl: 'user/about'
        })
        .otherwise({ redirectTo: '/' });
});

