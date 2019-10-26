<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postManager.create');
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
            'name'=>'required',
            'lon'=>'required',
            'lat'=>'required',
            'path'=>'required',
            'photographer'=>'required',
            'rating'=>'required',
            'date'=>'required',
            'type'=>'required',
            'text'=>'required',
        ]);

        $dt = Carbon::now();

        $contact = new Post([
            'name' => $request->get('name'),
            'lon' => $request->get('lon'),
            'lat' => $request->get('lat'),
            'path' => $request->get('path'),
            'photographer' => $request->get('photographer'),
            'rating' => $request->get('rating'),
            'date' => $request->get('date'),//$dt->toDateString(),
            'type' => $request->get('type'),
            'text' => $request->get('text'),

        ]);
        $contact->save();
        return redirect('/postManager')->with('success', 'Contact saved!');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
