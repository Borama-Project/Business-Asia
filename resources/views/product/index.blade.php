<div class="col-lg-12"> 
	<div class="panel panel-info">
	  <div class="panel-body">
	   <h3>Products</h3>
      <a ng-href="#/business">Business</a> >
        <a ng-href="#/category/@{{businessId}}">Category</a> 
	  </div>
	</div>
	<div class="col-lg-12 pd-lef-10  pd-right-0 list-group-item">
        <A ng-href="#/products/add/@{{categoryId}}/business/@{{businessId}}">
            <button type="button" name="btnMore" class="btn btn-primary btn-xs" >Add Product</button>
        </a>
    </div>
    <!-- <div class="form-group col-xs-12 pd-lef-0">
        <div class="alert alert-success">
          <strong>@{{results}}</strong> 
        </div>
    </div> -->
    <table class="table table-condensed">
    <thead> 
    <tr>
        <th>Nº</th>
        <th>Product Name</th>
        <th>Business Name</th>
        <th>price</th>
        <th>ProductCategoryId</th>
        <th >Manage</th>
    </tr>
    </thead>
    <tbody>
    <tr data-ng-repeat="item in Products | filter:search:strict">
        <td >@{{ $index +1 }}</td>
        <td >@{{ item.name }}</td>
        <td >@{{ item.businessName }}</td>
        <td >@{{ item.price }} </td>
        <td >@{{ item.productCategoryId }}</td>
        <td width="100px">
        	<div class="row">
              <div class="col-xs-4">
                    <a ng-href="#/products/product/@{{item.productId}}/@{{categoryId}}/@{{businessId}}">
                        <button type="button" name="btnMore" class="btn btn-default  btn-xs" >Edit</button>
                    </a>
              </div>
              <div class="col-xs-5">
                  <button type="button" name="@{{ item.id }}" class="btn btn-danger  btn-xs" ng-click="deleteById('sm')">Delete</button>
              </div>
			</div>
        </td>
    </tr>
    
    </tbody>
</table>
</div>
<script type="text/ng-template" id="ModalContentProduct">
    <div class="modal-header">
        <h3 class="modal-title">@{{title}} !</h3>
    </div>
    <div class="modal-body">
    <p>
        @{{contentTitle}}
    </p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary btn-xs" type="button" ng-click="ok()">OK</button>
        <button class="btn btn-default btn-xs" type="button" ng-click="cancel()">Cancel</button>
    </div>
</script>
