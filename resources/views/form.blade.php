@extends('layout')

@section('content')
<form action="/Auth" method="post">
	<input type="text" value="Sothearit Khon" name="displayName">
	<input type="text" value="{{ csrf_token() }}" name="csrf-token">
	<input type="text" value="Khon" name="firstName">
	<input type="text" value="Sothearit" name="lastName">
	<input type="text" value="1039093339465757" name="social_id">
	<input type="text" value="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfa1/v/t1.0-1/p50x50/12316137_1014497531925338_7062113219474943880_n.jpg?oh=5e8f7b7b4116de94b28bead1a02d7acb&oe=573D3AB1&__gda__=1463643191_7e45fd173549b2e034bb02121a1a7aa8" name="avatar">
	<input type="text" value="1" name="socialType">
	<input type="submit" value="Submit" name="submit">
</form>

@endsection