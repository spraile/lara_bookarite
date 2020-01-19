@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <h3>Create Category</h3>
            <hr>
            <form action="{{route('categories.store')}}" method="post">
                @csrf
                <input type="text" name="name" id="name" class="form-control-sm" placeholder="Category name">
                
                <button class="btn-sm btn-primary">Add category</button>    
                @if($errors->has('name'))
                    
                    
                    <p class="text-danger"><span class="small" >{{ $errors->first('name')}}</span></p>
                    
                @endif            
            </form>
        </div>
    </div>
</div>

@endsection