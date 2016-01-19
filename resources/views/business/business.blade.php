
<div class="container">
<form ng-submit="submit()" name="BusinessFormName">
	<div class="panel panel-info">
	  <div class="panel-body">
	    Business Register
	  </div>
	</div>
	{{--<div class="form-group col-xs-6">--}}
	    {{--<label for="exampleInputEmail1">Business Name </label>--}}
	    {{--<input type="text" class="form-control"  name="" ng-model="globalVirable.name" placeholder="businessName" required="true">--}}
	{{--</div>--}}
	{{--<div class="form-group col-xs-6">--}}
	    {{--<label for="exampleInputEmail1">Phone Number</label>--}}
	    {{--<input type="number" class="form-control"  name="" ng-model="globalVirable.phoneNumber" placeholder="Name" required="true">--}}
	{{--</div>--}}
	{{--<div class="form-group col-xs-12">--}}
		{{--<label for="exampleInputEmail1">Email</label>--}}
		{{--<input type="email" class="form-control" id="" ng-model="globalVirable.email" placeholder="Email" required="true">--}}
	{{--</div>--}}
	{{--<div class="form-group col-xs-6">--}}
		{{--<label for="exampleInputEmail1">Latitute</label>--}}
		{{--<input type="number" class="form-control" id="" ng-model="globalVirable.latitute" placeholder="" required="true">--}}
	{{--</div>--}}
	{{--<div class="form-group col-xs-6">--}}
		{{--<label for="exampleInputEmail1">Longitute</label>--}}
		{{--<input type="number" class="form-control" id="" ng-model="globalVirable.longitute" placeholder="" required="true">--}}
	{{--</div>--}}
	{{--<div class="form-group col-xs-6">--}}
		{{--<label>Business Type</label>--}}
		{{--<select  id="typeList" multiple="multiple" ng-model="globalVirable.businessTypeList" class="tokenize-sample" placeholder="select" >--}}
			{{--<option  ng-repeat="businessTypes in businessType" value="@{{ businessTypes.id  }}">@{{ businessTypes.name }}</option>--}}
		{{--</select>--}}
	{{--</div>--}}

	{{--<div class="form-group col-xs-6">--}}
		{{--<label for="exampleInputEmail1">Business Tag</label>--}}
	{{--<select ng-model="globalVirable.businessTagList" id="tagList" multiple="multiple" class="tokenize-sample" name="select">--}}
		{{--<optgroup ng-repeat="businessTags in businessTag" label="@{{ businessTags.name }}">--}}
			{{--<option ng-repeat="tag in businessTags.tag" value="@{{ tag.id }}"> @{{ tag.name }} </option>--}}
		{{--</optgroup>--}}
	{{--</select>--}}
	{{--</div>--}}
	{{--<div class="form-group col-xs-12">--}}
		{{--<label for="exampleInputEmail1">Address</label>--}}
		{{--<textarea class="form-control" name="searchBusiness" ng-model="globalVirable.address" placeholder="Address" required="true"></textarea>--}}
	{{--</div>--}}
	{{--<div class="form-group col-xs-12">--}}
		{{--<label for="exampleInputEmail1">Description</label>--}}
		{{--<textarea class="form-control" name="searchBusiness" ng-model="globalVirable.description" placeholder="Discription"></textarea>--}}
	{{--</div>--}}
	{{--<div class="form-group col-xs-6">--}}
		{{--<label for="exampleInputEmail1">Company Logo</label>--}}
		{{--<input type="file" ngf-select ng-model="globalVirable.logo" name="logo" required="true">--}}
	{{--</div>--}}
	{{--<div class="form-group col-xs-6">--}}
		{{--<label for="exampleInputEmail1">Cover</label>--}}
		{{--<input type="file" ngf-select ng-model="globalVirable.cover" name="cover" required="true">--}}
	{{--</div>--}}
	<input type="text" ng-model="globalVirable.businessTypeLista" />
	<div class="multiple-select-wrapper">
		<div class="selected-items-box">
			<span class="dropdown-icon"></span>
		</div>
		<div class="list">
			<ul class="items-list">
				<li ng-repeat="businessTypes in businessType">
					<input type="checkbox"/>
					<span>@{{ businessTypes.name }}</span>
				</li>
			</ul>
		</div>
	</div>

	<div ng-dropdown-multiselect="" options="example1data" selected-model="example1model"></div>


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

