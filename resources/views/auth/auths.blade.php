@extends('layout')

@section('content')
<div ng-view>
<div class="container" >
	<div id="contentCenter">
	  <div class="col-lg-12"> 
	    <form>
	      <div class="form-group col-xs-12">
	          <img src="../assets/img/logo.png">
	      </div>
	      <div class="form-group col-xs-12">
	          <img src="../assets/img/f.png" data-ng-click="IntentLogin()" id="fbLogin">
	      </div>
	    </form>
	  </div>
	</div>
</div>
</div>

@endsection