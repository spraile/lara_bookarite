@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <h3>Categories</h3>
            <hr>
            @foreach ($categories as $category)
            <li class="my-3">
                {{$category->name}}
            <a href="{{route('categories.show',['category' => $category->id])}}"><button class="btn-sm btn-info">Details</button></a>
            <a href="{{route('categories.edit',['category' => $category->id])}}"><button class="btn-sm btn-warning">Edit</button></a>
            <form action="{{route('categories.destroy',['category' => $category->id])}}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn-sm btn-danger">Remove</button>
            </form>

            </li>
            @endforeach
        </div>
        
    </div>
</div>
@endsection