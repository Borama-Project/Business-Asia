@extends('layout')

@section('content')
<div ng-view>

</div>
<?php
// $value = Session::get('zeAccessKey');
// $value = Session::get('zeAccessKey');
        
// Session::put('zeAccessKey', 'value');
$value = Session::all();
        // var_dump($value);

if (Session::has('zeAccessKey'))
{
    var_dump($value);
}
else{
	echo 'data';
}
?>
@endsection