{{--<style>--}}
	{{--.TokensContainer{--}}
		{{--width: 400px;--}}
	{{--}--}}
{{--</style>--}}
{{--<script type="text/javascript">--}}
{{--$('#tagList').tokenize({--}}
	{{--displayDropdownOnFocus: true,--}}
	{{--nbDropdownElements:10000000000000--}}


{{--});--}}

{{--$('#typeList').tokenize({--}}
	{{--displayDropdownOnFocus: true,--}}
	{{--nbDropdownElements:10000000000000--}}

{{--});--}}
{{--$(document).ready(function(){--}}
	{{--$('#clickBR').click(function(){--}}
		{{--var dataTypeList = $('#typeList').tokenize().toArray();--}}
		{{--var dataTagList  = $('#tagList').tokenize().toArray();--}}
		{{--console.log(dataTypeList);--}}
		{{--$.ajax({--}}
			{{--type: "POST",--}}
			{{--url: 'http://asianbusiness.dev/business/register-business',--}}
			{{--data:{dataTypeList:dataTypeList,dataTagList:dataTagList},--}}
			{{--dataType: 'JSON'--}}
		{{--}).success(function(res){--}}

		{{--}).error(function(res){--}}
			{{--console.log(res);--}}
		{{--});--}}
	{{--});--}}

{{--});--}}
{{--</script>--}}

<style>
	.multiple-select-wrapper {
		width: 250px;
		position: relative;
	}
	.multiple-select-wrapper .selected-items-box {
		box-shadow: inset 1px -1px 5px 0 #CCCCCC;
		-webkit-box-shadow: inset 1px -1px 5px 0 #CCCCCC;
		-moz-box-shadow: inset 1px -1px 5px 0 #CCCCCC;
		-o-box-shadow: inset 1px -1px 5px 0 #CCCCCC;
		cursor: pointer;
		border: solid 1px #C7C6C7;
		padding: 5px;
		height: 22px;
		background-color: #fff;
		border-radius: 5px;
		-mox-border-radius: 5px;
		-webkit-border-radius: 5px;
		-o-border-radius: 5px;
	}
	.selected-items-box .items-list {
		list-style-type: none;
		width: 100%;
		padding: 0;
		margin: 0;
	}
	.selected-items-box .items-list li {
		display: inline;
	}
	.selected-items-box .items-list li img {
		display: inline;
		padding-left: 10px;
		height: 18px;
	}
	.selected-items-box .items-list li img {
		font-size: 20px;
	}
	.multiple-select-wrapper .list {
		display: none;
		height: 90px;
		overflow-y: auto;
		overflow-x: hidden;
		border-left: solid 1px #C7C6C7;
		border-right: solid 1px #C7C6C7;
		border-bottom: solid 1px #C7C6C7;
		z-index: 9999;
		position: absolute;
		width: 99%;
		border-radius: 5px;
		-mox-border-radius: 5px;
		-webkit-border-radius: 5px;
		-o-border-radius: 5px;
	}
	.list .items-list {
		list-style-type: none;
		width: 100%;
		padding: 0;
		margin: 0;
	}
	.list .items-list li {
		margin: 0;
		width: 100%;
		padding: 0;
		border-bottom: solid 1px #C7C6C7;
		padding: 5px;
		background-color: #fff;
	}
	.list .items-list li input {
		padding-left: 10px;
	}
	.list .items-list li img {
		padding-left: 10px;
		padding-right: 6px;
		height: 18px;
	}

	.list .items-list li span {
		color: #4A4A4A;
		font-size: 14px;
	}
	.dropdown-icon {
		position: absolute;
		top: 50%;
		right: 0;
		margin-top: -8px;
		width: 16px;
		height: 16px;
		background-image: url("http://s18.postimage.org/ht23xn8id/menu_arrow_down.png");
		background-repeat: no-repeat;
		background-position: 0 center;
	}
	.title{
		color: white;
	}
</style>