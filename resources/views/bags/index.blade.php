@extends('layouts.app')

@section('content')

<div class="container">
	<h3>My Bag</h3>
	@if(Session::has('status'))
	<div class="alert alert-success text-center w-100">{{Session::get('status')}}</div>
	@endif
	{{-- @include('titles.includes.error-status') --}}
	<div class="row">
		<div class="col-12">
		</div>
		@if(Session::has('bag'))
		<div class="col-12 col-md-8">
			{{-- table --}}
			<div class="table-responsive">
				<table class="table table-striped table-hover text-center">
					<thead>
						<th scope="col" colspan="3">Book</th>
						<th scope="col">Actions</th>
					</thead>
					<tbody>
						{{-- start of row --}}
						@foreach($titles as $title)
						<tr>
							<th scope="row" colspan="3">{{$title->name}}</th>
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
							<td></td>
								
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
	</div>
	<div class="col-12 col-md-4 border-left">
		@if($errors->has('date'))
		
		<p class="text-danger"><span class="small" >{{ $errors->first('date')}}</span></p>
		
		@endif
		{{-- <h5>Request Form</h5> --}}
		{{-- <hr> --}}
		<form action="{{route('tickets.store')}}" method="post" >
			@csrf
			<div class="form-group">
				<label for="needed" class="my-2">Date needed:</label>
				<input type="date" name="needed" id="needed" class="form-control-sm my-2" min="{{date('Y-m-d')}}" value="{{old('needed')}}">
				@if($errors->has('needed'))
				
				<p class="text-danger"><span class="small" >{{ $errors->first('needed')}}</span></p>
				
				@endif
			</div>

			<div class="form-group">
				<label for="returned" class="my-2">Date returned:</label>
				<input type="date" name="returned" id="returned" class="form-control-sm my-2" min="{{date('Y-m-d')}}" value="{{old('returned')}}">
				@if($errors->has('returned'))
				
				<p class="text-danger"><span class="small" >{{ $errors->first('returned')}}</span></p>
				
				@endif
			</div>
			<button class="btn-sm btn-primary">Submit request</button>
		</form>
	</form>
</div>
{{-- end of table --}}
@else
<div class="alert alert-info text-center mx-auto w-100">bag is empty</div>
@endif
</div>
</div>



@endsection