@extends('layouts/admin')

@section('content')
	@if(Session::has('info'))
		<div class="row">
			<div class="col-md-12">
				<p class="alert alert-info">{{Session::get('info') }}</p>
			</div>
		</div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<p><strong>Laravel Laravel</strong></p>
			<a class="btn btn-success" href="{{route('adminEdit', ['id => 1'])}}">Edit</a></p>
		</div>
	</div>
@endsection