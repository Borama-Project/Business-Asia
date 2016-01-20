<div class="col-lg-12"> 

<div class="panel panel-info">
	  <div class="panel-body">
	   	<h3>Business</h3>
	  </div>
</div>

<div class="col-lg-12 pd-lef-10  pd-right-0 list-group-item">
    <a ng-href="#/business/register/Business" >
        <button type="button" name="btnMore" class="btn btn-success" >Register Business</button>
    </a>
</div>
<table class="table table-condensed">
    <thead> 
    <tr>
        <th colspan ="5" >
           <tbody>
               <tr>
                   <td colspan ="5">
                    <form ng-submit="submit()">
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Distance</label>
                            <input type="text" class="form-control" ng-model="app.distance" name="Distance" placeholder="Distance(km)" required="">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Latitude</label>
                            <input type="text" class="form-control" ng-model="app.latitude" name="Latitude" placeholder="Latitude" required="">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Longitude</label>
                            <input type="text" class="form-control" ng-model="app.longitude" name="Longitude" placeholder="Longitude" required="">
                        </div>
                        <div class="form-group col-xs-1">
                            <button type="submit" id="submit" class="btn btn-default">Search</button>
                        </div>
                        <div class="form-group col-xs-10">
                            <button type="button" name="btnMore" class="btn btn-default" ng-click="moreOptons()">@{{titleOpt}}</button>
                        </div>
                        <div class="form-group col-xs-4" ng-repeat="option in Options">
                            <label for="exampleInputName2">@{{ option.title }}</label>
                            <input type="text" class="form-control" id="@{{ option.ngModel }}" name="moreInput" placeholder="@{{ option.holder }}">
                        </div>
                    </form>
                   </td>
               </tr>
           </tbody>
        </th>
    </tr>
    <tr>
        <th>Business Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Manage</th>
    </tr>
    <tr>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.head.name" placeholder="Business Name">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.head.phoneNumber" placeholder="Phone Number">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.head.email" placeholder="Email">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.head.address" placeholder="Address">
            </div>
        </th>
        <th>
            
        </th>

    </tr>
    </thead>
    <tbody>
    <tr data-ng-repeat="item in get_all_business | filter:search:strict">
        <td >@{{ item.head.name }}</td>
        <td >@{{ item.head.phoneNumber }}</td>
        <td >@{{ item.head.email }}</td>
        <td >@{{ item.head.address }}</td>
        <td >
        	<div class="row">
              <div class="col-xs-3">
                    <A ng-href="#/business/@{{item.businessId}}">
                        <button type="button" name="btnMore" class="btn btn-default" >View</button>
                    </a>
              </div>
              <div class="col-xs-5">
                  <button type="button" name="btnMore" class="btn btn-success" ng-click="viewBusiness()">Catalogue</button>
              </div>
              <div class="col-xs-4">
                  <button type="button" name="btnMore" class="btn btn-danger" ng-click="deleteById('sm')">Delete</button>
              </div>
			</div>
        </td>
    </tr>
    </tbody>
</table>



</div>
