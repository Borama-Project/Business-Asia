<div class="col-lg-12"> 

<div class="panel panel-info">
	  <div class="panel-body">
	   	<h1>Business</h1>
	  </div>
</div>
<div class="list-group col-lg-2" >
	<A ng-href="#/registerBusiness" class="list-group-item">Register Business</A>
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
                            <input type="text" class="form-control" ng-model="app.distance" name="Distance" placeholder="Distance(km)">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Latitude</label>
                            <input type="text" class="form-control" ng-model="app.latitude" name="Latitude" placeholder="Latitude">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Longitude</label>
                            <input type="text" class="form-control" ng-model="app.longitude" name="Longitude" placeholder="Longitude">
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
                <input type="text" class="form-control" name="" placeholder="Business Name">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Phone Number">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Email">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Address">
            </div>
        </th>
        <th>
            
        </th>

    </tr>
    </thead>
    <tbody>
    <tr data-ng-repeat="get_all_businesss in get_all_business">
        <td >@{{ get_all_businesss.head.name }}</td>
        <td >@{{ get_all_businesss.head.phoneNumber }}</td>
        <td >@{{ get_all_businesss.head.email }}</td>
        <td >@{{ get_all_businesss.head.address }}</td>
        <td >
        	<div class="row">
			  <div class="col-md-3">View</div>
			  <div class="col-md-6">ManageCatalog</div>
			  <div class="col-md-3">Delete</div>
			</div>
        </td>
    </tr>
    </tbody>
</table>

<style>
    
.ng-enter{
    transition:0.75s;
    opacity: 0;
}
.ng-enter-stagger{
    transition-delay:0.1s;
}
.ng-enter-active{
    opacity: 1;
}
.ng-leave{
    transition:0.75s;
    opacity: 1;
}
.ng-leave-active{
    opacity: 0;
}
</style>
</div>

