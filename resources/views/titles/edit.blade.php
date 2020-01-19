@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-8 mx-auto">
            <h3>Add Title</h3>
            <hr>
            <form action="{{route('titles.update',['title'=>$title->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Title</label>
                    
                    <input type="text" name="name" id="name" class="form-control-sm" placeholder="Book title" value="{{$title->name}}">
                    @if($errors->hasAny('name'))
                    
                    <p class="text-danger"><span class="small" >{{ $errors->first('name')}}</span> </p>
                    
                    @endif
                    
                </div>
                <div></div>
                <div class="form-group">
                    <label for="edition">Edition</label>
                    <input type="number" name="edition" id="edition" class="form-control-sm" placeholder="Edition" min="1" value="{{$title->edition}}">       
                    @if($errors->hasAny('name','edition'))
                    
                    
                    <p class="text-danger"><span class="small" >{{ $errors->first('edition')}}</span></p>
                    
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="author">Author</label>
                    
                    <input type="text" name="author" id="author" placeholder="Author" class="form-control-sm my-2" value="{{$title->author->name}}">
                    @if($errors->has('author'))
                    
                    <p class="text-danger"><span class="small" >{{ $errors->first('author')}}</span></p>             
                    
                    @endif
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    
                    <input type="text" name="isbn" id="isbn" class="form-control-sm" placeholder="13-digit ISBN" maxlength="13" value="{{$title->isbn}}">    
                    
                    @if($errors->has('isbn'))
                    
                    <p class="text-danger"><span class="small" >{{ $errors->first('isbn')}}</span></p>             
                    
                    @endif
                </div>
                <div></div>
                <select name="category-id" id="category-id" class="form-control-sm my-3 d-inline bg-white">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $title->category_id == $category->id ? "selected": ""}}>{{$category->name}}</option>
                    @endforeach
                </select>
                <label for="category-id" class="">Category</label>
                
                <input type="file" name="image" id="image" class="form-control-file mb-3">
                
                @if($errors->has('image'))
                
                <p class="text-danger"><span class="small" >{{ $errors->first('image')}}</span></p>             
                
                
                @endif
                
                <button class="btn-sm btn-primary">Update book details</button>                
            </form>
        </div>
    </div>
</div>
@endsection