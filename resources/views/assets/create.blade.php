@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 mx-auto">
			<h3>Add Assets</h3>
			<hr>
			<form action="{{route('assets.store')}}" method="post">
				@csrf
				<div class="form-group">
					<label for="name">Title</label>
					<select name="name" id="name" class="form-control-sm bg-white">
						@foreach($titles as $title)
						<option value="{{$title->id}}">{{$title->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="qty">Quantity</label>
					<input type="number" name="quantity" id="quantity" min="1" class="form-control-sm">
					@if($errors->has('quantity'))
                    
                    
                    <p class="text-danger"><span class="small" >{{ $errors->first('quantity')}}</span></p>
                    
                @endif   
				</div>
				<button class="btn-sm btn-info p-2">Add assets</button>
			</form>
		</div>
	</div>
</div>

@endsection