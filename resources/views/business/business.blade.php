<div class="col-lg-12" ng-controller="ngRegisterBusiness"> 
<form ng-submit="submit()">
	<div class="panel panel-info">
	  <div class="panel-body">
	    Business Register
	  </div>
	</div>
	<div class="form-group col-xs-6">
	    <label for="exampleInputEmail1">Business Name </label>
	    <input type="text" class="form-control"  name="" ng-model="globalVirable.name" placeholder="businessName">
	</div>
	<div class="form-group col-xs-6">
	    <label for="exampleInputEmail1">Phone Number</label>
	    <input type="number" class="form-control"  name="" ng-model="globalVirable.phoneNumber" placeholder="Name">
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Email</label>
		<input type="email" class="form-control" id="" ng-model="globalVirable.email" placeholder="Email">
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Lat</label>
		<input type="number" class="form-control" id="" ng-model="globalVirable.latitute" placeholder="">
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Lan</label>
		<input type="number" class="form-control" id="" ng-model="globalVirable.longitute" placeholder="">
	</div>
	<div class="form-group col-xs-12">
		<label for="exampleInputEmail1">Business Type</label>
		<select class="form-control" ng-model="globalVirable.businessTypeList">
			<option ng-repeat="businessTypes in businessType" value="@{{ businessTypes.id }}">@{{ businessTypes.name }}</option>
		</select>
	</div>

	<div class="form-group col-xs-12">
		<label for="exampleInputEmail1">Business Tag</label>
		<select class="form-control" ng-model="globalVirable.businessTagList">
			<optgroup ng-repeat="businessTags in businessTag" label="@{{ businessTags.name }}">
			 <option ng-repeat="tag in businessTags.tag" value="@{{ tag.id }}">@{{ tag.name }}</option>
			</optgroup>
		</select>
	</div>
	<div class="form-group col-xs-12">
		<label for="exampleInputEmail1">Address</label>
		<textarea class="form-control" name="searchBusiness" ng-model="globalVirable.address" placeholder="Address"></textarea>
	</div>
	<div class="form-group col-xs-12">
		<label for="exampleInputEmail1">Description</label>
		<textarea class="form-control" name="searchBusiness" ng-model="globalVirable.description" placeholder="Discription"></textarea>
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Logo</label>
		<input type="file" ngf-select ng-model="globalVirable.logo" name="logo">
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Cover</label>
		<input type="file" ngf-select ng-model="globalVirable.cover" name="cover">
	</div>

	<div class="form-group col-xs-6">
		<button type="submit" class="btn btn-default">Submit</button>
	</div>

	<div class="form-group col-xs-6">
		<div>@{{ success }}</div>
	</div>
</form>


</div>

