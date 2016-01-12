<div class="col-lg-12">
<form ng-submit="submit()">
	<div class="panel panel-info">
	  <div class="panel-body">
	   Add Category
	  </div>
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Category Name</label>
		<input type="text" class="form-control"  ng-model="globalVirable.categoryName" placeholder="Name">
	</div>
	<div class="form-group col-xs-6">
	    <label for="exampleInputEmail1">Business</label>
	    <input type="text" class="form-control" name="businessId"  ng-model="globalVirable.businessId" placeholder="Name">
	</div>
	{{--<div class="form-group col-xs-6">--}}
	    {{--<label for="exampleInputEmail1">OwnerID</label>--}}
	    {{--<input type="text" class="form-control"  ng-model="globalVirable.userId" placeholder="Name">--}}
	{{--</div>--}}


	<div class="form-group col-xs-12">
		<button type="submit" class="btn btn-default">Save</button>
	</div>

</form>
<div ng-controller="ngCategory">
		<table class="table">
			<thead>
			<tr>
				<th>Category</th>
				<th>Type</th>

			</tr>
			</thead>
			<tbody>

				<tr ng-repeat="category in categorys">
					<td>@{{ category.name }}</td>
					<td>@{{ category.type }}</td>
				</tr>
			</tbody>
		</table>


</div>
</div>

