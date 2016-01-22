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
        <th>Business Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Search</th>
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
            <div class="form-group">
                <button type="submit" id="submit" class="btn btn-default">Search</button>
            </div>
        </th>

    </tr>
    </thead>
    <tbody>
    <tr data-ng-repeat="item in get_all_business">
        <td >@{{ item.head.name }}</td>
        <td >@{{ item.head.phoneNumber }}</td>
        <td >@{{ item.head.email }}</td>
        <td >@{{ item.head.address }}</td>
        <td >
        	<div class="row">
              <div class="col-xs-3">
                    <A ng-href="#/business/@{{item.businessId}}">
                        <button type="button" name="btnMore" class="btn btn-default" >View</button>
                    </A>
              </div>
              <div class="col-xs-5">
                  <A ng-href="#/category/@{{item.businessId}}">
                     <button type="button" name="btnMore" class="btn btn-success">Category</button>
                  </A>
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
