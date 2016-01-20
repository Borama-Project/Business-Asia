//-------------Facebook---------------
//This controller retrieves data from the customersService and associates it with the $scope
//The $scope is ultimately bound to the customers view


app.controller('ngLog', [
    '$scope',
    '$timeout',
    '$http',
    'Facebook',
    function($scope, $timeout,$http, Facebook) {
     
      /**
       * Logout
       */
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
app.controller('ngApp', [
    '$scope',
    '$timeout',
    '$http',
    'Facebook',
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

app.controller('ngCategory', function ($scope,$http) {

    $scope.list = function(){
        $http({
            method: 'GET',
            url:  '/business/list',
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            $scope.categorys = response.data;
        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.list();

    $scope.listAllBusiness = function(){
        $http({
            method: 'GET',
            url:  '/business/list-all-business-data',
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            $scope.get_all_business = response.data;
        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.listAllBusiness();

    $scope.submit = function(){
        $http({
            method: 'POST',
            url:  '/business/save-category',
            data: $scope.globalVirable,
            dataType: "json"
        }).success(function(response) {
            $scope.list();
        }).error(function(response) {
            console.log(response);
        });
    };
});

app.controller('ngBusiness', function ($scope,$http,$modal,Upload,$log) {

  $scope.submit =  function(){
    
    var str = JSON.stringify($scope.app);
    if(str != ''){
      var dtRequest = str.slice(1,-1);;
      var doc= document.getElementsByName("moreInput");
      for (var i = doc.length - 1; i >= 0; i--) {
        if(doc[i].value){
          dtRequest += ',"'+doc[i].id+'":"'+doc[i].value+'"';
        }
      };
      dtRequest = '{'+dtRequest+'}';
      console.log(dtRequest);
      $http({
          method: 'POST',
          url:  '/business/search-business',
          data: dtRequest,
          dataType: "json"
      }).success(function(response) {
          console.log(response);
          $scope.get_all_business = response.data.business;
      }).error(function(response) {
          console.log(response);
      });
    }

  }
  $scope.moreOptons = function(){
    if(this.titleOpt == 'More Option'){
      $scope.Options = [{'title':'ID','ngModel':'tag','holder':'Businesss ID'},
                      {'title':'Name','ngModel':'name','holder':'Name'},
                      {'title':'Near By Type','ngModel':'nearbyType','holder':'Near By Type'}
                    ];
      $scope.titleOpt = 'Hide Option';
      $scope.my = { favorite: 'unicorns' };
    }else{
      $scope.Options = '';
      $scope.titleOpt = 'More Option';
    }
    
  }
  $scope.titleOpt = 'More Option';

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
        }
      }
    });

  };
  $scope.close = function(e){
    // $modalInstance.dismiss('cancel');
  }

});
app.controller('ngViewBusiness', function ($scope,$http,$routeParams) {

    // console.log($routeParams.businessId);

    $scope.submit =  function(){
      console.log($scope.item);
      // $http({
      //       method: 'POST',
      //       url:  '/business/view-business',
      //       data: dtRequest,
      //       dataType: "json"
      //   }).success(function(response) {
      //       console.log(response);
      //       $scope.get_all_business = response.data.business;
      //   }).error(function(response) {
      //       console.log(response);
      //   });
    }
    $scope.init = function(){
      $http({
          method: 'POST',
          url:  '/business/business-by-id',
          data: {businessId:$routeParams.businessId},
          dataType: "json"
      }).success(function(response) {
          console.log(response);
          $scope.item = response.data[0];
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
    $scope.submit = function
        (){

        Upload.upload({
            method: 'POST',
            url: '/business/register-business',
            data: {
                name:$scope.globalVirable.name,
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
                $scope.success = 'sucess';
            }
        });
    };


});

app.controller('ngProduct', function ($scope,$http) {

    $scope.submit = function(){
      // console.log($scope.app);
      $http({
          method: 'POST',
          url:  '/product/list-product',
          data: $scope.app,
          dataType: "json"
      }).success(function(response) {
          console.log(response);
          $scope.results  = JSON.stringify(response.message);
          $scope.Product = response.data;
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
            console.log(response);
            $scope.categorysLists = response.data;
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
            console.log(response.data);
            $scope.business = response.data;
        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.businessList();

    $scope.change = function(){
      // console.log(this);
      $http({
            url:  '/business/category',
            method: 'POST',
            data: {businessId:$scope.app.businessId},
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            $scope.category = response.data;
        }).error(function(response) {
            console.log(response);
        });  
    }
});
app.controller('ngGetProduct', function ($scope,$http,$routeParams) {

    // $scope.submit = function(){
    //   // console.log($scope.app);
    //   $http({
    //       method: 'POST',
    //       url:  '/product/product',
    //       data: $scope.app,
    //       dataType: "json"
    //   }).success(function(response) {
    //       console.log(response);
    //       // $scope.item = response.data[0];
    //   }).error(function(response) {
    //       console.log(response);
    //   });
    // };
});
app.controller('ngAddProduct', function ($scope,$http,Upload) {
    $scope.categorysList = function(){
        $http({
            method: 'GET',
            url:  '/business/list',
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            $scope.categorysLists = response.data;
        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.conditionList = function(){
        $http({
            method: 'GET',
            url:  '/product/product-condition',
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            $scope.conditions = response.data;
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
            console.log(response.data);
            $scope.business = response.data;
        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.businessList();
    $scope.conditionList();
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
    $scope.submit = function(){
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
            // console.log();
            $scope.app = '';
            if(response.code == 1){
                $scope.results = response.message.description;
                // $scope.BusinessFormName.$setPristine();
            }
        });
    };
    $scope.Upload = function(){
      console.log($scope.picFile);
      // $scope.picFile.push({'productId':'111111'});
      // console.log(JSON.stringify($scope.picFile.file1));
      // Upload.upload({
      //       method: 'POST',
      //       url: '/business/register-business',
      //       data: $scope.globalVirable,
      //       dataType: "json",
      //       contentType: false,
      //       cache: false,
      //       processData: false,
      //       headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      //   }).success(function (response) {
      //       console.log(response);
      //       if(response.code == 1){
      //           $scope.success = 'sucess';
      //           $scope.BusinessFormName.$setPristine();
      //       }
      //   });

    }

});
app.controller('ngPromotion', function ($scope,$http) {

    //I like to have an init() for controllers that need to perform some initialization. Keeps things in
    //one place...not required though especially in the simple example below
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

app.controller('nglistSelect', function ($scope,$http) {
    // $scope.list();
    console.log('nglistSelect');
});

app.controller('ModalInstanceDelete', function ($scope,$http, $modalInstance,title,contents,businessId) {
  $scope.title= title;
  $scope.contentTitle = contents;
  $scope.businessId= businessId;
  $scope.ok = function () {
    $http({
          method: 'POST',
          url:  '/business/delete-business-by-id',
          data: {businessId:$scope.businessId},
          dataType: "json"
      }).success(function(response) {
          console.log(response.message);
          // $scope.item = response.data[0];
          $modalInstance.close();
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
