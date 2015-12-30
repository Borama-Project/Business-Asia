
app.controller('UserController', function($scope,$http) {

    $scope.list = function(){
        $http({
            method: 'POST',
            url:  '/user/info',
            data: '',
            dataType: "json"
        }).success(function(response) {
            $scope.products = response;
        }).error(function(response) {
            console.log(response);
        });
    };

    $scope.list();

    $scope.about = function(){
        $http({
            method: 'POST',
            url:  'user/about',
            data: '',
            dataType: "json"
        }).success(function(response) {
            $scope.about = response;
        }).error(function(response) {
            console.log(response);
        });
    };

    $scope.about();


});


