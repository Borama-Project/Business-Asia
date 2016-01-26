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
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link href="{{asset('/assets/css/bootstrap-responsive.css')}}" rel="stylesheet" />
<link href="{{asset('/assets/css/bootstrap-responsive.min.css')}}" rel="stylesheet" />
<link href="{{asset('/assets/css/docs.css')}}" rel="stylesheet" />

<link href="{{asset('/assets/css/jquery.tokenize.css')}}" rel="stylesheet" />

    {{--calander--}}
    <link href="{{asset('/assets/css/kendo.common.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/css/kendo.uniform.min.css')}}" rel="stylesheet" />

</head>
    <body>
    <span us-spinner="{radius:30, width:8, length: 16}" spinner-key="spinner-1"></span>
            @include('header')
            <div class="content-wrapper">
            @yield('content')
            </div>
            @include('footer')
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.js"></script>
    <script src="{{asset('/assets/lib/angular-route.js')}}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular-animate.js"></script>
    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.13.4.js"></script>
    <script src="{{asset('/assets/lib/angular-facebook.js')}}"></script>
    <script src="{{asset('/assets/lib/angular-spinner.min.js')}}"></script>
    <script src="{{asset('/assets/lib/angular-spinner.js')}}"></script>
    <script src="{{asset('/assets/lib/ng-file-upload.min.js')}}"></script>
    <script src="{{asset('/assets/lib/ng-file-upload-shim.min.js')}}"></script>
    <script src="{{asset('/assets/lib/angular-ui-notification.min.js')}}"></script>
    <script src="{{asset('/assets/lib/simplePagination.js')}}"></script>
    <script src="{{asset('/assets/js/kendo.all.min.js')}}"></script>
    <script src="{{asset('/assets/lib/isteven-multi-select.js')}}"></script>
    <script src="{{asset('/assets/lib/app.js')}}"></script>
    <script src="{{asset('/assets/lib/controller/controllers.js')}}"></script>
    


<script type="text/ng-template" id="ModalContent">
    <div class="modal-header">
        <h3 class="modal-title">@{{title}} !</h3>
    </div>
    <div class="modal-body">
    <p>
        @{{contentTitle}}
    </p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="button" ng-click="ok()">OK</button>
        <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
    </div>
</script>

    <script type="text/ng-template" id="deleteCategory">
        <div class="modal-header">
            <h3 class="modal-title">@{{title}} !</h3>
        </div>
        <div class="modal-body">
            <p>
                @{{contentTitle}}
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" ng-click="ok()">OK</button>
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
        </div>
    </script>
<script type="text/ng-template" id="custom_template.html">
    <div class="ui-notification custom-template">
        <h3>@{{nTitle}}</h3>
        <div class="message" ng-bind-html="message"></div>
        <div class="message">
            <ul>
                <li ng-repeat="el in nElements">@{{el}}</li>
            </ul>
        </div>
        <div class="message">
            <a class="btn btn-small btn-primary close-notification" ng-click="nClick()">Click me</a>
        </div>
    </div>
</script>
    </body>
</html>
