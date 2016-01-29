@extends('layout')

@section('content')
<div>

	<div class="col-lg-2 appContent no-right">
		<div class="list-group" ng-controller="ngLog">
			  <label class="list-group-item active">Social Business</label> 
				
			  </a>
			  <A ng-href="#/business" class="list-group-item">Business</A>
			  <A ng-href="#/manage" class="list-group-item">Manage Fix Product</A>
			  <A href="/Auth/log-out" class="list-group-item" data-ng-click="logout()">Log Out</A>
			  <?php

			   $authorId = json_decode(Session::get('zeAccessKey'));
			   var_dump($authorId);
			   $authorAdmin = json_decode(Session::get('zeAdmin'));
			   var_dump($authorAdmin);
			  ?>

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