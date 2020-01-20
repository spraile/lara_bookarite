@extends('layouts.app')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-1">
			<div class="btn-group-vertical">
				<a href="?status=" class="btn btn-outline-info border {{Request::query('status') ? "" : "active"}}">All</a>
				@foreach($ticket_statuses as $ticket_status)
				<a href="?status={{$ticket_status->id}}" class="btn btn-outline-info border {{Request::query('status') == $ticket_status->id ? "active" : ""}}">{{$ticket_status->name}}</a>

				{{-- <form action="" class="">
					<button class="btn btn-light d-block">{{$ticket_status->name}}</button>
				</form> --}}

				@endforeach

			</div>
		</div>
		<div class="col-12 col-md-11">
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead class="">
						<tr class="bg-info text-light">
							<th scope="col">Ticket code</th>
							<th scope="col">Books</th>
							<th scope="col" class="text-center">Date needed</th>
							<th scope="col" class="text-center">Date returned</th>
							<th scope="col" class="text-center">Status</th>
							<th scope="col" class="text-center">Action</th>
							<th scope="col" class="text-center">User</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tickets as $ticket)
							<tr >
							<td><a href="{{route('tickets.show',['ticket' => $ticket->id])}}">{{$ticket->ticket_code}}</a></td>
							<td>
								@foreach($ticket->assets as $ticket_asset)
							<p>{{$ticket_asset->name}}  <small>{{$ticket_asset->pivot->asset_code ? "(Asset code: ".$ticket_asset->pivot->asset_code.")" : ""}}</small></p>
								@endforeach
							</td>
							<td class="text-center">{{$ticket->needed_on}}</td>
							<td class="text-center">{{$ticket->returned_on}}</td>
							<td class="text-center"><h5><span class="badge badge-{{$ticket->ticket_status->id == 1 ? "warning" : ($ticket->ticket_status->id == 2 ? "success" : ($ticket->ticket_status->id == 3 ? "danger" : ($ticket->ticket_status->id == 4 ? "primary" : "secondary")))}}">{{$ticket->ticket_status->name}}</span></h5></td>
							<td>
								@can('isAdmin')
								@if ($ticket->ticket_status_id == 1)
								<form action="{{route('tickets.update',['ticket' => $ticket->id])}}?set=Accept" method="POST">
									@csrf
									@method('PUT')
									<button class="btn-sm btn-success mb-1 w-100">Accept</button>
								</form>
								<form action="{{route('tickets.update',['ticket' => $ticket->id])}}?set=Reject" method="POST">
									@csrf
									@method('PUT')
									<button class="btn-sm btn-danger mb-1 w-100">Reject</button>

								</form>
								@elseif($ticket->ticket_status_id == 2)
								<form action="{{route('tickets.update',['ticket' => $ticket->id])}}?set=Complete" method="post">
									@csrf
									@method('PUT')
									<button class="btn-sm btn-primary mb-1 w-100">Complete</button>
								</form>
								
								
								@endif
								@endcan
								
								@cannot('isAdmin')
								@if ($ticket->ticket_status_id == 1)	
								<form action="{{route('tickets.update',['ticket' => $ticket->id])}}?set=Cancel" method="post">
									@csrf
									@method('put')
									<button class="btn-sm btn-secondary mb-1 w-100">Cancel</button>
								</form>
								@endif
								@endcannot
								

								

								
							</td>
							<td class="text-center">{{$ticket->user->name}}</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection