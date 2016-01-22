var app = angular.module('ngApp', ['ngRoute','ngAnimate','facebook','ui.bootstrap'])
 .config(['FacebookProvider',
    function(FacebookProvider) {
     var myAppId = '943056782397930';
     
     // You can set appId with setApp method
     // FacebookProvider.setAppId('myAppId');
     
     /**
      * After setting appId you need to initialize the module.
      * You can pass the appId on the init method as a shortcut too.
      */
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
        .otherwise({ redirectTo: '/' });
});