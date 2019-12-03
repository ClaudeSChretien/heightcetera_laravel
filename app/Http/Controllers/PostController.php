<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Post;
use App\Trip;
use Carbon\Carbon;


class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($test)
    {
        $trip = Trip::where('name', $test)->first();

        if ($trip) {
            $posts = Trip::find($trip->id)->posts;
            return view('postManager', compact("trip", "posts"));
        } else
            return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($test)
    {
        $trip = Trip::where('name', $test)->first();
        if ($trip)
            return view('postManager.create', compact("trip"));
        else
            return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $trip)
    {
        $trip_id = Trip::where('name', $trip)->first()->id;
        $request->validate([
            'name' => 'required',
            'lon' => 'required',
            'lat' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photographer' => 'required',
            'rating' => 'required',
            'date' => 'required',
            'type' => 'required',
            'text_fr' => 'required',
            'text_en' => 'required',
        ]);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = $request->get('name') . "_" . time() . '.' . $extension;
        Storage::disk('postsImages')->put($filename,  File::get($image));

        $post = new Post([
            'name' => $request->get('name'),
            'lon' => $request->get('lon'),
            'lat' => $request->get('lat'),
            'trip_id' => $trip_id,
            'path' => $filename,
            'file_type' => 'img',
            'photographer' => $request->get('photographer'),
            'rating' => $request->get('rating'),
            'date' => $request->get('date'), //$dt->toDateString(),
            'type' => $request->get('type'),
            'text_fr' => $request->get('text_fr'),
            'text_en' => $request->get('text_en')

        ]);
        $post->save();
        return redirect('/trip/' . $trip . '/postManager')->with('success', 'Contact saved!');
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
        return "post edit";
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
