

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
		<label for="exampleInputEmail1">Business Type</label>
		<select  id="typeList" multiple="multiple" ng-model="globalVirable.businessTypeList" class="tokenize-sample" placeholder="select" >
			<option  ng-repeat="businessTypes in businessType" value="@{{ businessTypes.id  }}">@{{ businessTypes.name }}</option>
		</select>
	</div>

	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Business Tag</label>
		<select ng-model="globalVirable.businessTagList" id="tagList" multiple="multiple" class="tokenize-sample" name="select">
			<optgroup ng-repeat="businessTags in businessTag" label="@{{ businessTags.name }}">
				<option ng-repeat="tag in businessTags.tag" value="@{{ tag.id }}"> @{{ tag.name }} </option>
			</optgroup>
		</select>
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


</form>

</div>

<script type="text/javascript">
$('#tagList').tokenize({
	displayDropdownOnFocus: true,
	nbDropdownElements:10000000000000

});

$('#typeList').tokenize({
	displayDropdownOnFocus: true,
	nbDropdownElements:10000000000000

});
$(document).ready(function(){
	$('#clickBR').click(function(){
		var dataTypeList = $('#typeList').tokenize().toArray();
		var dataTagList  = $('#tagList').tokenize().toArray();
		console.log(dataTypeList);
		$.ajax({
			type: "POST",
			url: 'http://asianbusiness.dev/business/register-business',
			data:{dataTypeList:dataTypeList,dataTagList:dataTagList},
			dataType: 'JSON'
		}).success(function(res){

		}).error(function(res){
			console.log(res);
		});
	});

});
</script>

