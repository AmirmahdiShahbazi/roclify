<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {



        
    }

    
    public function index()
    {
        $bands= Band::latest()
        ->take(6)
        ->get();

        $bands = (object)$bands->all();


        $albums=Album::latest()
        ->take(6)
        ->get();

        $albums = (object)$albums->all();


        return view('home.home',compact('albums','bands'));
    }
}
