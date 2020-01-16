<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Title;
use App\AssetStatus;
use Str;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Asset::orderBy('title_id','asc')->orderBy('asset_code','asc')->get();
       return view('assets.index')->with('assets',$assets);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assets.create')->with('titles',Title::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required|min:1'
        ]);

        for($i = 0; $i < $request->input('qty'); $i++) {
           $asset = new asset;
           $asset->title_id = $request->input('name');
           $asset->asset_status_id = 1;
           $asset->save();

           $title = Title::find($request->input('name'));
           $asset->asset_code = sprintf("%03s",strval($asset->title_id)).sprintf("%04s", strval($asset->id));

           $asset->save();
       }
       
       $stocks = Asset::all()->whereIn('title_id',$request->input('name'))->whereIn('asset_status_id',1);
       $title = Title::find($request->input('name'));
       $title->stock = count($stocks);

       if (count($stocks)) {
            $title->title_status_id = 1;
       }



        // return redirect(route('assets.index'));
       return redirect(route('assets.index'));
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        return view('assets.show')->with('asset',$asset);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        // return "Edit";
        return view('assets.edit')->with('asset',$asset)->with('statuses',AssetStatus::all());
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
         if ($request) {
            $request->validate([
                'status' => 'required'
            ]);
        }

        $asset->asset_status_id = $request->input('status');
        $asset->save();
        return view('assets.show')->with('asset',$asset);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect(route('assets.index'));
    }
}
