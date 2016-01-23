
<!-- <div class="container"> -->
<div class="col-lg-12"> 
<form ng-submit="submit()" name="BusinessFormName">
	<div class="panel panel-info">
	  <div class="panel-body">
	    Business Register
	  </div>
	</div>
	<div class="form-group col-xs-6">
	    <label for="exampleInputEmail1">Business Name </label>
	    <input type="text" class="form-control"  name="" ng-model="globalVirable.businessname" placeholder="businessName" required="true">
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Location Name </label>
		<input type="text" class="form-control"  name="" ng-model="globalVirable.locationname" placeholder="businessName" required="true">
	</div>
	<div class="form-group col-xs-6">
	    <label for="exampleInputEmail1">Phone Number</label>
	    <input type="number" class="form-control"  name="" ng-model="globalVirable.phoneNumber" placeholder="phone" required="true">
	</div>
	<div class="form-group col-xs-6">
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
			<select ng-model="globalVirable.businessTypeList" class="form-control" >
				<option ng-repeat="businessTypes in businessType" value="@{{businessTypes}}"> @{{businessTypes.name}}</option>
			</select>

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
	<div class="form-group col-xs-6 thumbnail">
		<div class="col-xs-6 col-md-3">
			<label>Company Logo</label>
			<a href="javascript:void(0)" class="thumbnail">
				<img ng-src="/assets/img/img-photo-upload.png" width="150" height="150"  id="bFileUpload">
				<input type="file" ngf-select ng-model="globalVirable.logo" name="logo" id="imgFileUpload" required="true" style="display: none">
			</a>
		</div>
		<div class="col-xs-6 col-md-3">
			<img ngf-src="globalVirable.logo" class="thumb" width="150" height="150">
		</div>

	</div>
	<div class="form-group col-xs-6 thumbnail">
		<div class="col-xs-6 col-md-3">
			<label>Cover</label>
			<a href="javascript:void(0)" class="thumbnail">
				<img ng-src="/assets/img/img-photo-upload.png" width="150" height="150"  id="coverFileUpload">
				<input type="file" ngf-select ng-model="globalVirable.cover" name="cover" id="imgCoverFileUpload" required="true" style="display: none">
			</a>
		</div>
		<div class="col-xs-6 col-md-3">
			<img ngf-src="globalVirable.cover" class="thumb" width="300" height="150">
		</div>
	</div>


	<div class="form-group col-xs-12 ">
		<button type="submit" id="clickBR" class="btn btn-default">Submit</button>
	</div>

	<div class="form-group col-xs-6">
		<div ng-if="success">
			<div class="alert alert-success">
				<strong>Success!</strong><span class="label label-success">@{{ businessName }}</span> Business has been create.
			</div>

			<A ng-href="/#business">Back to business!</A>
		</div>

		<div ng-if="errorSMS">
			<div class="alert alert-danger" animate-show>
				@{{ errorSMS }}
			</div>
		</div>

	</div>

</form>

</div>

<script>
	$( "#bFileUpload" ).on( "click", function() {
		$( "#imgFileUpload" ).trigger( "click" );
	});
	$( "#coverFileUpload" ).on( "click", function() {
		$( "#imgCoverFileUpload" ).trigger( "click" );
	});

</script>

