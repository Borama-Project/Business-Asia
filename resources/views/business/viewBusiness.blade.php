<div class="col-lg-12">

	<div class="panel panel-info">
	  <div class="panel-body">
			<div class="form-group col-xs-6">
				<img ng-src="@{{item.logo}}" width="150" height="150" title="Logo">
			</div>
		    <div class="form-group col-xs-6">
			  <img ng-src="@{{item.coverImage[0]}}" width="300" height="150" title="Logo">
		    </div>
	  </div>
	</div>

	<div class="form-group col-xs-12">
		<div class="col-md-3">
			Business Name :
		</div>
		<div class="col-md-9">
			@{{item.head.name}}
		</div>

	</div>
	<div class="form-group col-xs-12">
		<div class="col-md-3">
			Phone Number :
		</div>
		<div class="col-md-9">
			@{{item.head.name}}
		</div>
	</div>
	<div class="form-group col-xs-12">
		<div class="col-md-3">
			Email :
		</div>
		<div class="col-md-9">
			@{{item.head.email}}
		</div>

	</div>
	<div class="form-group col-xs-12">
		<div class="col-md-3">
			Latitute :
		</div>
		<div class="col-md-9">
			@{{item.head.loc.lat}}
		</div>

	</div>
	<div class="form-group col-xs-12">
		<div class="col-md-3">
			Longitute :
		</div>
		<div class="col-md-9">
			@{{item.head.loc.lon}}
		</div>
	</div>
	<div class="form-group col-xs-12">
		<div class="col-md-3">
			businessTypes:
		</div>
		<div class="col-md-9">
			@{{ item.businessType[0].name }}
		</div>

	</div>
	<div class="form-group col-xs-12">
		<div class="col-md-3">
			businessTags:
		</div>
		<div class="col-md-9">
			<ul>
				<li ng-repeat="businessTags in item.businessTag">@{{ businessTags.id }}</li>
		    </ul>
		</div>
	</div>

	<div class="form-group col-xs-12">
		<div class="col-md-3">
			Address:
		</div>
		<div class="col-md-9">
			<p>@{{item.head.address}}</p>
		</div>

	</div>
	<div class="form-group col-xs-12">
		<div class="col-md-3">
			Description:
		</div>
		<div class="col-md-9">
			<p>@{{item.description}}
		</div>
	</div>



</div>

