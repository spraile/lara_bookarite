@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 mx-auto">
			<h3>Assets</h3>
			@include('assets.includes.asset-table')
		</div>
	</div>
</div>

@endsection