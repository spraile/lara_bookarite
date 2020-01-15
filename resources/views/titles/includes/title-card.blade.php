
<div class="card mb-3 border-top-0 border-left-0 border-right-0">
  
  <div class="row no-gutters ">
    <div class="col-md-3">
      <img src="/public/{{$title->image}}" class="card-img" alt="...">
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title"><a href="{{route('titles.show',['title' => $title->id])}}">{{$title->name}}</a></h5>
        <p class="card-text my-0"><strong>Author: </strong>{{$title->author->name}}</p>
        <p class="card-text my-0"><strong>Edition: </strong>{{str_ordinal($title->edition)}}</p>
        <p class="card-text my-0"><strong>ISBN: </strong>{{$title->isbn}}</p>
        <p class="card-text my-0"><strong>Binding: </strong>{{$title->category->name}}</p>
        <p class="card-text mt-0 availability text-{{ $title->title_status_id == 1 ? "success" : "secondary"}}"><strong>{{$title->title_status->name}}</strong></p>
        <button class="btn-sm {{ $title->title_status_id == 1 ? "btn-primary" : ""}} "{{ $title->title_status_id == 1 ? "" : "disabled"}}>
          Rent this book
        </button>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card-body">
        <a href="{{route('titles.edit',['title' => $title->id])}}"><button class="btn-sm btn-warning w-100 mb-1">Edit book details</button></a>   
        <form action="{{route('titles.destroy',['title' => $title->id])}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn-sm btn-danger w-100 my-1">Remove title</button>
        </form>                   
      </div>
    </div>
  </div>
</div>
