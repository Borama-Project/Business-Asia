<!DOCTYPE html>
<html ng-app="ngApp">
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0-rc.0/angular-route.js"></script>
        <script language="JavaScript" src="{{asset('angjs/app.js') }}"></script>
        <script language="JavaScript" src="{{asset('angjs/controller/controller.js') }}"></script>
        <script language="JavaScript" src="{{asset('angjs/service/service.js') }}"></script>

    </head>
    <body>

            @include('header')
            @yield('content')
            @include('footer')

    </body>
</html>
