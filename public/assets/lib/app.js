var app = angular.module('ngApp', ['kendo.directives','isteven-multi-select','ngRoute','ngAnimate','facebook','ngFileUpload','ui.bootstrap','simplePagination','angularSpinner','ui-notification'])
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
        // .when('/products/',
        //     {
        //         controller: 'ngProduct',
        //         templateUrl: '/product'
        //     }) 
        .when('/products/list/:categoryId/business/:businessId',
            {
                controller: 'ngProduct',
                templateUrl: '/product'
            })
        .when('/products/add/:categoryId/business/:businessId',
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
