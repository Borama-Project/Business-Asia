<div class="col-lg-12"> 
<form ng-submit="submit()">
	<div class="panel panel-info">
	  <div class="panel-body">
	    Business Type
	  </div>
	</div>
	<div class="form-group col-xs-12">
	    <label for="exampleInputEmail1">Name *</label>
	    <input type="text" class="form-control" ng-model="globalVirable.name" name="name" placeholder="Name">
	</div>
	<div class="form-group col-xs-12">
	    <label for="exampleInputEmail1">Icon</label>
	    <input type="file" class="form-control"  ng-model="globalVirable.file" name="file" >
	</div>
	<div class="form-group col-xs-12">
		<button type="submit" class="btn btn-default">Submit</button>
	</div>
  	
</form>
</div>

