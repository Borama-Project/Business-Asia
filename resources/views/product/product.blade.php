<div class="col-lg-12"> 
<form ng-submit="submit()">
	<div class="panel panel-info">
	  <div class="panel-body">
		<h3>Add Products</h3>
	  </div>
	</div>
	<div class="form-group col-xs-6">
	    <label>Product Title </label>
	    <input type="text" class="form-control"  name="name" ng-model="app.name" placeholder="Name" autocomplete="off" required="required">
	</div>
	<div class="form-group col-xs-6">
		<label>Product Category</label>
		<select ng-model="app.productCategoryId" class="form-control" id="tagList"  name="select" required>
			<option value=""> </option>
			<option ng-repeat="item in categorysLists" value="@{{ item.id }}"> @{{ item.name }} </option>
		</select>
	</div>
	<div class="form-group col-lg-12 pd-lef-0">
		<div class="form-group">
			<label class="control-label col-lg-1 pad-top-5">Price</label>
			<div class="col-lg-2 pd-lef-0">
				<input type="text" class="form-control" ng-model="app.price" placeholder="Price" required >
			</div>
			<div class="col-lg-3 mg-lef-10">
				<select ng-model="app.currency" class="form-control" id="currency"  name="select" required >
					<option value=""> </option>
					<option value="1"> Dollar </option>
					<option value="2"> Riel </option>
				</select>
			</div>
			<div class="col-lg-5 pd-lef-5">
				<label class="control-label col-lg-3 pd-lef-5">Condition</label>
				<div class="col-lg-8 pd-right-28">
					<select ng-model="app.conditions" class="form-control" id="currency"  name="select" required >
						<option value=""> </option>
						<option ng-repeat="item in conditions" value="@{{ item.conditionId }}"> @{{ item.name }} </option>
					</select>
				</div>
			</div>
			
		</div>
		
	</div>

	<div class="form-group col-lg-12 pd-lef-0">
		<div class="form-group pd-lef-0">
			<div class="col-lg-6 pd-lef-0">
				<label class="control-label pad-top-5 col-md-3">Start Date</label>
				<div class="col-md-6 mg-lef-10">
					<!-- <input class="form-control" ng-model="app.DateStart" type="date" name="DateStart" required > -->
					<input kendo-date-picker ng-model="app.DateStart"  k-format="'yyyy-MM-dd'" style="width: 100%;" required />
					
				</div>
			</div>
			<div class="col-lg-6 pd-lef-5">
				<label class="control-label pad-top-5 col-md-3">Start Date</label>
				<div class="col-md-6 pd-lef-5">
					<!-- <input class="form-control" ng-model="app.DateEnd" type="date" placeholder="y-m-d" name="DateEnd" required > -->
					<input kendo-date-picker ng-model="app.DateEnd"  k-format="'yyyy-MM-dd'" style="width: 100%;" required />
					
				</div>
			</div>
		</div>
		
	</div>
	<div class="form-group col-lg-6 pd-lef-0">
		<div class="form-group pd-lef-0">
			<div class="col-lg-6 pd-lef-0">
				<label class="control-label pad-top-5 col-md-4">Business Tag</label>
				<div class="col-md-6 mg-lef-10">
					
					<select ng-model="app.listBusinessTag" class="form-control" name="select">
						<optgroup ng-repeat="businessTags in listBusinessTag" label="@{{ businessTags.name }}">
							<option ng-repeat="tag in businessTags.tag" value="@{{ tag.id }}"> @{{ tag.name }} </option>
						</optgroup>
					</select>
				</div>
			</div>
		</div>
		
	</div>
	<div class="form-group col-xs-6">
		<label for="exampleInputEmail1">Business Tag</label>
		<div class="div-type-list">
				<div  ng-repeat="businessTags in businessTag"><span class="blode-header">@{{ businessTags.name }}</span>
					<div  ng-repeat="tag in businessTags.tag">
						<input id="@{{tag.id}}" type="checkbox" name="ngCheck" value="@{{tag.id}}" ng-checked="selectionTage.indexOf(tags.id) > -1" ng-click="toggleSelectionTag(tag.id)" />
						@{{tag.name}}
					</div>
				</div>
		</div>

	</div>
	<div class="form-group col-xs-12">
	    <label>Product Gallery</label>
	    
	</div>
	<div class="form-group col-xs-12 thumbnail pad-top-20">
	  <div class="col-xs-12 col-md-3">
	    <a href="javascript:void(0)" class="thumbnail">
	    	<img ng-src="/assets/img/img-photo-upload.png" width="171" height="180"  id="upload">
	    	<input type="file" id="fileUpload"  ngf-select ng-model="app.image" name="image" required="true" style="display:none;">
	    </a>
	  </div>
	  <div class="col-xs-12 col-md-3">
	    <!-- <a href="#" class="thumbnail"> -->
	    	<img ngf-src="app.image" class="thumb" width="171" height="180">
	    <!-- </a> -->
	  </div>
	  
	</div>
	<div class="form-group col-xs-12 pd-lef-0">
		<label>Description</label>
		<textarea class="form-control" required ng-model="app.description"></textarea>
	</div>

	<div class="form-group col-xs-12">
		<button type="submit" class="btn btn-default">Save</button>
	</div>
	<div class="form-group col-xs-12 pd-lef-0">
		<!-- <pre>@{{results}}</pre> -->
		<div class="alert alert-success">
		  <strong>@{{results}}</strong> 
		</div>
	</div>
</form>

</div>

<script>
	$( "#upload" ).on( "click", function() {
	    $( "#fileUpload" ).trigger( "click" );
	});
</script>
<script>
	$( "#bFileUpload" ).on( "click", function() {
		$( "#imgFileUpload" ).trigger( "click" );
	});
	$( "#coverFileUpload" ).on( "click", function() {
		$( "#imgCoverFileUpload" ).trigger( "click" );
	});

</script>

