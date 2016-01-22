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
var app = angular.module('ngApp', ['ngRoute','ngAnimate','facebook','ngFileUpload','ui.bootstrap','angularSpinner','ui-notification'])
 .config(['FacebookProvider',
    function(FacebookProvider) {
     var myAppId = '943056782397930';
     FacebookProvider.init(myAppId);
    }
  ]);
//This configures the routes and associates each route with a view and a controller
app.config(function ($routeProvider) {
    $routeProvider
        .when('/',
            {
                controller: 'ngHome',
                templateUrl: '/Auth/admin-profile'
            })
        .when('/category/:businessId',
            {
                controller: 'ngCategory',
                templateUrl: '/business/category'
            })
        .when('/category/add/category/:businessId',
        {
            controller: 'ngCategory',
            templateUrl: '/business/add-category'
        })
        .when('/business',
            {
                controller: 'ngBusiness',
                templateUrl: '/business'
            })
        .when('/business/:businessId',
            {
                controller: 'ngViewBusiness',
                templateUrl: '/business/business-by-id'
            })
        .when('/business/register/Business',
            {
                controller: 'ngRegisterBusiness',
                templateUrl: '/business/register-business'
            })
        .when('/mainCategory',
            {
                controller: 'ngBusinessType',
                templateUrl: '/mainCategory'
            })
        .when('/products',
            {
                controller: 'ngProduct',
                templateUrl: '/product'
            })
        .when('/products/product',
            {
                controller: 'ngAddProduct',
                templateUrl: '/product/product'
            })
        .when('/products/product/:productId',
            {
                controller: 'ngGetProduct',
                templateUrl: '/product/product-by-id'
            })
        .when('/promotion',
            {
                controller: 'ngPromotion',
                templateUrl: '/product/promotion'
            })
        .when('/list-all-business',
        {
            controller: 'ngListAllBusiness',
            templateUrl: '/business/list-all-business'
        })
        .otherwise({ redirectTo: '/' });
});
