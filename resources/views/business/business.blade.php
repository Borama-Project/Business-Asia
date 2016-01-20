
<div class="container">
<form ng-submit="submit()" name="BusinessFormName">
	<div class="panel panel-info">
	  <div class="panel-body">
	    Business Register
	  </div>
	</div>
	<div class="form-group col-xs-6">
	    <label for="exampleInputEmail1">Business Name </label>
	    <input type="text" class="form-control"  name="" ng-model="globalVirable.name" placeholder="businessName" required="true">
	</div>
	<div class="form-group col-xs-6">
	    <label for="exampleInputEmail1">Phone Number</label>
	    <input type="number" class="form-control"  name="" ng-model="globalVirable.phoneNumber" placeholder="Name" required="true">
	</div>
	<div class="form-group col-xs-12">
		<label for="exampleInputEmail1">Email</label>
		<input type="email" class="form-control" id="" ng-model="globalVirable.email" placeholder="Email" required="true">
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Latitute</label>
		<input type="number" class="form-control" id="" ng-model="globalVirable.latitute" placeholder="" required="true">
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Longitute</label>
		<input type="number" class="form-control" id="" ng-model="globalVirable.longitute" placeholder="" required="true">
	</div>
	<div class="form-group col-xs-6">
		<label>Business Type</label>
		{{--<div class="div-type-list">--}}
			{{--<div ng-repeat="businessTypes in businessType">--}}
				{{--<div class="action-checkbox">--}}
					{{--<input id="@{{businessTypes}}" type="checkbox" value="@{{businessTypes}}" ng-checked="selection.indexOf(businessTypes) > -1" ng-click="toggleSelection(businessTypes)" />--}}
					{{--@{{businessTypes.name}}--}}
				{{--</div>--}}
			{{--</div>--}}
			<select ng-model="globalVirable.businessTypeList" class="form-control" >
				<option ng-repeat="businessTypes in businessType" value="@{{businessTypes}}"> @{{businessTypes.name}}</option>
			</select>
		{{--</div>--}}
	</div>


	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Business Tag</label>
		<div class="div-type-list">
				<div  ng-repeat="businessTags in businessTag"><span class="blode-header">@{{ businessTags.name }}</span>
					<div  ng-repeat="tag in businessTags.tag">
						<input id="@{{tag.id}}" type="checkbox" value="@{{tag.id}}" ng-checked="selectionTage.indexOf(tags.id) > -1" ng-click="toggleSelectionTag(tag.id)" />
						@{{tag.name}}
					</div>
				</div>
			<div ng-repeat="name in selectionTag" class="selected-item">
				@{{name}}
			</div>
		</div>

	</div>
	<div class="form-group col-xs-12">
		<label for="exampleInputEmail1">Address</label>
		<textarea class="form-control" name="searchBusiness" ng-model="globalVirable.address" placeholder="Address" required="true"></textarea>
	</div>
	<div class="form-group col-xs-12">
		<label for="exampleInputEmail1">Description</label>
		<textarea class="form-control" name="searchBusiness" ng-model="globalVirable.description" placeholder="Discription"></textarea>
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Company Logo</label>
		<input type="file" ngf-select ng-model="globalVirable.logo" name="logo" required="true">
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Cover</label>
		<input type="file" ngf-select ng-model="globalVirable.cover" name="cover" required="true">
	</div>


	<div class="form-group col-xs-6">
		<button type="submit" id="clickBR" class="btn btn-default">Submit</button>
	</div>

	<div class="form-group col-xs-6">
		<div ng-if="success">
			<div class="alert alert-success">
				<strong>Success!</strong> Business has been create.
			</div>

			<A ng-href="/#business">Back to business!</A>
		</div>

	</div>


		{{--<div ng-repeat="businessTypes in businessType">--}}
			{{--<div class="action-checkbox">--}}
				{{--<input id="@{{businessTypes.id}}" type="checkbox" value="@{{businessTypes.id}}" ng-checked="selection.indexOf(businessTypes.id) > -1" ng-click="toggleSelection(businessTypes.id)" />--}}
				{{--@{{businessTypes.name}}--}}
			{{--</div>--}}
		{{--</div>--}}

 {{--<div ng-repeat="name in selectionTag" class="selected-item">--}}
	 {{--@{{name}}--}}
 {{--</div>--}}

</form>

</div>




<style>
.div-type-list{
	width: 100%;
	height: 150px;
	border: 1px solid darkgray;
	overflow: auto;
	padding: 10px;
}
	.blode-header{

		color: crimson;
		font-size: 12px;
	}
</style>


