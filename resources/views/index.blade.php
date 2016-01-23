@extends('layout')

@section('content')
<div>

	<div class="col-lg-2 appContent no-right">
		<div class="list-group" ng-controller="ngLog">
			  <a href="javascript:void(0)" class="list-group-item active">
				Social Business
			  </a>
			  <A ng-href="#/business" class="list-group-item">Business</A>
			  <A ng-href="#/products" class="list-group-item">Add Product</A>
			  <A href="/Auth/log-out" class="list-group-item" data-ng-click="logout()">Log Out</A>




		</div>
	</div>
<growl-notifications></growl-notifications>
	<div class="col-lg-10 appContent" >
		<div class="col-lg-12">
			<div ng-view></div>
		</div>
	</div>
</div>
@endsection