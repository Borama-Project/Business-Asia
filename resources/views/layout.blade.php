<!DOCTYPE html>
<html ng-app="ngApp">
<head>
<title></title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{asset('/assets/js/bootstrap.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="{{asset('/assets/css/bootstrap.css')}}" rel="stylesheet" />
<link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('/assets/css/bootstrap-responsive.css')}}" rel="stylesheet" />
<link href="{{asset('/assets/css/bootstrap-responsive.min.css')}}" rel="stylesheet" />
<link href="{{asset('/assets/css/normalize.css')}}" rel="stylesheet" />
<link href="{{asset('/assets/css/docs.css')}}" rel="stylesheet" />

</head>
    <body>

            @include('header')
            <div class="content-wrapper">
            @yield('content')
            </div>
            @include('footer')
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.js"></script>
    <script src="{{asset('/assets/lib/angular-route.js')}}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular-animate.js"></script>
    <script src="{{asset('/assets/lib/angular-facebook.js')}}"></script>
    <script src="{{asset('/assets/lib/app.js')}}"></script>
    <script src="{{asset('/assets/lib/controller/controllers.js')}}"></script>

    </body>
</html>
