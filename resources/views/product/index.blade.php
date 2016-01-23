<div class="col-lg-12"> 
	<div class="panel panel-info">
	  <div class="panel-body">
		<h3>Add Products</h3>
        @{{businessId}}
	  </div>
	</div>
	<div class="col-lg-12 pd-lef-10  pd-right-0 list-group-item">
        <A ng-href="#/products/add/@{{categoryId}}/business/@{{businessId}}">
            <button type="button" name="btnMore" class="btn btn-success" >Add Product</button>
        </a>
    </div>
    <div class="form-group col-xs-12 pd-lef-0">
        <!-- <pre>@{{results}}</pre> -->
        <div class="alert alert-success">
          <strong>@{{results}}</strong> 
        </div>
    </div>
    <table class="table table-condensed">
    <thead> 
    <tr>
        <th>Product Name</th>
        <th>ProductCategoryId</th>
        <th>Business ID</th>
        <th>Promotion ID</th>
        <th>price</th>
        <th>Manage</th>
    </tr>
    </thead>
    <tbody>
    <tr data-ng-repeat="item in Products | filter:search:strict">
        <td >@{{ item.name }}</td>
        <td >@{{ item.productCategoryId }}</td>
        <td >@{{ item.businessId }}</td>
        <td >@{{ item.businessId }}</td>
        <td >@{{ item.price }}</td>
        <td >
        	<div class="row">
              <div class="col-xs-3">
                    <A ng-href="#/products/product/@{{item.productId}}">
                        <!-- <button type="button" name="btnMore" class="btn btn-default" >View</button> -->
                    </a>
              </div>
              <!-- <div class="col-xs-5">
                  <button type="button" name="btnMore" class="btn btn-success" ng-click="viewBusiness()">Catalogue</button>
              </div>
              <div class="col-xs-4">
                  <button type="button" name="btnMore" class="btn btn-danger" ng-click="deleteById('sm')">Delete</button>
              </div> -->
			</div>
        </td>
    </tr>
    <tr>
        <td >@{{ items.name }}</td>
        <td >@{{ items.productCategoryId }}</td>
        <td >@{{ items.businessId }}</td>
        <td >@{{ items.businessId }}</td>
        <td >@{{ items.price }}</td>
        <td >
            <div class="row">
              <div class="col-xs-3">
                    <A ng-href="#/products/product/@{{items.productId}}">
                        <!-- <button type="button" name="btnMore" class="btn btn-default" >View</button> -->
                    </a>
              </div>
              <!-- <div class="col-xs-5">
                  <button type="button" name="btnMore" class="btn btn-success" ng-click="viewBusiness()">Catalogue</button>
              </div>
              <div class="col-xs-4">
                  <button type="button" name="btnMore" class="btn btn-danger" ng-click="deleteById('sm')">Delete</button>
              </div> -->
            </div>
        </td>
    </tr>
    </tbody>
</table>
</div>