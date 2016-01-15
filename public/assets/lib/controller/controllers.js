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

app.controller('ngBusiness', function ($scope,$http,Upload) {

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
            //console.log(response);
            $scope.businessType = response.data;
        }).error(function(response) {
            //console.log(response);
        });
    };
     $scope.listBusinessType();

    $scope.submit = function(){
        Upload.upload({
            method: 'POST',
            url: '/business/register-business',
            data: $scope.globalVirable,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            console.log(response);
        });
    };
});
app.controller('ngBusinessType', function ($scope,$http) {

    //I like to have an init() for controllers that need to perform some initialization. Keeps things in
    //one place...not required though especially in the simple example below
    init();
    function init() {
       console.log('businessType');
    }
});

app.controller('ngBusinessTag', function ($scope,$http) {

    //I like to have an init() for controllers that need to perform some initialization. Keeps things in
    //one place...not required though especially in the simple example below
    init();
    function init() {
        console.log('businessTag');
    }
});

app.controller('ngProduct', function ($scope,$http) {

    $scope.list = function(){
        $http({
            method: 'GET',
            url:  '/product/list',
            dataType: "json"
        }).success(function(response) {
            console.log(response);
            $scope.products = response;
        }).error(function(response) {
            console.log(response);
        });
    };
    $scope.list();

    $scope.submit = function(){

        $http.get('C:/wamp/www/AsianBusiness/public/content.json').success(function(response) {
            return response.data;
        });
    };

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

app.controller('ngListAllBusiness', function ($scope,$http) {

    // $scope.list = function(){
    //     $http({
    //         method: 'GET',
    //         url:  '/business/list-all-business-data',
    //         dataType: "json"
    //     }).success(function(response) {
    //         console.log(response);
    //         $scope.get_all_business = response.data;
    //     }).error(function(response) {
    //         console.log(response);
    //     });
    // };
    $scope.submit =  function(){
      
      // var datas = {};
      var str = JSON.stringify($scope.app);
      if(str != ''){
        var dtRequest = str.slice(1,-1);;
        var doc= document.getElementsByName("moreInput");
        for (var i = doc.length - 1; i >= 0; i--) {
          if(doc[i].value){
             // console.log(i+'-'+doc.length);
            // if(i == doc.length -1){
            //   console.log(i);
            //   cbs += '"'+doc[i].id+'":"'+doc[i].value+'"';
            // }else{
              dtRequest += ',"'+doc[i].id+'":"'+doc[i].value+'"';
            // }
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

      // $http({
      //     method: 'POST',
      //     url:  '/business/search-business',
      //     data:{datas},
      // }).success(function(response) {
      //     console.log(response);
      //     // $scope.get_all_business = response.data;
      // }).error(function(response) {
      //     console.log(response);
      // });

      // var datas = $.param({
      //     distance: $scope.distance,
      //     latitude: $scope.latitude,
      //     longitude: $scope.longitude,
      // });
      // datas +=$.param({
      //     distance: $scope.Distance,
      //     latitude: $scope.Latitude,
      //     longitude: $scope.longitude,
      // });
      // console.log(datas);
  
      // $http.post('/business/search-business', datas)
      // .success(function (datas, status, headers) {
          
      //     console.log(datas);
      // })
      // .error(function (datas, status, header) {
      //     $scope.ResponseDetails = "Data: " + datas +
      //         "<hr />status: " + status +
      //         "<hr />headers: " + header ;
      // });
      
      // ft.push({'data':'data'});
      
      
     
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
    // $scope.list();
});