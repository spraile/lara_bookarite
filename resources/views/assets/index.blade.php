@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 mx-auto">
			<h3>Assets</h3>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">Asset Code</th>
							<th scope="col">Title</th>
							<th scope="col">Status</th>
							<th scope="col">User</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($assets as $asset)
						<tr>
							<td>{{$asset->asset_code}}</td>
							<td>{{$asset->title->name}}</td>
							<td>{{$asset->asset_status->name}}</td>
							<td>User</td>
							<td>
								<a href="{{route('assets.show',['asset' => $asset->id])}}"><button class="btn-sm btn-info w-100">Details</button></a>
								<a href="{{route('assets.edit',['asset' => $asset->id])}}"><button class="btn-sm btn-warning w-100">Edit</button></a>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection