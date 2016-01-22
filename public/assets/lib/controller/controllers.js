
app.controller('ngLog', ['$scope','$timeout','$http','Facebook',
    function($scope, $timeout,$http, Facebook) {
      $scope.logout = function() {
        Facebook.getLoginStatus(function(response) {
          if (response.status == 'connected') {
            userIsConnected = true;
            Facebook.logout(function() {
              $scope.$apply(function() {
                $scope.user   = {};
                $scope.logged = false;  
              });
            });
          }
        });
        
      }
    }
  ]);
app.controller('ngApp', ['$scope','$timeout','$http','Facebook',
    function($scope, $timeout,$http, Facebook) {
      
      // Define user empty data :/
      $scope.user = {};
      $scope.userName ='';
      $scope.useremail = '';
      $scope.userId ='';
      $scope.user_dis = '';
      $scope.contentType ='facebook';
      // Defining user logged status
      $scope.logged = false;
      
      // And some fancy flags to display messages upon user status change
      $scope.byebye = false;
      $scope.salutation = false;
      
      /**
       * Watch for Facebook to be ready.
       * There's also the event that could be used
       */
      $scope.$watch(
        function() {
          return Facebook.isReady();
        },
        function(newVal) {
          if (newVal)
            $scope.facebookReady = true;
        }
      );
      
      var userIsConnected = false;
      
      Facebook.getLoginStatus(function(response) {
        if (response.status == 'connected') {
          userIsConnected = true;
        }
      });
      
      /**
       * IntentLogin
       */
      $scope.IntentLogin = function() {
        if(!userIsConnected) {
          $scope.login();
        }
      };
      
      /**
       * Login
       */
       $scope.login = function() {
         Facebook.login(function(response) {
          if (response.status == 'connected') {
            $scope.logged = true;

          }
        
        },{scope: 'public_profile,email'});
       };
       
       /**
        * me 
        */
        $scope.me = function() {
          Facebook.api('/me?fields=id,first_name,last_name,name,picture,email', function(response) {
            /**
             * Using $scope.$apply since this happens outside angular framework.
             */

             // console.log(response);
            $scope.$apply(function() {
                console.log(response);
                var data = $.param({
                    socialId: response.id,
                    firstName: response.first_name,
                    lastName: response.last_name,
                    avatar: response.picture.data.url,
                    displayName: response.name
                });
            
                var config = {
                    headers : {
                        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                    }
                }

                $http.post('/Auth', data, config)
                .success(function (data, status, headers, config) {
                    
                    console.log(data);
                    window.location = "http://asianbusiness.dev/";
                })
                .error(function (data, status, header, config) {
                    
                });
            });
            
          });
        };
      
      /**
       * Logout
       */
      $scope.logout = function() {
        Facebook.logout(function() {
          $scope.$apply(function() {
            $scope.user   = {};
            $scope.logged = false;  
          });
        });
      }
      
      /**
       * Taking approach of Events :D
       */
      $scope.$on('Facebook:statusChange', function(ev, data) {
        // console.log('Status: ', data);
        // console.log(this);
        if (data.status == 'connected') {
          $scope.me();
          $scope.$apply(function() {
            $scope.salutation = true;
            $scope.byebye     = false;    
          });
        } else {
          $scope.$apply(function() {
            $scope.salutation = false;
            $scope.byebye     = true;
            
            // Dismiss byebye message after two seconds
            $timeout(function() {
              $scope.byebye = false;
            }, 2000)
          });
        }
      });
    
    }
  ]);

