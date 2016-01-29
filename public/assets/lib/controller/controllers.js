
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
                    if(data.code===1){
                      window.location = "/";
                    }
                    // console.log(data);
                    
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

app.controller('ngCategory', function ($scope,$modal,$http,$routeParams,usSpinnerService) {
    $scope.businessId = $routeParams.businessId;
    $scope.categoryId = $routeParams.categoryId;
    $scope.get_category_by_business_id_fun = function(){
        $http({
            method: 'POST',
            url:  '/business/get-category-by-business',
            data:  {businessId:$routeParams.businessId},
            dataType: "json"
        }).success(function(response) {
            //console.log(response);
            $scope.get_category_by_business_id = response.data;
        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.get_category_by_business_id_fun();

    $scope.get_category_by_id_fuc = function(){
        $http({
            method: 'POST',
            url:  '/business/get-category-by-id',
            data:  {
                businessId:$routeParams.businessId,
                categoryId:$routeParams.categoryId
            },
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            $scope.globalVirable={
                categoryName : response.data.name
            }
        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.get_category_by_id_fuc();

    $scope.get_business_by_id_fuc = function(){
    usSpinnerService.spin('spinner-1');
        $http({
            method: 'POST',
            url:  '/business/get-business-by-id',
            data:  {businessId:$routeParams.businessId},
            dataType: "json"
        }).success(function(response) {
            //console.log(response);
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

    $scope.submitEdit = function(){
        $http({
            method: 'POST',
            url:  '/business/edit-category',
            data: {
                categoryName:$scope.globalVirable.categoryName,
                businessId:$routeParams.businessId,
                categoryId:$routeParams.categoryId
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

    $scope.deleteCategoryById = function (size) {
        //console.log(this.item);
        $scope.name = this.item.name;
       $scope.businessId = $routeParams.businessId;
        $scope.categoeyId = this.item.id;
        var modalInstance = $modal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'deleteCategory',
            controller: 'ModalInstanceDeleteCategory',
            size: size,
            resolve: {
                title :function(){
                    return 'Delete';
                }
                ,contents :function(){
                    return 'Do you want to Delete Category name '+$scope.name;
                },businessId:function(){
                    return $scope.businessId;
                }
                ,categoryId:function(){
                    return $scope.categoeyId;
                }
                ,scopes:function(){
                    return $scope;
                }
            }
        });

    };
});

app.controller('ngBusiness', function ($scope,$http,$modal,Upload,$log,usSpinnerService,Pagination) {

  $scope.submit =  function(){
    var fdata= false;
    usSpinnerService.spin('spinner-1');
    if($scope.search){
      $.each($scope.search,function(key, value){
        if(value !=''){
          fdata= true;
          console.log(key);
          return false;
        }
      });
    }
    if(fdata === true){

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
              $scope.length = response.data.length;
              if(response.data.length <= 0){
                $scope.length =0;
              }
              $scope.pagination = Pagination.getNew(10);
              $scope.pagination.numPages = Math.ceil($scope.length/$scope.pagination.perPage);

            }else{
              $scope.err = response.message.description;
            }
          
      }).error(function(response) {
          console.log(response);
      });
    }else{
      $scope.results = 'Search can\'t null (BusinessName,Phone Number, Email, Address)';
      usSpinnerService.stop('spinner-1');
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
            $scope.search ='';
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
    //console.log(this.item);
    $scope.name = this.item.name;
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
        },productId:function(){
          return '';
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

    $scope.defaultImage = '/assets/img/img-photo-upload.png';

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
            
        });
    };
    $scope.listBusinessType();

    $scope.selectionTag=[];
    // toggle selection for a given employee by name
    $scope.toggleSelectionTag = function toggleSelectionTag(tagId) {
        var idx = $scope.selectionTag.indexOf(tagId);

        
        if (idx > -1) {
            $scope.selectionTag.splice(idx, 1);
        }
        
        else {
            $scope.selectionTag.push(tagId);
        }
    };
    
    $scope.submits = function(){

        Upload.upload({
            method: 'POST',
            url: '/business/register-business-fuc',
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
                businessTagList:$scope.globalVirable.businessTagList
            },
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            console.log(response);
            $scope.defaultImage = '/assets/img/img-photo-upload.png';
            $('#bFileUpload').attr('src', $scope.defaultImage);
            $('#coverFileUpload').attr('src', $scope.defaultImage);
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

app.controller('ngEditBusiness', function ($scope,$http,Upload,$routeParams){
    $scope.businessId = $routeParams.businessId;

    $scope.listBusinessTag = function(){
        $http({
            method: 'GET',
            url:  '/business/list-business-tag',
            dataType: "json"
        }).success(function(response) {
            //console.log(response);
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
            //console.log(response);
            $scope.businessType = response.data;
        }).error(function(response) {

        });
    };
    $scope.listBusinessType();

    $scope.get_business_by_id = function(){
        $http({
            method: 'POST',
            url:  '/business/business-by-id',
            data:{businessId:$scope.businessId},
            dataType: "json"
        }).success(function(response) {
            console.log(response.data );
            var logos = response.data[0].logo;
             $scope.cover = response.data[0].coverImage[0];
            if(logos == ''){
                var logos = '/assets/img/img-photo-upload.png';
            }
            if($scope.cover == null){
                $scope.cover = '/assets/img/img-photo-upload.png';
            }else{
                $scope.cover = response.data[0].coverImage[0];
            }
            var businessTagGlobla = response.data[0].businessTag[0];
            if(businessTagGlobla == null){
                businessTagGlobla = '';
            }else{
                businessTagGlobla = response.data[0].businessTag[0].id;
            }
            $scope.globalVirable = {
                businessname:response.data[0].name,
                description:response.data[0].description,
                phoneNumber:response.data[0].head.phoneNumber,
                longitute:response.data[0].head.loc.lon,
                latitute:response.data[0].head.loc.lat,
                email:response.data[0].head.email,
                locationname:response.data[0].head.name,
                address:response.data[0].head.address,
                businessTagList:businessTagGlobla,
                businessTypesList:response.data[0].businessType[0].id,
                logoEdit:logos,
                coverEdit:$scope.cover

            };

        }).error(function(response) {

        });
    };
    $scope.get_business_by_id();

    $scope.selectionTag=[];
    // toggle selection for a given employee by name
    $scope.toggleSelectionTag = function toggleSelectionTag(tagId) {
        var idx = $scope.selectionTag.indexOf(tagId);


        if (idx > -1) {
            $scope.selectionTag.splice(idx, 1);
        }

        else {
            $scope.selectionTag.push(tagId);
        }
    };

    $scope.submits = function(){

        $scope.listBusinessType = function(){
            $http({
                method: 'GET',
                url:  '/business/list-business-type',
                dataType: "json"
            }).success(function(response) {
                //console.log(response);
                $scope.businessType = response.data;
            }).error(function(response) {

            });
        };
        //console.log($scope.businessType.id);
        var businessTypeListForEach ='';
        angular.forEach($scope.businessType, function(value, key) {
            console.log(value['id']);
            if(value['id'] == $scope.globalVirable.businessTypesList){
                 businessTypeListForEach = value;
                console.log(value);
            }

        });
        Upload.upload({

            method: 'POST',
            url: '/business/edit-business-fuc',
            data: {
                businessId:$scope.businessId,
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
                oldCover:$scope.cover,
                businessTypeList:businessTypeListForEach,
                businessTagList:$scope.globalVirable.businessTagList
            },
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            console.log(response)
            if(response.code == 1){
                $scope.success = 'sucess';
                $scope.businessName = response.data.name;
            }else{
                $scope.errorSMS = response.message.description;
            }
        });
    };
});

app.controller('ngProduct', function ($scope,$http,$routeParams,$modal,usSpinnerService) {
  $scope.businessId = $routeParams.businessId;
  $scope.categoryId = $routeParams.categoryId;

  usSpinnerService.spin('spinner-1'); 
  $scope.get_category_by_id_fuc = function(){
        $http({
            method: 'POST',
            url:  '/business/get-category-by-id',
            data:  {
                businessId:$routeParams.businessId,
                categoryId:$routeParams.categoryId
            },
            dataType: "json"
        }).success(function(response) {
            if(response.code ==1){
              $scope.app=response.data;
            }
            console.log($scope.app);
        }).error(function(response) {
            console.log(response);
        });
    };
  $scope.get_category_by_id_fuc();
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

  $scope.productList = function(){
      $http({
          method: 'POST',
          url:  '/product/list-product',
          data:{categoryId:$scope.categoryId,businessId:$scope.businessId},
          dataType: "json"
      }).success(function(response) {
        console.log(response);
          if(response.code ==1){
            usSpinnerService.stop('spinner-1');
            $scope.Products = response.data;
            $scope.results = response.message.description;
          }else{
            $scope.results = response.message.description;
          }
          
      }).error(function(response) {
          console.log(response);
      });
  };
  $scope.productList();

  $scope.deleteById = function (size) {
    $scope.name = this.item.name;
    $scope.productId = this.item.productId;
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
          return 'Do you want to Delete Product : '+$scope.name;
        },businessId:function(){
          return $scope.businessId;
        },productId:function(){
          return $scope.productId;
        },scopes:function(){
          return $scope;
        }
      }
    });

  };
});
app.controller('ngGetProduct', function ($scope,$http,$routeParams) {

});
app.controller('ngAddProduct', function ($scope,$http,$routeParams,$sce,Upload,usSpinnerService) {
  $scope.categoryids =$routeParams.categoryId;
  $scope.businessId =$routeParams.businessId;
  $scope.currencys = [{id:'1',name:'USD'},{id:'2',name:'Riels'}];
  $scope.app = {file0:'/assets/img/img-photo-upload.png',
                file1:'/assets/img/img-photo-upload.png',
                file2:'/assets/img/img-photo-upload.png',
                file3:'/assets/img/img-photo-upload.png'}
  $scope.productId = $routeParams.productId;
  $scope.loadProductbyId = function(){
    $http({
          method: 'POST',
          url:  '/product/list-product',
          data: {productId:$scope.productId},
          dataType: "json"
      }).success(function(response) {
        if(response.code ==1){
          response = response.data;
          console.log(response);
          $scope.response = response;
          $scope.apps = {name:response.businessName,
            price:response.price,dateStart:response.publishDate.dateStart,
            dateEnd:response.publishDate.dateEnd,condition:response.condition,description:response.description,productId:response.productId,
            productCategoryId:response.productCategoryId,listBusinessTag:response.businessTag[0].id,currency:response.currency
          }
          var appResult = JSON.stringify($scope.apps).slice(1,-1);
          var imageGallery = response.imageGallery;
          var imgLen = imageGallery.length;
          for (var i = 0; i < 4; i++) {
            if(i < imgLen){
              url = imageGallery[i];
            }else{
              url = "/assets/img/img-photo-upload.png";
            }
            appResult += ',"file'+i+'":"'+url+'"';
          };
          appResult = '{'+appResult+'}';
          $scope.app = JSON.parse(appResult);
          usSpinnerService.stop('spinner-1');
        }else{

        }
          
      }).error(function(response) {
          console.log(response);
      });
  }
  
  $scope.inputFile=[];
  $scope.ngTrigger = function(fname){
    $( "#"+ fname).trigger( "click" );
  }

  $scope.categorysList = function(callback){
      $http({
          method: 'GET',
          url:  '/business/list-product-category',
          dataType: "json"
      }).success(function(response) {
          if(response.code ==1){
            usSpinnerService.stop('spinner-1');
            $scope.categorysLists = response.data;
            $scope.results = response.message.description;
            if(callback){
              callback();
            }
          }else{
            $scope.err = response.message.description;
          }
      }).error(function(response) {
          
      });
  };
  $scope.conditionList = function(callback){
      $http({
          method: 'GET',
          url:  '/product/product-condition',
          dataType: "json"
      }).success(function(response) {
        // console.log(response);
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

  $scope.businessTags = function(){
    $http({
          method: 'GET',
          url:  '/business/list-business-tag',
          dataType: "json"
      }).success(function(response) {
          if(response.code ==1){
            usSpinnerService.stop('spinner-1');
            $scope.listBusinessTag = response.data;
            console.log($scope.listBusinessTag);
            $scope.results = response.message.description;
            usSpinnerService.stop('spinner-1');
            document.getElementById("mySelect").selectedIndex = "4";
          }else{
            $scope.err = response.message.description;
          }
      }).error(function(response) {
          
      });
  }
  
  $scope.submit = function(){
      
    var listBusinessTag = $scope.app.listBusinessTag;
    if(listBusinessTag!=''){
      usSpinnerService.spin('spinner-1');
      if($scope.productId){
        console.log($scope.productId+' update');
          Upload.upload({
              method: 'POST',
              url: '/product/update-product',
              data: {name:$scope.app.name,productCategoryId:$scope.app.productCategoryId,currency:$scope.app.currency,
                dateStart:$scope.app.dateStart,dateEnd:$scope.app.dateEnd,condition:$scope.app.condition,price:$scope.app.price,image1:$scope.app.file0,
                image2:$scope.app.file1,image3:$scope.app.file2,image4:$scope.app.file3,productId:$scope.productId,
              description:$scope.app.description,listBusinessTag:listBusinessTag,categoryId:$routeParams.categoryId,businessId:$routeParams.businessId},
              dataType: "json",
              contentType: false,
              cache: false,
              processData: false,
              headers: {'Content-Type': 'application/x-www-form-urlencoded'}
          }).success(function (response) {
              console.log(this);
              usSpinnerService.stop('spinner-1');
              $scope.results = JSON.stringify(response);
              console.log(response);
              // if(response.code == 1){
              //     $scope.results = response.message.description;
                  
              // }else{
              //   $scope.results = response.message.description;
              // }
          });
      }else{
        // console.log('insert');
        Upload.upload({
            method: 'POST',
            url: '/product/product',
            data: {name:$scope.app.name,productCategoryId:$scope.app.productCategoryId,currency:$scope.app.currency,
              dateStarts:$scope.app.dateStarts,dateEnds:$scope.app.dateEnds,condition:$scope.app.condition,price:$scope.app.price,image1:$scope.app.file0,
              image2:$scope.app.file1,image3:$scope.app.file2,image4:$scope.app.file3,
            description:$scope.app.description,listBusinessTag:listBusinessTag,categoryId:$routeParams.categoryId,businessId:$routeParams.businessId},
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            console.log(this);
            usSpinnerService.stop('spinner-1');
            $scope.results = JSON.stringify(response);
            
            if(response.code == 1){
                $scope.results = response.message.description;
                $scope.app = '';
                $scope.app = {file0:'/assets/img/img-photo-upload.png',
                  file1:'/assets/img/img-photo-upload.png',
                  file2:'/assets/img/img-photo-upload.png',
                  file3:'/assets/img/img-photo-upload.png'}
                window.history.back();
            }else{
              $scope.results = response.message.description;
            }
        });
      }
      
      
    }else{
      $scope.results = 'please select business Tag to add product';
    }
  };
  
  $scope.categorysList(function(){
      usSpinnerService.spin('spinner-1');
      $scope.conditionList(function(){
        $scope.businessTags();
        if($scope.productId != '') {
          $scope.loadProductbyId();
        }
      });
    });
  
  $scope.upload = function(fthis){
    $( "#"+ fthis).trigger( "click" );
    $scope.results='upload';
  }
  $scope.uploadFile = function(fthis){
    var fname = 'file'+fthis;
    $scope.url = $scope.app[fname];
    console.log($scope.url);
     if($scope.url != '/assets/img/img-photo-upload.png'){
      usSpinnerService.spin('spinner-1');
        Upload.upload({
            method: 'POST',
            url: '/product/product-gallery',
            data: {productId:$scope.productId,businessId:$scope.businessId,image:$scope.url},
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            $http({
              method: 'POST',
              url:  '/product/delete-gallery',
              data: {productId:$scope.productId,imageUrl:$scope.response.imageGallery[fthis]},
              dataType: "json"
            }).success(function(response) {
                usSpinnerService.stop('spinner-1');
            }).error(function(response) {
               
                console.log(response);
            });
        });
      
    }
  }
  $scope.delete = function(fthis){
    $scope.productId = this.productId;
    $scope.businessId = this.businessId;
    var url = $scope.app[fthis];
    $scope.results=url;
    if(url != '/assets/img/img-photo-upload.png'){
       
        $http({
          method: 'POST',
          url:  '/product/delete-gallery',
          data: {productId:$scope.productId,imageUrl:url},
          dataType: "json"
        }).success(function(response) {
            $scope.results = JSON.stringify(response);
            $scope.app[fthis] = '/assets/img/img-photo-upload.png';
        }).error(function(response) {
           $scope.app[fthis] = '/assets/img/img-photo-upload.png';
            console.log(response);
        });
    }
    
  }
  $scope.monthSelectorOptions = {
    start: "year",
    depth: "year"
  };
  $scope.getType = function(x) {
    return typeof x;
  };
  $scope.isDate = function(x) {
    return x instanceof Date;
  };
});
app.controller('ngManage', function ($scope,$http,$modal,usSpinnerService,Pagination) {
  $scope.selectCategory = [{id:'1',name:'Most popular'},
      {id:'2',name:'New this Week'},
      {id:'3',name:'New this Month'},
      {id:'4',name:'Brand new'}
  ];

  $scope.categorysList = function(callback){
    $http({
        method: 'GET',
        url:  'business/list-product-category',
        dataType: "json"
    }).success(function(response) {
        if(response.code ==1){
          $scope.categorysLists = response.data;
          if(callback){
              callback();
            }
        }else{
          $scope.err = response.message.description;
        }
    }).error(function(response) {
        
    });
  }

  $scope.conditionList = function(callback){
      $http({
          method: 'GET',
          url:  '/product/product-condition',
          dataType: "json"
      }).success(function(response) {
          if(response.code ==1){
            $scope.conditions = response.data;
            console.log($scope.conditions);
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

  $scope.businessTags = function(){
    $http({
          method: 'GET',
          url:  '/business/list-business-tag',
          dataType: "json"
      }).success(function(response) {
          if(response.code ==1){
            $scope.listBusinessTag = response.data;
            console.log($scope.listBusinessTag);
          }else{
            $scope.err = response.message.description;
          }
      }).error(function(response) {
          
      });
  }
  
   $scope.categorysList(function(){
    $scope.conditionList(function(){
      $scope.businessTags();
    });
  });
    
  $scope.submit = function(){
    $http({
        method: 'POST',
        url:  '/product/most-popular',
        data:$scope.app,
        dataType: "json"
    }).success(function(response) {
      console.log(response);
      $scope.Products = response.data;
      $scope.length = response.data.length;
      if(response.data.length <= 0){
        $scope.length =0;
      }
      $scope.pagination = Pagination.getNew(6);
      $scope.pagination.numPages = Math.ceil($scope.length/$scope.pagination.perPage);
      // $scope.results = JSON.stringify(response);
    }).error(function(response) {
        console.log(response);
    });
  }
  $scope.ngView = function(){
    $scope.productId = this.item.productId;
    usSpinnerService.spin('spinner-1'); 
    $http({
        method: 'POST',
        url:  '/product/list-product',
        data: {productId:$scope.productId},
        dataType: "json"
    }).success(function(response) {
      if(response.code ==1){
        usSpinnerService.stop('spinner-1');
        $scope.response = response.data;
        // $scope.name= response.businessName;
        // $scope.app = {name:response.businessName}
        
        var modalInstance = $modal.open({
        animation: $scope.animationsEnabled,
        templateUrl: 'ModalProductList',
        controller: 'ModalInstancelstProduct',
        size: '',
        resolve: {
          title :function(){
            return 'Add Product list';
          }
          ,scopes:function(){
            return $scope;
          },ngScrope:function(){
            return $scope.response;
          }
        }
      });
      }
    }).error(function(response) {
        console.log(response);
    });
  }
  $scope.ngAdd = function(){
    $http({
        method: 'POST',
        url:  '/product/editor-choice',
        data: this.item,
        dataType: "json"
    }).success(function(response) {
      console.log(response);
      
    }).error(function(response) {
        console.log(response);
    });
  }
  $scope.searchList = function(){
    $http({
        method: 'POST',
        url:  '/product/all-edit-list',
        data: this.item,
        dataType: "json"
    }).success(function(response) {
      console.log(response);
      
    }).error(function(response) {
        console.log(response);
    });
  }
  $scope.searchList();

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
       // console.log('ngHome');
    }
});

app.controller('ngAuth', function ($scope,$http) {
 
    $scope.submit = function(){
      $http({
          method: 'POST',
          url:  '/Admin/login',
          data:$scope.app,
          dataType: "json"
      }).success(function(response) {
        console.log(response);
        if(response.code ===1){

          window.location = "/Auth";
        }else{
          // $scope.err = response.message.description;
        }
      }).error(function(response) {
          console.log(response);
      });
    }
});

app.controller('ModalInstanceDelete', function ($scope,$http, $modalInstance,title,contents,businessId,productId,scopes) {
  $scope.title= title;
  $scope.contentTitle = contents;
  $scope.businessId= businessId;
  $scope.scopes = scopes;
  $scope.productId = productId;
  
  $scope.ok = function () {
    // validation function
    var fdata= false;
    if($scope.scopes.search){
      $.each($scope.scopes.search,function(key, value){
        if(value !=''){
          fdata= true;
        }
      });
    }
    if($scope.productId !=''){
      console.log($scope.scopes);
        $http({
          method: 'POST',
          url:  '/product/delete-product-by-id',
          data: {productId:$scope.productId,businessId:$scope.businessId},
          dataType: "json"
        }).success(function(response) {
            $modalInstance.close();
            $scope.scopes.productList();
        }).error(function(response) {
            console.log(response);
        });
    }else{
        $http({
          method: 'POST',
          url:  '/business/delete-business-by-id',
          data: {businessId:$scope.businessId},
          dataType: "json"
        }).success(function(response) {
            $modalInstance.close();
            if(fdata === true){
              $scope.scopes.submit();
            }else{
              $scope.scopes.listAllBusiness();
            }
        }).error(function(response) {
            console.log(response);
        });
    }
    
  };

  $scope.cancel = function () {
    $modalInstance.dismiss('cancel');
  };
  $scope.close = function(e){
    $modalInstance.dismiss('cancel');
  }
});


app.controller('ModalInstanceDeleteCategory', function ($scope,$http, $modalInstance,title,contents,businessId,categoryId,scopes) {
    $scope.title= title;
    $scope.contentTitle = contents;
    $scope.businessId= businessId;
    $scope.categoryId=categoryId;
    console.log($scope.scopes = scopes);
    $scope.ok = function () {
        $http({
            method: 'POST',
            url:  '/business/delete-category',
            data: {
                businessId:$scope.businessId,
                categoryId:$scope.categoryId
            },
            dataType: "json"
        }).success(function(response) {
            $modalInstance.close();
            $scope.scopes.get_category_by_business_id_fun();

            console.log(response)
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


app.controller('ModalInstancelstProduct', function ($scope,$http, $modalInstance,title,ngScrope,scopes) {
    $scope.title= title;
    $scope.scopes = scopes;
    $scope.ngScrope = ngScrope;
    $scope.listBusinessTag = $scope.scopes.listBusinessTag;
    $scope.conditions = $scope.scopes.conditions;
    $scope.categorysLists = $scope.scopes.categorysLists;
    $scope.currencys = [{id:'1',name:'USD'},{id:'2',name:'Riels'}];
    $scope.app = $scope.ngScrope;

    $scope.ok = function () {
      console.log($scope.scopes);
        // $http({
        //     method: 'POST',
        //     url:  '/business/delete-category',
        //     data: {
        //         businessId:$scope.businessId,
        //         categoryId:$scope.categoryId
        //     },
        //     dataType: "json"
        // }).success(function(response) {
        //     $modalInstance.close();
        //     $scope.scopes.get_category_by_business_id_fun();

        //     console.log(response)
        // }).error(function(response) {
        //     console.log(response);
        // });
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
    $scope.close = function(e){
        $modalInstance.dismiss('cancel');
    }
});
