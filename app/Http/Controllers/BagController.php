<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Title;
use App\Asset;

class BagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('bag')){
        // get all ids of bag session
            $title_ids = array_keys(Session::get('bag'));
        // query on database
            $titles = Title::find($title_ids);
            // dd($titles);
            // $total = 0;

            // foreach ($titles as $title) {
            //     // $title->needed = date('Y-m-d',strtotime(Session::get("bag.n$title->id")));
            //     $title->needed = Session::get("bag.$title->id.0");
            //     $title->returned = Session::get("bag.$title->id.1");
            //     // $title->returned = date('Y-m-d',strtotime(Session::get("bag.r$title->id")));
            // }
            
            // dd(Session::get("bag.r2"));
            return view('bags.index')->with('titles',$titles);
        } else {
            return view('bags.index');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bag)
    {
        // $request->validate([
        //     'needed' => 'required|date|after:yesterday',
        //     'returned' => 'required|date|after:yesterday'

        // ]);
        // $needed = $request->input('needed');
        // dd($needed);
        // $returned = $request->input('returned');
        // store to session_abort()
        
        $request->session()->put("bag.$bag");
        // $request->session()->put("bag.$bag", $returned);

        // dd(Session::get('bag'));
        return redirect(route('bags.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $bag)
    {
        // Session::forget("bag.$bag");

        $request->session()->forget("bag.$bag");
        if(count($request->session()->get('bag')) == 0) {
            $request->session()->forget('bag');
        }

        return redirect(route('bags.index'))->with('status','Product removed from bag');
    }

    public function empty()
    {
        Session::forget('bag');
        return redirect(route('bags.index'))->with('status','bag has been cleared');

    }
}
