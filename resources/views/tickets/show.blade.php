@extends("layouts.app")
@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 mx-auto">
			<h3>Ticket: {{$ticket->ticket_code}}</h3>
			<div class="table-responsive ">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th scope="row">Status</th>
							<td>
								{{$ticket->ticket_status->name}}
								@can('isAdmin')
							<form action="{{route('tickets.update',['ticket' => $ticket->id])}}" method="POST">
								@csrf
								@method('PUT')
									<select name="status" id="status" class="form-control-sm">
										@foreach($ticket_statuses as $ticket_status)
										<option value="{{$ticket_status->id}}" {{$ticket->ticket_status->id == $ticket_status->id ? "selected" : ""}}>{{$ticket_status->name}}</option>
										@endforeach

									</select>
									<button class="btn-sm btn-primary">Update</button>

								</form>
								@endcan
								
							</td>
						</tr>
						<tr>
							<th scope="row">Request date</th>
							<td>{{$ticket->created_at}}</td>
						</tr>
						<tr>
							<th scope="row">Date needed</th>
							<td>{{$ticket->needed_on}}</td>
						</tr>
						<tr>
							<th scope="row">Date returned</th>
							<td>{{$ticket->returned_on}}</td>
						</tr>
						<tr>
							<th scope="row">Books borrowed</th>
							<td>
								
									@foreach($ticket->assets as $ticket_asset)
									<p>{{$ticket_asset->name}} <small>{{$ticket_asset->pivot->asset_code ? "(Asset code: ".$ticket_asset->pivot->asset_code.")" : ""}}</small></p>
									@endforeach
								
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


@endsection