@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 mx-auto">
			<h3>{{$asset->title->name}}</h3>
			<small>Asset Code: {{$asset->asset_code}}</small>
			<hr>
			<p>Status: {{$asset->asset_status->name}}</p>
			@if($asset->asset_status_id == 2)
			<p>Currently used by: user_name</p>
			@endif
			<p>Created on @if($asset->created_at){{$asset->created_at->format('F d, Y')}}@else January 12, 2020 @endif</p>
			<p>Last updated on @if($asset->updated_at){{$asset->updated_at->format('F d, Y')}}@else January 12, 2020 @endif</p>
			<a href="{{route('assets.edit',['asset' => $asset->id])}}"><button class="btn-sm btn-warning">Edit</button></a>
			<form action="{{route('assets.destroy',['asset' => $asset->id])}}" method="POST" class="d-inline">
				@csrf
				@method('DELETE')
				<button class="btn-sm {{$asset->asset_status_id == 4 ? "btn-danger" : ""}}" {{$asset->asset_status_id == 4 ? "" : "disabled"}}
				>Remove</button>
			</form>
		</div>
	</div>
</div>
@endsection