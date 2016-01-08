<div class="col-lg-12">
<form action="/">
	<div class="panel panel-info">
	  <div class="panel-body">
	    Category
	  </div>
	</div>
	<div class="form-group col-xs-6">
	    <label for="exampleInputEmail1">Business ID *</label>
	    <input type="text" class="form-control"  ng-model="products.businessId" placeholder="Name">
	</div>
	<div class="form-group col-xs-6">
	    <label for="exampleInputEmail1">OwnerID</label>
	    <input type="text" class="form-control"  ng-model="products.userId" placeholder="Name">
	</div>
	<div class="form-group col-xs-6">
	    <label for="exampleInputEmail1">Category Name</label>
	    <input type="number" class="form-control"  ng-model="products.categoryName" placeholder="Name">
	</div>

	<div class="form-group col-xs-12">
		<button type="button" class="btn btn-default" ng-click="submit()">Submit</button>
	</div>

</form>
</div>