app.controller('ngCategory', function ($scope,$http,$routeParams,usSpinnerService) {
    $scope.businessId = $routeParams.businessId;

    $scope.get_category_by_business_id = function(){
        $http({
            method: 'POST',
            url:  '/business/get-category-by-business',
            data:  {businessId:$routeParams.businessId},
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            $scope.get_category_by_business_id = response.data;
        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.get_category_by_business_id();

    $scope.get_business_by_id_fuc = function(){
    usSpinnerService.spin('spinner-1');
        $http({
            method: 'POST',
            url:  '/business/get-business-by-id',
            data:  {businessId:$routeParams.businessId},
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            if(response.code ==1){
              $scope.get_business_by_id = response.data;
              usSpinnerService.stop('spinner-1');
            }else{
              $scope.err = response.message.description;
            }

        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.get_business_by_id_fuc();

    $scope.submit = function(){
        $http({
            method: 'POST',
            url:  '/business/save-category',
            data: {
                categoryName:$scope.globalVirable.categoryName,
                businessId:$routeParams.businessId
            },
            dataType: "json"
        }).success(function(response) {
            $scope.globalVirable='';
            window.history.back();
            $scope.get_business_by_id_fuc();
        }).error(function(response) {
            console.log(response);
        });
    };
});

app.controller('ngBusiness', function ($scope,$http,$modal,Upload,$log,usSpinnerService,Pagination) {

  $scope.submit =  function(){
    if($scope.search){
      console.log($scope.search);
      usSpinnerService.spin('spinner-1');
      $http({
          method: 'POST',
          url:  '/business/search-business',
          data: $scope.search,
          dataType: "json"
      }).success(function(response) {
          if(response.code ==1){
              console.log(response);
              usSpinnerService.stop('spinner-1');
              $scope.get_all_business = response.data;
              $scope.pagination = Pagination.getNew(10);
              $scope.pagination.numPages = Math.ceil(response.data.length/$scope.pagination.perPage);

            }else{
              $scope.err = response.message.description;
            }
          
      }).error(function(response) {
          console.log(response);
      });
    }
    
  }

  $scope.listAllBusiness = function(){
    usSpinnerService.spin('spinner-1');
      $http({
          method: 'GET',
          url:  '/business/list-all-business-data',
          dataType: "json"
      }).success(function(response) {
          // console.log(response);
          if(response.code == 1){
            $scope.pagination = '';
            $scope.get_all_business = response.data;
            $scope.pagination = Pagination.getNew(10);
            $scope.pagination.numPages = Math.ceil(response.data.length/$scope.pagination.perPage);
          }
          
          usSpinnerService.stop('spinner-1');
      }).error(function(response) {
          console.log(response);
      });
  };
  $scope.listAllBusiness();

  $scope.animationsEnabled = true;

  $scope.deleteById = function (size) {
    console.log(this.item.head.name);
    $scope.name = this.item.head.name;
    $scope.businessId = this.item.businessId;
    var modalInstance = $modal.open({
      animation: $scope.animationsEnabled,
      templateUrl: 'ModalContent',
      controller: 'ModalInstanceDelete',
      size: size,
      resolve: {
        title :function(){
          return 'Delete';
        }
        ,contents :function(){
          return 'Do you want to Delete Businesss name '+$scope.name;
        },businessId:function(){
          return $scope.businessId;
        },scopes:function(){
          return $scope;
        }
      }
    });

  };

});
app.controller('ngViewBusiness', function ($scope,$http,$routeParams,usSpinnerService) {
    $scope.init = function(){
      usSpinnerService.spin('spinner-1');
      $http({
          method: 'POST',
          url:  '/business/business-by-id',
          data: {businessId:$routeParams.businessId},
          dataType: "json"
      }).success(function(response) {
          console.log(response);
          if(response.code ==1){
            $scope.item = response.data[0];
            usSpinnerService.stop('spinner-1');
          }else{
            $scope.err = response.message.description;
          }
      }).error(function(response) {
          console.log(response);
      });
    }
    $scope.init();
});


app.controller('ngRegisterBusiness', function ($scope,$http,Upload){

    $('.selected-items-box').bind('click', function(e){
        e.stopPropagation();
        $('.multiple-select-wrapper .list').toggle('slideDown');
    });

    $('.multiple-select-wrapper .list').bind('click', function(e){
        e.stopPropagation();
    });

    $(document).bind('click', function(){
        $('.multiple-select-wrapper .list').slideUp();
    });

  $scope.listBusinessTag = function(){
        $http({
            method: 'GET',
            url:  '/business/list-business-tag',
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            $scope.businessTag = response.data;

        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.listBusinessTag();

    $scope.listBusinessType = function(){
        $http({
            method: 'GET',
            url:  '/business/list-business-type',
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            $scope.businessType = response.data;
        }).error(function(response) {
            //console.log(response);
        });
    };
    $scope.listBusinessType();

    ////business type checkbox
    //$scope.selection=[];
    //// toggle selection for a given employee by name
    //$scope.toggleSelection = function toggleSelection(tagId) {
    //    var idx = $scope.selection.indexOf(tagId);
    //
    //    // is currently selected
    //    if (idx > -1) {
    //        $scope.selection.splice(idx, 1);
    //    }
    //    // is newly selected
    //    else {
    //        $scope.selection.push(tagId);
    //    }
    //    console.log($scope.selection);
    //
    //};
    ////end business type checkbox
    //business tag check box
    $scope.selectionTag=[];
    // toggle selection for a given employee by name
    $scope.toggleSelectionTag = function toggleSelectionTag(tagId) {
        var idx = $scope.selectionTag.indexOf(tagId);

        // is currently selected
        if (idx > -1) {
            $scope.selectionTag.splice(idx, 1);
        }
        // is newly selected
        else {
            $scope.selectionTag.push(tagId);
        }
        //console.log($scope.selectionTag);

    };
    //end
    $scope.submit = function(){

        Upload.upload({
            method: 'POST',
            url: '/business/register-business',
            data: {
                locationname:$scope.globalVirable.locationname,
                businessname:$scope.globalVirable.businessname,
                phoneNumber:$scope.globalVirable.phoneNumber,
                email:$scope.globalVirable.email,
                latitute:$scope.globalVirable.latitute,
                longitute:$scope.globalVirable.longitute,
                address:$scope.globalVirable.address,
                description:$scope.globalVirable.description,
                logo:$scope.globalVirable.logo,
                cover:$scope.globalVirable.cover,
                businessTypeList:$scope.globalVirable.businessTypeList,
                businessTagList:$scope.selectionTag
            },
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            console.log(response);
            if(response.code == 1){
                $scope.globalVirable ='';
                $scope.success = 'sucess';
                $scope.businessName = response.data.head.name;
            }else{
                $scope.errorSMS = response.message.description;
            }
        });
    };


});

app.controller('ngProduct', function ($scope,$http,usSpinnerService) {
  
    $scope.submit = function(){
       usSpinnerService.spin('spinner-1'); 
      $http({
          method: 'POST',
          url:  '/product/list-product',
          data: $scope.app,
          dataType: "json"
      }).success(function(response) {
        if(response.code ==1){
          $scope.results  = JSON.stringify(response.message);
          if(response.data.length){
            usSpinnerService.stop('spinner-1');
            $scope.Product = response.data;
            usSpinnerService.stop('spinner-1');
          }else{
            $scope.items = response.data;
          }
        }else{

        }
          
      }).error(function(response) {
          console.log(response);
      });
    };

    $scope.categorysList = function(){
        $http({
            method: 'GET',
            url:  '/business/list',
            dataType: "json"
        }).success(function(response) {
          if(response.code ==1){
            $scope.categorysLists = response.data;
          }else{
            $scope.err = response.message.description;
          }
            
        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.categorysList();
    $scope.businessList = function(){
        $http({
            method: 'GET',
            url:  '/business/list-all-business-data',
            dataType: "json"
        }).success(function(response) {
            if(response.code ==1){
              $scope.business = response.data;
            }else{
              $scope.err = response.message.description;
            }
            
        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.businessList();

    $scope.change = function(){
      $http({
            url:  '/business/category',
            method: 'POST',
            data: {businessId:$scope.app.businessId},
            dataType: "json"
        }).success(function(response) {
            if(response.code ==1){
              $scope.category = response.data;
            }else{
              $scope.err = response.message.description;
            }
            
        }).error(function(response) {
            console.log(response);
        });  
    }
});
app.controller('ngGetProduct', function ($scope,$http,$routeParams) {

});
app.controller('ngAddProduct', function ($scope,$http,Upload,usSpinnerService) {
  usSpinnerService.spin('spinner-1');
  $scope.categorysList = function(callback){
      $http({
          method: 'GET',
          url:  '/business/list',
          dataType: "json"
      }).success(function(response) {
          if(response.code ==1){
            $scope.categorysLists = response.data;
            if(callback){
              callback();
            }
          }else{
            $scope.err = response.message.description;
            usSpinnerService.stop('spinner-1');
          }
          
      }).error(function(response) {
          console.log(response);
      });
  };
  $scope.conditionList = function(callback){
      $http({
          method: 'GET',
          url:  '/product/product-condition',
          dataType: "json"
      }).success(function(response) {
          if(response.code ==1){
            $scope.conditions = response.data;
            if(callback){
              callback();
            }
          }else{
            $scope.err = response.message.description;
          }
      }).error(function(response) {
          console.log(response);
          usSpinnerService.stop('spinner-1');
      });
  };
  $scope.listBusinessTag = function(callback){
      $http({
          method: 'GET',
          url:  '/business/list-business-tag',
          dataType: "json"
      }).success(function(response) {
          if(response.code ==1){
            $scope.businessTag = response.data;
            if(callback){
              callback();
            }
          }else{
            $scope.err = response.message.description;
            usSpinnerService.stop('spinner-1');
          }
      }).error(function(response) {
          console.log(response);
      });
  };
  $scope.businessList = function(){
      $http({
          method: 'GET',
          url:  '/business/list-all-business-data',
          dataType: "json"
      }).success(function(response) {
          if(response.code ==1){
            $scope.business = response.data;
            usSpinnerService.stop('spinner-1');
          }else{
            $scope.err = response.message.description;
            usSpinnerService.stop('spinner-1');
          }
          
      }).error(function(response) {
          console.log(response);
      });
  };
  $scope.listBusinessTag(function(){
    $scope.conditionList(function(){
      $scope.categorysList(function(){
        $scope.businessList();
      });
    });
  });
  
  $scope.submit = function(){
    usSpinnerService.spin('spinner-1');
    Upload.upload({
          method: 'POST',
          url: '/product/product',
          data: $scope.app,
          dataType: "json",
          contentType: false,
          cache: false,
          processData: false,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      }).success(function (response) {
          usSpinnerService.stop('spinner-1');
          $scope.app = '';
          if(response.code == 1){
              $scope.results = response.message.description;
              // $scope.BusinessFormName.$setPristine();
          }
      });
  };

});
app.controller('ngPromotion', function ($scope,$http) {
    init();
    function init() {
        console.log('ngPromotion');
    }
});


app.controller('ngHome', function ($scope,$http) {

    //I like to have an init() for controllers that need to perform some initialization. Keeps things in
    //one place...not required though especially in the simple example below
    init();
    function init() {
       console.log('ngHome');
    }
});

app.controller('ngAuth', function ($scope,$http) {
 
    $scope.submit = function(){
      $http({
          method: 'POST',
          url:  '/Auth/login',
          data:$scope.app,
          dataType: "json"
      }).success(function(response) {
        if(response.code ===1){
          window.location = "http://asianbusiness.dev/Auth";
        }else{
          $scope.err = response.message.description;
        }
      }).error(function(response) {
          console.log(response);
      });
    }
});

app.controller('ModalInstanceDelete', function ($scope,$http, $modalInstance,title,contents,businessId,scopes) {
  $scope.title= title;
  $scope.contentTitle = contents;
  $scope.businessId= businessId;
  $scope.scopes = scopes;
  $scope.ok = function () {
    $http({
        method: 'POST',
        url:  '/business/delete-business-by-id',
        data: {businessId:$scope.businessId},
        dataType: "json"
    }).success(function(response) {
        $modalInstance.close();
        if($scope.scopes.search){
          $scope.scopes.submit();
        }else{
          $scope.scopes.listAllBusiness();
        }
    }).error(function(response) {
        console.log(response);
    });
  };

  $scope.cancel = function () {
    $modalInstance.dismiss('cancel');
  };
  $scope.close = function(e){
    $modalInstance.dismiss('cancel');
  }
});
