
<div class="card mb-3 border-top-0 border-left-0 border-right-0">

  <div class="row no-gutters ">
    <div class="col-md-3">
      <img src="/public/{{$title->image}}" class="card-img" alt="...">
      {{-- <img src="/titles/{{$title->image}}" class="card-img" alt="..."> --}}
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title"><a href="{{route('titles.show',['title' => $title->id])}}">{{$title->name}}</a></h5>
        <p class="card-text my-0"><strong>Author: </strong>{{$title->author->name}}</p>
        <p class="card-text my-0"><strong>Edition: </strong>{{str_ordinal($title->edition)}}</p>
        <p class="card-text my-0"><strong>ISBN: </strong>{{$title->isbn}}</p>
        <p class="card-text my-0"><strong>Binding: </strong>{{$title->category->name}}</p>
        {{-- <p class="card-text mt-0 availability text-{{ $title->title_status_id == 1 ? "success" : "secondary"}}"><strong>{{$title->title_status->name}}</strong></p> --}}
      <h5 class="card-text mt-0"><span class="badge badge-{{$title->title_status_id == 1 ? "success" : "secondary"}}"><strong>{{$title->title_status->name}}</strong></span></h5>

        @cannot('isAdmin')
        <button class="btn-sm {{ $title->title_status_id == 1 ? "btn-primary" : ""}} "{{ $title->title_status_id == 1 ? "" : "disabled"}} data-toggle="modal" data-target="#rent{{$title->id}}" data-id="{{$title->id}}">
          Borrow this book
        </button>
        @endcannot
      </div>
    </div>
    @can('isAdmin')
    <div class="col-md-3">
      <div class="card-body">
        <p class="card-text my-0"><strong>Stock: </strong>{{$title->stock}}</p>
        <a href="{{route('titles.edit',['title' => $title->id])}}"><button class="btn-sm btn-warning w-100 mb-1">Edit book details</button></a>  
        <button class="btn-sm btn-danger w-100 my-1 "data-toggle="modal" data-target="#remove{{$title->id}}" data-id="{{$title->id}}">
          Remove title
        </button> 
        {{-- <form action="{{route('titles.destroy',['title' => $title->id])}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn-sm btn-danger w-100 my-1">Remove title</button>
        </form>                    --}}
      </div>
    </div>
      
    @endcan
  </div>
</div>


<div class="modal fade" id="rent{{$title->id}}" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rentLabel">Add {{$title->name}} to BookBag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you want to add <strong>{{$title->name}}</strong> to BookBag?</p>
      </div>
      <div class="modal-footer">
        @can('isLogged')        
        <form action="{{route('bags.update',['bag' => $title->id])}}" method="post">
          @csrf
          @method('PUT')
          <button type="submit" class="btn-sm btn-primary">Add to BookBag</button>
        </form>
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        @endcan
        @guest
        <a href="{{ route('login') }}"><button type="submit" class="btn-sm btn-primary">Add to BookBag</button></a>    
        @endguest
      </div>
      
    </div>
  </div>
</div>


<div class="modal fade" id="remove{{$title->id}}" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="removeLabel">Remove {{$title->name}}?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Please decommission and remove all assets of <strong>{{$title->name}}</strong> first before removing this title.</p>
      </div>
      <div class="modal-footer">
        <form action="{{route('titles.destroy',['title' => $title->id])}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn-sm btn-danger w-100 my-1">Remove title</button>
        </form>      
      </div>
      {{-- Asset::all()->whereIn('title_id', $title->id)->whereIn('asset_status_id',[1,2,3]) --}}
    </div>
  </div>
</div>
