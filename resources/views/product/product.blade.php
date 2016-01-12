<div class="col-lg-12"> 
<form ng-submit="submit()">
	<div class="panel panel-info">
	  <div class="panel-body">
	    Products
	  </div>
	</div>
	<div class="form-group col-xs-6">
	    <label for="exampleInputEmail1">File.JSON</label>
	    <input type="file" class=""  name="file" ng-model="globalVariable.file" placeholder="Name">
	</div>

	<div class="form-group col-xs-12">
		<button type="submit" class="btn btn-default">Save</button>
	</div>
  	
</form>


	<table class="table">
		<thead>
		<tr>
			<th>Product</th>
			<th>Type</th>

		</tr>
		</thead>
		<tbody>

		<tr data-ng-repeat="product in products">
			<td>@{{ product}}</td>

		</tr>
		</tbody>
	</table>
</div>

