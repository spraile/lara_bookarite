@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
           <h3>{{$asset->title->name}}</h3>
           <small>Asset Code: {{$asset->asset_code}}</small>
           <hr>

           <form action="{{route('assets.update',['asset' => $asset->id])}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="status" class="">Asset Status</label>
                <select name="status" id="status" class="form-control-sm my-3 d-inline bg-white">
                    @foreach($statuses as $status)
                    <option value="{{$status->id}}" {{ $asset->asset_status_id == $status->id ? "selected": ""}}>{{$status->name}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn-sm btn-primary">Update asset</button>                
        </form>
    </div>
</div>
</div>
@endsection