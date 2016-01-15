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
                            <input type="text" class="form-control" ng-model="Distance" name="Distance" placeholder="Distance(km)">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Latitude</label>
                            <input type="text" class="form-control" ng-model="Latitude" name="Latitude" placeholder="Latitude">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Longitude</label>
                            <input type="text" class="form-control" ng-model="Longitude" name="Longitude" placeholder="Longitude">
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
        <th>Logo</th>

    </tr>
    <tr>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="moreInput" placeholder="Business Name">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="moreInput" placeholder="Phone Number">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="moreInput" placeholder="Email">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="moreInput" placeholder="Address">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" name="moreInput" placeholder="Logo">
            </div>
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
            <IMG width="40" height="40"
                    ng-src="@{{ get_all_businesss.logo }}">
            </IMG>
        </td>
    </tr>
    </tbody>
</table>

