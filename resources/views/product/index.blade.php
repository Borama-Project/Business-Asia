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
                            <input type="text" class="form-control" ng-model="app.productId" name="productId" placeholder="Product ID">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Product Category</label>
                            <!-- <input type="text" class="form-control" ng-model="app.productCategoryId" name="Latitude" placeholder="Product Category" > -->
                            <select ng-model="app.productCategoryId" class="form-control" id="tagList"  name="select">
                                <option value=""> </option>
                                <option ng-repeat="item in categorysLists" value="@{{ item.id }}"> @{{ item.name }} </option>
                            </select>
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Business ID</label>
                            <!-- <input type="text" class="form-control" ng-model="app.businessId" name="Longitude" placeholder="Business ID"> -->

                            <select ng-model="app.businessId" ng-change="change()" class="form-control"   name="select" >
                                <option value=""> </option>
                                <option ng-repeat="item in business" value="@{{ item.businessId }}"> @{{ item.head.name }} </option>
                            </select>
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Promotion ID</label>
                            <input type="text" class="form-control" ng-model="app.promotionId" name="promotionId" placeholder="Promotion ID">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputName2">Category</label>
                            <!-- <input type="text" class="form-control" ng-model="app.categoryId" name="Longitude" placeholder="Category"> -->
                            <select ng-model="app.categoryId" class="form-control"  name="select" >
                                <option value=""> </option>
                                <option ng-repeat="item in category" value="@{{ item.id }}"> @{{ item.name }} </option>
                            </select>
                        </div>
                        <div class="form-group col-xs-12">
                            <button type="submit" id="submit" class="btn btn-success">Search</button>
                            <!-- <pre>@{{results}}</pre> -->
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
        <th>price</th>
        <th>Manage</th>
    </tr>
    <tr>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.name" placeholder="Product Name">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.productCategoryId" placeholder="ProductCategoryId">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.businessId" placeholder="Promotion ID">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.businessId" placeholder="Category">
            </div>
        </th>
        <th>
            <div class="form-group">
                <input type="text" class="form-control" ng-model="search.price" placeholder="Category">
            </div>
        </th>
        <th>
            
        </th>

    </tr>
    </thead>
    <tbody>
    <tr data-ng-repeat="item in Product | filter:search:strict">
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
                        <button type="button" name="btnMore" class="btn btn-default" >View</button>
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