<div class="col-lg-12">
<form ng-submit="submit()">
	<div class="panel panel-info">
	  <div class="panel-body">
	   Add Category
	  </div>
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Category Name</label>
		<input type="text" class="form-control"  ng-model="globalVirable.categoryName" placeholder="Name" required="">
	</div>
	<div class="form-group col-xs-12">
		<button type="submit" class="btn btn-primary btn-sm">Save</button>
		<button onclick="goBack()" type="submit" class="btn btn-default btn-sm">Cancel</button>
	</div>

</form>

</div>

<script>
	function goBack() {
		window.history.back();
	}
</script>