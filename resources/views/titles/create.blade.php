@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <h3>Add Title</h3>
            <hr>
            <form action="{{route('titles.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" id="name" class="form-control-sm" placeholder="Book title">
                
                @if($errors->has('name'))
                
                <div class="alert alert-danger">{{ $errors->first('name')}}</div>
                
                @endif
                
                <input type="number" name="edition" id="edition" class="form-control-sm" placeholder="Edition" min="1">         
                
                <input type="text" name="author" id="author" placeholder="Author" class="form-control-sm">
                
                @if($errors->has('name'))
                
                <div class="alert alert-danger">{{ $errors->first('name')}}</div>
                
                @endif
                <div></div>
                <select name="category-id" id="category-id" class="form-control-sm my-3 d-inline bg-white">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ old('category-id') == $category->id ? "selected": ""}}>{{$category->name}}</option>
                    @endforeach
                </select>
                <label for="category-id" class="">Category</label>

                <input type="file" name="image" id="image" class="form-control-file mb-3">

				@if($errors->has('image'))
						
						    <div class="alert alert-danger">{{ $errors->first('image')}}</div>
					
                @endif
                
                <button class="btn-sm btn-primary">Add Title</button>                
            </form>
        </div>
    </div>
</div>
@endsection