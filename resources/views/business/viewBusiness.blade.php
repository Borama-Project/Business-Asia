<div class="col-lg-12"> 
<form ng-submit="submit()">
	<div class="panel panel-info">
	  <div class="panel-body">
	  	<div class="form-group col-xs-1">
	  		<img ng-src="@{{item.logo}}" width="60" height="60" title="Logo">
		</div>
	  	<div class="form-group col-xs-3">
	  		<h1>@{{item.head.name}}</h1>
		</div>
	  </div>
	</div>
	<!-- 569c86357f8b9aaf16235a0a -->
	
	<div class="form-group col-xs-4 pad-top-20">
	    <span>
	    <i class="glyphicon glyphicon-hand-right"></i> 
	    Phone Number :@{{item.head.phoneNumber}}</span>
	</div>
	<div class="form-group col-xs-4 pad-top-20">
		<span >
		<i class="glyphicon glyphicon-hand-right"></i> 
		Email : @@{{item.head.email}}</span>
		
	</div>
	<div class="form-group col-xs-4 pad-top-20">
		<span>
		<i class="glyphicon glyphicon-hand-right"></i> 
		businessId : @{{item.businessId}}</span>
	</div>
	
	<div class="form-group col-xs-4">
		<span>
		<i class="glyphicon glyphicon-hand-right"></i> 
		Latitute : @{{item.head.loc.lat}}</span>
		
	</div>
	<div class="form-group col-xs-4">
		<span>
			<i class="glyphicon glyphicon-hand-right"></i> 
			Longitute : @{{item.head.loc.lon}}
		</span>
		
	</div>
	<div class="form-group col-xs-6">
		<span>
			<i class="glyphicon glyphicon-hand-right"></i> 
			businessTypes
		</span>
		<!-- <ul>
			<li ng-repeat="businessTypes in item.businessType">@{{ businessTypes.name }}</li>
		</ul> -->
	</div>
	<div class="form-group col-xs-6">
		<span>
			<i class="glyphicon glyphicon-hand-right"></i> 
			businessTags
		</span>
		<!-- <ul>
			<li ng-repeat="businessTags in item.businessTag">@{{ businessTags.name }}</li>
		</ul> -->
	</div>
	<div class="form-group col-xs-6">
		<span>
			<i class="glyphicon glyphicon-hand-right"></i> 
			Business Category
		</span>
		<!-- <ul>
			<li ng-repeat="category in item.category">@{{ category.name }}</li>
		</ul> -->
	</div>
	<div class="form-group col-xs-6">
		<span>
			<i class="glyphicon glyphicon-hand-right"></i> 
			Voice Description : @{{item.voiceDescription}}
		</span>
	</div>

	<div class="form-group col-xs-12">
		<span><i class="glyphicon glyphicon-hand-right"></i> Address</span>
		<p>@{{item.head.address}}</p>
	</div>
	<div class="form-group col-xs-6">
		<span>
			<i class="glyphicon glyphicon-hand-right"></i> 
			Video Gallerys
		</span>
		<ul>
			<li ng-repeat="videoGallerys in item.videoGallery">
				@{{ videoGallerys.url }}
			</li>
		</ul>
	</div>


	<!-- 

	<div class="form-group col-xs-12">
		<label for="exampleInputEmail1">Business Tag</label>
		<select class="form-control" ng-model="item.businessTagList">
			<optgroup ng-repeat="businessTags in businessTag" label="@{{ businessTags.name }}">
			 <option ng-repeat="tag in businessTags.tag" value="@{{ tag.id }}">@{{ tag.name }}</option>
			</optgroup>
		</select>
		<ul>
			<li ng-repeat="businessTags in item.businessTag">@{{ businessTags.name }}
				<ul>
					<li ng-repeat="tag in businessTags.tag">
						@{{ tag.name }}
					</li>
				</ul>
			</li>
		</ul>
	</div> -->
	<!-- 
	<div class="form-group col-xs-12">
		<label for="exampleInputEmail1">Description</label>
		<textarea class="form-control" name="searchBusiness" ng-model="item.description" placeholder="Discription"></textarea>
	</div>
	
	 -->
	<div class="form-group col-xs-12">
		<span> <i class="glyphicon glyphicon-hand-right"></i> Description</span>
		<p>@{{item.description}}</p>
	</div>
	<div class="panel panel-info">
		<div class="panel-body pad-top-20">
			<div class="form-group col-xs-12">
				<label>Cover</label>
				<p><img ng-src="@{{item.coverImage[0]}}" height="150" width="150" title="coverImage">
				</p>
				
			</div>

		</div>
	</div>
	
	
	<!-- <div class="form-group col-xs-6">
		<button type="submit" class="btn btn-default">Submit</button>
	</div> -->

	<!-- <div class="form-group col-xs-6">
		<div>@{{ success }}</div>
	</div> -->
</form>


</div>

