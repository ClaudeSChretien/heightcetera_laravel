<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Trip;
use App\Post;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trips = Trip::all();
        if($trips)
            return view('trips',compact("trips"));
        else
            return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('tripManager.create');
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
        $request->validate([
            'name'=>'required',
            'lon'=>'required',
            'lat'=>'required',
            'zoom'=>'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date'=>'required',
            'text_fr'=>'required',
            'text_en'=>'required',
        ]);
        
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = $request->get('name') . "_" . time().'.'.$image->getClientOriginalExtension();
        Storage::disk('tripImages')->put($filename,  File::get($image));
       
        //$check = Post::insert($insert);
 
        //return Redirect::to("image")->withSuccess('Great! Image has been successfully uploaded.');


        $trip = new Trip([
            'name' => $request->get('name'),
            'lon' => $request->get('lon'),
            'lat' => $request->get('lat'),
            'zoom' => $request->get('zoom'),
            'path' => $filename,
            'date' => $request->get('date'),
            'text_fr' => $request->get('text_fr'),
            'text_en' => $request->get('text_en')

        ]);
        $trip->save();
        return redirect('/trip/')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //
        $trip = Trip::where('name',$name)->first();
        
        if($trip)
            return view('trip',compact("trip"));
        else
            return redirect('/');
    }

    public function markers($name)
    {
        $id = Trip::where('name', $name)->first()->id;

        $posts = Trip::find($id)->posts;
        if ($posts)
            return $posts;
        else
            return redirect('/');
    }

    public function mapInfo($name)
    {
        $trip = Trip::where('name', $name)->first();

        if ($trip)
            return $trip;
        else
            return redirect('/');
    }


    public function ShowAdmin(){

        $trips = Trip::all();
        if($trips)
            return view('tripManager.trips',compact("trips"));
        else
            return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trip = Trip::find($id);
        return view('tripManager.edit', compact('trip'));  
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
        $request->validate([
            'name'=>'required',
            'lon'=>'required',
            'lat'=>'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date'=>'required',
            'text_fr'=>'required',
            'text_en'=>'required',
        ]);
        
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = $request->get('name') . "_" . time().'.'.$image->getClientOriginalExtension();
        Storage::disk('tripImages')->put($filename,  File::get($image));
       
        //$check = Post::insert($insert);
 
        //return Redirect::to("image")->withSuccess('Great! Image has been successfully uploaded.');


        $trip = Trip::find($id);
        $trip->name = $request->get('name');
        $trip->lon = $request->get('lon');
        $trip->lat =  $request->get('lat');
        $trip->path = $filename;
        $trip->date = $request->get('date');
        $trip->text_fr = $request->get('text_fr');
        $trip->text_en = $request->get('text_en');
        $trip->save();
        return redirect('/trip/')->with('success', 'Contact saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = Trip::find($id);
        $posts = Post::where('trip_id', $id);
        
        $trip->delete();
        $posts->delete();

        return redirect('/tripManager')->with('success', 'Contact deleted!');
    }
}
