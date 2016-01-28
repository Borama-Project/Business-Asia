//This handles retrieving data and is used by controllers. 3 options (server, factory, provider) with 
//each doing the same thing just structuring the functions/data differently.
app.service('AppService', function ($http) {
    this.getCategory = function () {
        if(Category.length ==0){
            return Category;
            // return Category[0].length+' a 1';
        }else{
             ListCategory();
            return Category;
            // return Category.length+' a 2';
        }

        // console.log(Category.length);
    };

    var Category = '';

    var ListCategory  = function(){
        $http({
          method: 'GET',
          url:  'business/list-product-category',
          dataType: "json"
      }).success(function(response) {
          if(response.code ==1){
            Category = JSON.stringify(response.data);
          }else{
            $scope.err = response.message.description;
          }
      }).error(function(response) {
          
      });
    }
    ListCategory();
});