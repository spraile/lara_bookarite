@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-md-8 mx-auto ">
      <h3>Books</h3>
      <hr>
      @foreach ($titles as $title)
        @include('titles.includes.title-card')
      @endforeach
    </div>
  </div>
</div>
@endsection