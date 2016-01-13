@extends('layout')

@section('content')
<div class="container">

	<div class="col-lg-3 appContent no-right">
		<div class="list-group">
			  <a href="javascript:void(0)" class="list-group-item active">
				Social Business
			  </a>
			  <A ng-href="#/category" class="list-group-item">Add Category</A>
			  <A ng-href="#/business" class="list-group-item">Register Business</A>
			  <A ng-href="#/businessType" class="list-group-item">business Type</A>
			  <A ng-href="#/businessTag" class="list-group-item">business Tag</A>
			  <A ng-href="#/product" class="list-group-item">Add Product</A>
			  <A ng-href="#/promotion" class="list-group-item">Promotion</A>
			  <A ng-href="#/list-all-business" class="list-group-item" >List All Business</A>
			  <A ng-href="/Auth/log-out" class="list-group-item">Log Out</A>
		  <?php

			$value = Session::get('zeAccessKey');
			        

			if (Session::has('zeAccessKey'))
			{	
				var_dump($value);
			}
			?>
		  
		</div>
	</div>

	<div class="col-lg-9 appContent" >
		<div class="col-lg-12"> 
			<div ng-view></div>
		</div>
	</div>
</div>
@endsection