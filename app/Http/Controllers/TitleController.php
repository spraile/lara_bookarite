<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;
use App\Author;
use App\Category;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("titles.index")
        ->with('titles',Title::all())
        ->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('titles.create')->with('categories',Category::all());

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
            'name' => 'string|required|max:50|unique:categories,name',
            'author' => 'string|required|max:50',
            'category-id' => 'required',
            'image' => 'required|image|max:5000'
        ]);

        $title = new Title;
        $title->name = $request->input('name');
        $title->edition = $request->input('edition');
        $title->category_id = $request->input('category-id');

        $author = Author::all()->firstWhere('name',$request->input('author'));
        if (!$author) {
            $author = new Author;
            $author->name = $request->input('author');
            $author->save();
            // $title->author_id = $author->id;
        } 
        $title->author_id = $author->id;
        $title->image = $request->image->store('titles');

        // $title->author_id = $request->input('author');
        $title->save();


        // return str_ordinal($title->edition)." ".$title->name;
        // return $author->id;
        // return $title->author_id;
        return redirect(route('titles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        //
    }
}
