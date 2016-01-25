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
<form ng-submit="submit()">
<table class="table table-condensed">
    
    <thead>
    <tr>
        <th>Nº</th>
        <th>Business Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Search</th>
    </tr>
    <tr>
        <th></th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.name" placeholder="Business Name">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.phoneNumber" placeholder="Phone Number">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.email" placeholder="Email">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.address" placeholder="Address">
            </div>
        </th>
        <th width="280px" align="right">
            <div class="form-group">
                <button type="submit" id="submit" class="btn btn-default">Search</button>
            </div>
        </th>
    </tr>
    </thead>
    
    <tbody>
    <tr data-ng-repeat="item in get_all_business | startFrom: pagination.page * pagination.perPage | limitTo: pagination.perPage">
        <td >@{{ $index + 1 }}</td>
        <td >@{{ item.name }}</td>
        <td >@{{ item.head.phoneNumber }}</td>
        <td >@{{ item.head.email }}</td>
        <td >@{{ item.head.address }}</td>
        <td >
              <div class="col-xs-12 pd-lef-0 pd-right-0">
                <A ng-href="#/category/@{{item.businessId}}">
                    <button type="button" name="btnMore" class="btn btn-success">Category</button>
                </A>
                {{--<A ng-href="#/business/@{{item.businessId}}">--}}
                    {{--<button type="button" name="btnMore" class="btn btn-default" >View</button>--}}
                {{--</A>--}}
                <A ng-href="#/business/edit/Business/@{{item.businessId}}">
                    <button type="button" name="btnMore" class="btn btn-default" >Edit</button>
                </A>
                <button type="button" name="btnMore" class="btn btn-danger" ng-click="deleteById('sm')">Delete</button>
              </div>
        </td>
    </tr>
    <tr>
        <td colspan="5" align="center">
            <ul class="pagination">
                  <li><a href="" ng-click="pagination.prevPage()">&laquo;</a></li>
                  <li ng-repeat="n in [] | range: pagination.numPages" ng-class="{active: n == pagination.page}">
                  <a href="" ng-click="pagination.toPageId(n)">@{{n + 1}}</a>
                  </li>
                  <li><a href="" ng-click="pagination.nextPage()">&raquo;</a></li>
            </ul>
        </td>
    </tr>
    </tbody>
</table>
</form>


</div>
