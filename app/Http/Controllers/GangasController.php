<?php

namespace App\Http\Controllers;

use App\Http\Requests\GangaRequest;
use App\Models\Categorie;
use App\Models\Ganga;
use Database\Seeders\GangaSeeder;
use Illuminate\Http\Request;

class GangasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
        $this->middleware('admin',['except'=>['index','show','indexDescount']]);
    }
    public function index()
    {
        $categories = Categorie::all();
        $productos = Ganga::all();

        $collection = collect($productos)->sortDesc();
        $gangas = $collection->groupBy('id_category');

        return view('welcome', compact('categories','gangas'));
    }

    public function indexDescount()
    {
        $categories = Categorie::all();
        $productos = Ganga::orderByRaw('(price - discount_price) Desc')->take(8)->get();
        //$productos = Ganga::orderBy('discount_price')->take(8)->get();
        $collection = collect($productos)->sortDesc();
        $gangas = $collection->groupBy('id_category');
        $gangas->all();
        return view('welcome', compact('categories','gangas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('ganga.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GangaRequest $request)
    {
        $ganga = new Ganga();
        $ganga->title = $request->title;
        $ganga->description = $request->description;
        $ganga->url = $request->url;
        $ganga->id_category = $request->id_category;
        $ganga->points = $request->points;
        $ganga->price = $request->price;
        $ganga->discount_price = $request->discount_price;
        $ganga->available = $request->available;
        $ganga->save();
        return redirect()->route('ganga.show', $ganga->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ganga = Ganga::findOrFail($id);
        return view('ganga.show', compact('ganga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categorie::all();
        $ganga = Ganga::findOrFail($id);
        return view('ganga.form', compact('categories','ganga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GangaRequest $request, $id)
    {
        $ganga = Ganga::findOrFail($id);
        $ganga->title = $request->title;
        $ganga->description = $request->description;
        $ganga->url = $request->url;
        $ganga->id_category = $request->id_category;
        $ganga->points = $request->points;
        $ganga->price = $request->price;
        $ganga->discount_price = $request->discount_price;
        $ganga->available = $request->available;
        $ganga->save();
        return view('ganga.show', compact('ganga'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $ganga = Ganga::findOrFail($id);
         $ganga->delete();
        return redirect()->route('ganga.index');
    }
}
