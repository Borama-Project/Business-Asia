<div class="col-lg-12"> 
	<div class="panel panel-info">
	  <div class="panel-body">
		<h3>Add Products</h3>
	  </div>
	</div>
	<div class="col-lg-12 pd-lef-10  pd-right-0 list-group-item">
        <a ng-href="#/products/product" >
            <button type="button" name="btnMore" class="btn btn-success" >Add Product</button>
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
                            <label for="exampleInputName2">Product ID</label>
                            <input type="text" class="form-control" ng-model="app.productId" name="Distance" placeholder="Product ID">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Product Category</label>
                            <input type="text" class="form-control" ng-model="app.productCategoryId" name="Latitude" placeholder="Product Category" >
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Business ID</label>
                            <input type="text" class="form-control" ng-model="app.businessId" name="Longitude" placeholder="Business ID">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Promotion ID</label>
                            <input type="text" class="form-control" ng-model="app.promotionId" name="Longitude" placeholder="Promotion ID">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Category</label>
                            <input type="text" class="form-control" ng-model="app.categoryId" name="Longitude" placeholder="Category">
                        </div>
                        <div class="form-group col-xs-12">
                            <button type="submit" id="submit" class="btn btn-success">Search</button>
                        </div>
                    </form>
                   </td>
               </tr>
           </tbody>
        </th>
    </tr>
    <tr>
        <th>Product Name</th>
        <th>ProductCategoryId</th>
        <th>Business ID</th>
        <th>Promotion ID</th>
        <th>Category</th>
        <th>Manage</th>
    </tr>
    <tr>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.head.name" placeholder="Product Name">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.head.phoneNumber" placeholder="ProductCategoryId">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.head.email" placeholder="Promotion ID">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.head.address" placeholder="Category">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.head.address" placeholder="Category">
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