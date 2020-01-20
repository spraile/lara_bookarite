@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-md-8 mx-auto ">
      <h3>Books</h3>
      <hr>
    {{-- <form action="{{route(titles.show)}}"> --}}
        <select name="name" id="name" class="form-control d-inline w-75 mb-3" onchange="window.location.href=this.value">
          @foreach ($titles as $title)
          <option value="{{route('titles.show',['title'=>$title->id])}}">{{$title->name}}</option>
          
          @endforeach

        </select><h6 class="d-inline"><i class="fas fa-search"></i></h6>
        {{-- <button class="btn-sm btn-info">Search</button>
      </form> --}}
      @foreach ($titles as $title)
      @include('titles.includes.title-card')
      @endforeach
    </div>
  </div>
</div>
@endsection