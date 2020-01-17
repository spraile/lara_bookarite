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
								<button class="btn-sm btn-success">Accept</button>
								<button class="btn-sm btn-danger">Reject</button>
								<button class="btn-sm btn-primary">Complete</button>
								<button class="btn-sm btn-secondary">Cancel</button>
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