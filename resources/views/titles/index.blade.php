@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 mx-auto">
                <h3>Books</h3>
                <hr>
                @foreach ($titles as $title)
                <div class="card mb-3">
                    <div class="row no-gutters">
                      <div class="col-md-3">
                        <img src="/storage/{{$title->image}}" class="card-img" alt="...">
                      </div>
                      <div class="col-md-9">
                        <div class="card-body">
                        <h5 class="card-title"><a href="{{route('titles.show',['title' => $title->id])}}">{{$title->name}}</a></h5>
                        <p class="card-text"><strong>Author: </strong>{{$title->author->name}}</p>
                        <p class="card-text"><strong>Binding: </strong>{{$title->category->name}}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection