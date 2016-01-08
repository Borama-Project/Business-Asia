//-------------Facebook---------------
//This controller retrieves data from the customersService and associates it with the $scope
//The $scope is ultimately bound to the customers view

app.controller('ngApp', function ($scope,$http) {

    $scope.save = function(){
        $
    }
    //I like to have an init() for controllers that need to perform some initialization. Keeps things in
    //one place...not required though especially in the simple example below
    init();
    function init() {
       console.log('ngApp');
    }
});
app.controller('ngCategory', function ($scope,$http) {

    $scope.list = function(){
        $http({
            method: 'POST',
            url:  '/business/save',
            data: $.param($scope.products),
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            $scope.products = response;
        }).error(function(response) {
            console.log(response);
        });
    };
});

app.controller('ngBusiness', function ($scope,$http) {

    //I like to have an init() for controllers that need to perform some initialization. Keeps things in
    //one place...not required though especially in the simple example below
    init();
    function init() {
       console.log('ngBusiness');
    }
});
app.controller('ngBusinessType', function ($scope,$http) {

    //I like to have an init() for controllers that need to perform some initialization. Keeps things in
    //one place...not required though especially in the simple example below
    init();
    function init() {
       console.log('businessType');
    }
});


