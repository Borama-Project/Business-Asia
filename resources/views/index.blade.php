@extends('layout')

@section('content')
<div>

	<div class="col-lg-2 appContent no-right">
		<div class="list-group" ng-controller="ngLog">
			  <a href="javascript:void(0)" class="list-group-item active">
				Social Business
			  </a>
			  <A ng-href="#/category" class="list-group-item">Add Category</A>
			  <A ng-href="#/business" class="list-group-item">Business</A>
			  <A ng-href="#/businessType" class="list-group-item">business Type</A>
			  <A ng-href="#/businessTag" class="list-group-item">business Tag</A>
			  <A ng-href="#/products" class="list-group-item">Add Product</A>
			  <A ng-href="#/promotion" class="list-group-item">Promotion</A>
			  <!-- <A ng-href="#/list-all-business" class="list-group-item" >List All Business</A> -->
			  <A href="/Auth/log-out" class="list-group-item" data-ng-click="logout()">Log Out</A>
			  <!-- ng-href="/Auth/log-out" javascript:void(0)-->
		  <?php

			$value = Session::get('zeAccessKey');
			      

			if (Session::has('zeAccessKey'))
			{	
				$value = json_decode($value) ;
				// echo $value->AccessKey;
				// echo $value->ownerId;
				var_dump ($value);
			}
			?>
			<!-- <p>{{csrf_token()}}</p> -->
		  
		</div>
	</div>

	<div class="col-lg-10 appContent" >
		<div class="col-lg-12">
			<div ng-view></div>
		</div>
	</div>
</div>
@endsection