<div class="col-lg-12"> 
<form ng-submit="submit()">
	<div class="panel panel-info">
	  <div class="panel-body">
		<h3>View Products</h3>
	  </div>
	</div>
	<div class="form-group col-lg-12 pd-lef-0">
		<div class="form-group col-lg-4 pd-lef-0">
			<label>Product Category</label>
			<select ng-model="app.productCategoryId" class="form-control" id="tagList"  name="select" required>
				
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
					<input type="text" min="0" class="form-control" ng-model="app.price" placeholder="Price" required >
				</div>

				<div class="col-lg-3 pad-top-25 pd-lef-0">
					<select ng-model="app.currency" class="form-control" id="currency"  name="select" >
						<option ng-repeat="item in currencys" value="@{{ item.id }}"> @{{ item.name }} </option>
					</select>
				</div>
				
			</div>
		</div>
	</div>
	

	<div class="form-group col-lg-12 pd-lef-0">
		<div class="form-group pd-lef-0">
			<div class="col-xs-6 pd-lef-0">
				<label class="control-label col-lg-5 pd-lef-0">Start Date</label>
				<div class="col-lg-6 pd-lef-5">
					<input kendo-date-picker ng-model="app.dateStart"  k-format="'yyyy-MM-dd'" style="width: 100%;" required />
					
				</div>
			</div>
			<div class="col-lg-6">
				<label class="control-label pad-top-5 col-md-3">End Date</label>
				<div class="col-md-6 pd-lef-5">
					
					<input kendo-date-picker ng-model="app.dateEnd"  k-format="'yyyy-MM-dd'" style="width: 100%;" required />
					
				</div>
			</div>
		</div>
		
	</div>
	<div class="col-lg-12 pd-lef-0">
		<div class="form-group col-xs-6 pd-lef-0">
			<label class="control-label col-lg-5 pd-lef-0">Business Tag</label>
			<div class="col-lg-6 pd-lef-5">
				<select ng-model="app.listBusinessTag" class="form-control" name="select" id="mySelect" required>
					<optgroup ng-repeat="businessTags in listBusinessTag" label="@{{ businessTags.name }}">
						<option ng-repeat="tag in businessTags.tag"  value="@{{ tag.id }}"> @{{ tag.name }} </option>
					</optgroup>
				</select>
			</div>
		</div>
		<div class="col-lg-6">
			<label class="control-label col-lg-3">Condition</label>
			<div class="col-lg-6 pd-lef-5">
				<select ng-model="app.condition" class="form-control" id="conditions"  name="select" required >
					<option ng-repeat="item in conditions"  value="@{{ item.conditionId }}"> @{{ item.name }} </option>
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
	    <a href="javascript:void(0)" class="thumbnail relative" >
	    	<img ngf-src="app.file0" ng-click=""  class="thumb" width="171" height="180">
	    	<i class="glyphicon glyphicon-remove-circle pointer ngDelete" ng-click="delete('file0')"></i>
	    	<i class="glyphicon glyphicon-camera pointer ngUpload" ng-click="upload('fileUpload0')"></i>
	    	<input type="file"  ng-change="uploadFile('0')" id="fileUpload0"  ngf-select ng-model="app.file0" name="image"  style="display:none;">
	    </a>
	  </div>
	  <div class="col-xs-12 col-md-3">
	    <a href="javascript:void(0)" class="thumbnail relative">
	    	<img ngf-src="app.file1" ng-click="" class="thumb" width="171" height="180">
	    	<i class="glyphicon glyphicon-remove-circle pointer ngDelete" ng-click="delete('file1')"></i>
	    	<i class="glyphicon glyphicon-camera pointer ngUpload" ng-click="upload('fileUpload1')"></i>
	    	<input type="file"  ng-change="uploadFile('1')" id="fileUpload1"  ngf-select ng-model="app.file1" name="image"  style="display:none;">
	    </a>
	  </div>
	  <div class="col-xs-12 col-md-3">
	    <a href="javascript:void(0)" class="thumbnail relative">
	    	<img ngf-src="app.file2" ng-click="" class="thumb" width="171" height="180">
	    	<i class="glyphicon glyphicon-remove-circle pointer ngDelete" ng-click="delete('file2')"></i>
	    	<i class="glyphicon glyphicon-camera pointer ngUpload" ng-click="upload('fileUpload2')"></i>
	    	<input type="file"  ng-change="uploadFile('2')" id="fileUpload2"  ngf-select ng-model="app.file2" name="image"  style="display:none;">
	    </a>
	  </div>
	  <div class="col-xs-12 col-md-3">
	    <a href="javascript:void(0)" class="thumbnail relative">
	    	<img ngf-src="app.file3" ng-click="" class="thumb" width="171" height="180">
<i class="glyphicon glyphicon-remove-circle pointer ngDelete" ng-click="delete('file3')"></i>
	    	<i class="glyphicon glyphicon-camera pointer ngUpload" ng-click="upload('fileUpload3')"></i>
	    	<input type="file"  ng-change="uploadFile('3')" id="fileUpload3"  ngf-select ng-model="app.file3" name="image"  style="display:none;">
	    </a>
	  </div>
	  
	</div>
	

	<div class="form-group col-xs-12">
		<button type="submit" class="btn btn-default">Save</button>
		<a ng-href="#/products/list/@{{categoryids}}/business/@{{businessId}}"><input type="botton" value="Cancel" name="cancel"></a>
	</div>
	<div class="form-group col-xs-12 pd-lef-0">
		<!-- <pre>@{{results}}</pre> -->
		<div class="alert alert-success">
		  <strong>@{{results}}</strong> 
		  
		</div>
		
	</div>
</form>

</div>
