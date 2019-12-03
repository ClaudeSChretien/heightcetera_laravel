<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Post;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::all();
        $posts = DB::table('posts')->inRandomOrder()->get();
        if ($trips)
            return view('welcome', compact("trips","posts"));
        else
            return redirect('/');
    }
}
