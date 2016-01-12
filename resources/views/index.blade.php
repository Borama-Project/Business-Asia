@extends('layout')

@section('content')
<div class="container">

	<div class="col-lg-3 appContent no-right">
		<div class="list-group">
		  <a href="javascript:void(0)" class="list-group-item active">
		    Social Business
		  </a>
		  <a href="#/category" class="list-group-item">Add Category</a>
		  <a href="#/business" class="list-group-item">Register Business</a>
		  <a href="#/businessType" class="list-group-item">business Type</a>
		  <a href="#/businessTag" class="list-group-item">business Tag</a>
		  <a href="#/product" class="list-group-item">Add Product</a>
		  <a href="#/promotion" class="list-group-item">Promotion</a>
		  <a href="/Auth/log-out" class="list-group-item">Log Out</a>
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