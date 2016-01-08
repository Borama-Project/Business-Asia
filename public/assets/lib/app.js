/// <reference path="../Scripts/angular-1.1.4.js" />

/*#######################################################################
  https://cdnjs.com/libraries/angular-spinner
  http://fgnass.github.io/spin.js/
  Dan Wahlin
  http://twitter.com/DanWahlin
  http://weblogs.asp.net/dwahlin
  http://pluralsight.com/training/Authors/Details/dan-wahlin

  Normally like to break AngularJS apps into the following folder structure
  at a minimum:

  /app
      /controllers      
      /directives
      /services
      /partials
      /views
// 070 936575
  #######################################################################*/
// http://www.mvtubes.com/the-guillotines-2012/
var app = angular.module('ngApp', ['ngRoute','ngAnimate']);
//This configures the routes and associates each route with a view and a controller
app.config(function ($routeProvider) {
    $routeProvider
        .when('/',
            {
                controller: 'ngApp',
                templateUrl: '/business'
            })
        .when('/category',
            {
                controller: 'ngCategory',
                templateUrl: '/business/category'
            })
        .when('/business',
            {
                controller: 'ngBusiness',
                templateUrl: '/business'
            })
        .when('/businessType',
            {
                controller: 'ngBusinessType',
                templateUrl: '/business/business-type'
            })
        .when('/mainCategory',
            {
                controller: 'ngBusinessType',
                templateUrl: '/mainCategory'
            })
        .when('/businessTage',
            {
                controller: 'ngBusinessType',
                templateUrl: '/businessTage'
            })
        .when('/product',
            {
                controller: 'ngBusinessType',
                templateUrl: '/product'
            })
        .when('/promotion',
            {
                controller: 'ngBusinessType',
                templateUrl: '/promotion'
            })
        
        
        .otherwise({ redirectTo: '/' });
});
