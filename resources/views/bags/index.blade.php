@extends('layouts.app')

@section('content')

<div class="container">
	<h3>My Bag</h3>
	@if(Session::has('status'))
	<div class="col-12 alert alert-success text-center">{{Session::get('status')}}</div>
	@endif
	{{-- @include('titles.includes.error-status') --}}
	<div class="row">
		<div class="col-12">
		</div>
		<div class="col-12">
	@if(Session::has('bag'))
			{{-- table --}}
			<div class="table-responsive">
				<table class="table table-striped table-hover text-center">
					<thead>
						<th scope="col">Book</th>
						<th scope="col">Date needed</th>
						<th scope="col">Date returned</th>
						<th scope="col">Actions</th>
					</thead>
					<tbody>
						{{-- start of row --}}
						@foreach($titles as $title)
						<tr>
							<th scope="row">{{$title->name}}</th>
							<td><span>{{$title->needed}}</span></td>
							<td>{{$title->returned}}</td>						
							
							<td>
								<form action="{{route('bags.destroy', ['bag'=>$title->id])}}" method="POST">
									@csrf
									@method('DELETE')
									<button class="btn-sm btn-danger">Remove from bag</button>
								</form>
							</td>
						</tr>
						@endforeach
						{{-- end of row --}}
					</tbody>
					<tfoot>
						<tr>
							<td>
								<form action="{{route('bags.empty')}}" method="POST">
									@csrf
									@method('DELETE')
									<button class="btn-sm btn-danger">Clear bag</button>
								</form>
							</td>
							<td></td>
							<td></td>
							<td>
								{{-- @can('isLogged') --}}
								<form action="
								{{-- {{route('tickets.store')}} --}}
								" method="POST">
									@csrf
									<button class="btn-sm btn-primary mb-2">Send request</button>
								</form>
								<div id="paypal-btn"></div>
								{{-- @endcan --}}
								{{-- @cannot('isLogged') --}}
					{{-- 				<a href="{{route('login')}}"><button class="btn-sm btn-primary w-100">Send request</button></a> --}}

								{{-- @endcannot	 --}}
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			{{-- end of table --}}
		</div>
	</div>
	@else
	<div class="alert alert-info text-center">bag is empty</div>
	@endif
</div>

	

@endsection