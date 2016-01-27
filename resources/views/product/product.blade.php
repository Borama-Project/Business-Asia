<div class="col-lg-12"> 
<form ng-submit="submit()">
	<div class="panel panel-info">
	  <div class="panel-body">
		<h3>Add Products</h3>

	  </div>
	</div>
	<div class="form-group col-lg-12 pd-lef-0">
		<div class="form-group col-lg-4 pd-lef-0">
			<label>Product Category</label>
			<select ng-model="app.productCategoryId" class="form-control" id="tagList"  name="select" required>
				<option value=""> </option>
				<option ng-repeat="item in categorysLists" value="@{{ item.id }}"> @{{ item.name }} </option>
			</select>
		</div>
	</div>
	<div class="form-group col-lg-12 pd-lef-0">
		<div class="col-lg-6 pd-lef-0">
		    <label>Product Title </label>
		    <input type="text" class="form-control"  name="name" ng-model="app.name" placeholder="Name" autocomplete="off" required="required">
		</div>
		<div class="col-lg-6 pd-lef-0">
			<div class="col-lg-12">
				<div class="form-group col-lg-7">
					<label>Price</label>
					<input type="number" min="0" class="form-control" ng-model="app.price" placeholder="Price" required >
				</div>

				<div class="col-lg-3 pad-top-25 pd-lef-0">
					<select ng-model="app.currency" class="form-control" id="currency"  name="select" >
						<option value=""> USD </option>
						<!-- <option value="1" selected> USD </option> -->
						<option value="2"> Riels </option>
					</select>
				</div>
				
			</div>
		</div>
	</div>
	

	<div class="form-group col-lg-12 pd-lef-0">
		<div class="form-group pd-lef-0">
			<div class="col-lg-6 pd-lef-0">
				<label class="control-label pad-top-5 col-md-3 pd-lef-0">Start Date</label>
				<div class="col-md-6 pd-lef-0">
					<!-- <input class="form-control" ng-model="app.DateStart" type="date" name="DateStart" required > -->
					<input kendo-date-picker ng-model="app.dateStarts"  k-format="'yyyy-MM-dd'" style="width: 100%;" required />
					
				</div>
			</div>
			<div class="col-lg-6">
				<label class="control-label pad-top-5 col-md-3">End Date</label>
				<div class="col-md-6 pd-lef-5">
					
					<input kendo-date-picker ng-model="app.dateEnds"  k-format="'yyyy-MM-dd'" style="width: 100%;" required />
					
				</div>
			</div>
		</div>
		
	</div>
	<div class="col-lg-12 pd-lef-0">
		<div class="form-group col-xs-6 pd-lef-0">
			<label>Business Tag</label>
			<select ng-model="app.listBusinessTag" class="form-control" name="select" id="mySelect" required>
				<optgroup ng-repeat="businessTags in listBusinessTag" label="@{{ businessTags.name }}">
					<option ng-repeat="tag in businessTags.tag"  value="@{{ tag.id }}"> @{{ tag.name }} </option>
				</optgroup>
			</select>

		</div>
		<div class="col-lg-6">
			<label class="control-label col-lg-3">Condition</label>
			<div class="col-lg-6 pd-lef-5">
				<select ng-model="app.condition" class="form-control" id="conditions"  name="select" required >
					<option value=""></option>
					<option ng-repeat="item in conditions" value="@{{ item.conditionId }}"> @{{ item.name }} </option>
				</select>
			</div>
		</div>
	</div>
	<div class="form-group col-xs-12 pd-lef-0">
		<label>Description</label>
		<textarea class="form-control" required ng-model="app.description"></textarea>
	</div>
	<div class="form-group col-xs-12">
	    <label>Product Gallery</label>
	    
	</div>
	<div class="form-group col-xs-12 thumbnail pad-top-20">
	  <div class="col-xs-12 col-md-3">
	    <a href="javascript:void(0)" class="thumbnail">
	    	<img ngf-src="app.file0" ng-click="ngTrigger('fileUpload0')" dt-name="fileUpload0" class="thumb" width="171" height="180">
	    	<input type="file" id="fileUpload0"  ngf-select ng-model="app.file0" name="image"  style="display:none;">
	    </a>
	  </div>
	  <div class="col-xs-12 col-md-3">
	    <a href="javascript:void(0)" class="thumbnail">
	    	<img ngf-src="app.file1" ng-click="ngTrigger('fileUpload1')" class="thumb" width="171" height="180">
	    	<input type="file" id="fileUpload1"  ngf-select ng-model="app.file1" name="image"  style="display:none;">
	    </a>
	  </div>
	  <div class="col-xs-12 col-md-3">
	    <a href="javascript:void(0)" class="thumbnail">
	    	<img ngf-src="app.file2" ng-click="ngTrigger('fileUpload2')" class="thumb" width="171" height="180">
	    	<input type="file" id="fileUpload2"  ngf-select ng-model="app.file2" name="image"  style="display:none;">
	    </a>
	  </div>
	  <div class="col-xs-12 col-md-3">
	    <a href="javascript:void(0)" class="thumbnail">
	    	<img ngf-src="app.file3" ng-click="ngTrigger('fileUpload3')" class="thumb" width="171" height="180">
	    	<input type="file" id="fileUpload43" name="fileUpload4" ngf-select ng-model="app.file3" name="image"  style="display:none;">
	    </a>
	  </div>
	  
	</div>
	

	<div class="form-group col-xs-12">
		<button type="submit" class="btn btn-default">Save</button>
		
	</div>
	<div class="form-group col-xs-12 pd-lef-0">
		<!-- <pre>@{{results}}</pre> -->
		<div class="alert alert-success">
		  <strong>@{{results}}</strong> 
		  
		</div>
		<a ng-href="#/products/list/@{{categoryids}}/business/@{{businessId}}">Back to Category</a>
	</div>
</form>

</div>

<script>
	$( "#upload" ).on( "click", function() {
	    $( "#fileUpload" ).trigger( "click" );
	});
</script>
