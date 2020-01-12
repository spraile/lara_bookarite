@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
            <h3>{{$category->name}}</h3>
            <hr>
            <p>Created on @if($category->created_at){{$category->created_at->format('F d, Y')}}@else January 12, 2020 @endif</p>
            <p>Last updated on @if($category->updated_at){{$category->updated_at->format('F d, Y')}}@else January 12, 2020 @endif</p>
            <a href="{{route('categories.edit',['category' => $category->id])}}"><button class="btn-sm btn-warning">Edit</button></a>
            <form action="{{route('categories.destroy',['category' => $category->id])}}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn-sm btn-danger">Remove</button>
            </form>
            </div>
        </div>
    </div>
@endsection