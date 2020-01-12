@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 mx-auto">
            <h3>Edit {{$category->name}}</h3>
            <hr>
            <form action="{{route('categories.update',['category' => $category->id])}}" method="post">
                @csrf
                @method('put')
            <input type="text" name="name" id="name" class="form-control-sm" placeholder="Category name" value="{{$category->name}}">
                <button class="btn-sm btn-primary">Update category</button>                
            </form>
            </div>
        </div>
    </div>
@endsection