@extends('layouts.app')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-1">
			<div class="btn-group-vertical">
				<button type="button" class="btn btn-secondary">Pending</button>
				<button type="button" class="btn btn-secondary">Accepted</button>
				<button type="button" class="btn btn-secondary">Rejected</button>
				<button type="button" class="btn btn-secondary">Completed</button>
				<button type="button" class="btn btn-secondary">Cancelled</button>
			</div>
		</div>
		<div class="col-12 col-md-11">
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">Ticket code</th>
							<th scope="col">Books</th>
							<th scope="col">Date needed</th>
							<th scope="col">Date returned</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
							<th scope="col">User</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tickets as $ticket)
							<tr>
							<td><a href="{{route('tickets.show',['ticket' => $ticket->id])}}">{{$ticket->ticket_code}}</a></td>
							<td>
								@foreach($ticket->assets as $ticket_asset)
								<p>{{$ticket_asset->title->name}} (Asset code: {{$ticket_asset->asset_code}})</p>
								@endforeach
							</td>
							<td>{{$ticket->needed_on}}</td>
							<td>{{$ticket->returned_on}}</td>
							<td>{{$ticket->ticket_status->name}}</td>
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
									
								<form action="{{route('tickets.update',['ticket' => $ticket->id])}}?set=Cancel" method="post">
									@csrf
									@method('put')
									<button class="btn-sm btn-secondary mb-1 w-100">Cancel</button>
								</form>
								@endcannot
								

								

								
							</td>
							<td>{{$ticket->user->name}}</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection