<?php

namespace App\Http\Controllers;

use App\Models\CustomRequest;
use App\Models\Dren;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
        return view('pages.accueil');
    }

    public function search()
    {
        $drens=Dren::orderBy('name')->get();
        return view('pages.search', compact('drens'));
    }

    public function result()
    {
        //('ddd');
        $dren=request()->input('dren');
        $results=CustomRequest::with('user')
                               ->where('odren', $dren)
                               ->orWhere('sdren', $dren)
                               ->orderBy('created_at','desc')
                               ->get();
        $drens=Dren::all();
        //dd($results);
        return view('pages.result', compact('results', 'drens'));
    }

}
