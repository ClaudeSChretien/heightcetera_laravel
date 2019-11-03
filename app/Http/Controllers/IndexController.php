<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;

class IndexController extends Controller
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
        if ($trips)
            return view('welcome', compact("trips"));
        else
            return redirect('/');
    }
}
