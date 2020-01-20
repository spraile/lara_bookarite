<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Asset;
use App\Title;
use App\TicketStatus;
use Illuminate\Http\Request;
use Str;
use Auth;
use Session;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ticket $ticket, Request $request)
    {
        $this->authorize('viewAny',$ticket);

        $filter = $request->query('status');

        if($filter) {

            if(Auth::user()->role_id == 1) {

                $tickets = Ticket::all()->whereIn('ticket_status_id',$filter);

            } else {

                $tickets = Ticket::all()->whereIn('user_id', [Auth::user()->id])->whereIn('ticket_status_id',$filter) ;
            }
        } else {
            if(Auth::user()->role_id == 1) {

                $tickets = Ticket::all();

            } else {

                $tickets = Ticket::all()->whereIn('user_id', [Auth::user()->id]);
            }
        }


        
        return view('tickets.index')->with('tickets',$tickets)->with('ticket_statuses',TicketStatus::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ticket $ticket)
    {
        $this->authorize('create',$ticket);

        $ticket = new Ticket;
        $ticket->user_id = Auth::user()->id;
        $ticket->ticket_code = Auth::user()->id.Str::random(10);
        $ticket->needed_on = $request->input('needed');
        $ticket->returned_on = $request->input('returned');
        $ticket->save();

        $title_ids = array_keys(Session::get('bag'));
        $titles = Title::find($title_ids);

        foreach ($titles as $title) {
            $asset_id = Asset::all()->whereIn('title_id',$title->id)->whereIn('asset_status_id',1)->first();
            $ticket->assets()
            ->attach(
                $asset_id->id,
                [
                    'title' => $title->name
                ]

            );
        }
        Session::forget('bag');

        return redirect(route('tickets.show',['ticket' => $ticket->id]));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $this->authorize('view',$ticket);


        return view('tickets.show')->with('ticket',$ticket)->with('ticket_statuses',TicketStatus::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $this->authorize('update',$ticket);


        $set = $request->query('set');
        if($set) {

            switch ($set) {
                case 'Accept':
                $ticket->ticket_status_id = 2;
                $ticket->save();

                foreach ($ticket->assets as $asset ) {
                    $asset->asset_status_id = 2;
                    $asset->user_id = $ticket->user_id;
                    $asset->save();
                }

                break;
                case 'Reject':
                $ticket->ticket_status_id = 3;
                $ticket->save();

                break;
                case 'Complete':
                $ticket->ticket_status_id = 4;
                $ticket->save();
                foreach ($ticket->assets as $asset ) {
                    $asset->asset_status_id = 1;
                    $asset->user_id = null;

                    $asset->save();
                }
                break;
                case 'Cancel':
                $ticket->ticket_status_id = 5;
                $ticket->save();
                break;
            }
        } else {
            $status = $request->input('status');
            $ticket->ticket_status_id = $status;
            $ticket->save();
        }
        // return redirect(route('tickets.show',['ticket' => $ticket->id]));
        return redirect(route('tickets.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
