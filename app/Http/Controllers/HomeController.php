<?php

namespace App\Http\Controllers;

use App\Models\Iep;
use App\Models\Dren;
use Illuminate\Http\Request;
use App\Models\CustomRequest;

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
       $rdren = Dren::where('name', $dren)->first();
        // dd($rdren);
        // $results = CustomRequest::where('odren',$dren)->get();
        $ieps = $this->searchIep($rdren->id);
        // dd($ieps);
        return view('pages.result', compact('results', 'ieps'));
    }
    public function searchIep($id){

        // Retour des ecoles pour l'Iepsélectionée
        return Iep::whereDrenId($id)->get();
    }

    public function resultIep(){

        $iep = request()->input('iep');
        $results = CustomRequest::with('user')
                                ->where('oiep',$iep)
                                ->orWhere('siep',$iep)
                                ->orderBy('created_at','desc')
                                ->get();
        $riep = Iep::where('name',$iep)->first();
        $rdren = Iep::find($riep->id)->dren;
        $ieps = $this->searchIep($rdren->id);
        return view('pages.result', compact('results', 'ieps'));
    }


}
