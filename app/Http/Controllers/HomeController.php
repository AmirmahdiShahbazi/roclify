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


    public function search(Request $request){

        $request->validate(['name'=>'required|string']);
        
        $name=$request->input('name');

        $bands=Band::where('name','LIKE', '%'.$name.'%')->paginate(6);

        return view('band.archive',compact('bands'));

    }
}
