<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CustomRequest;
use App\Http\Controllers\Controller;
use App\Models\Apply;
use MercurySeries\Flashy\Flashy;

class APermutController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permutations=CustomRequest::with('user')->orderBy('created_at','desc')->paginate(15);

        Flashy::info('Bienvenus sur la liste des permutations.');
        return view('admin.permutation.index', compact('permutations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permutation=CustomRequest::find($id);
        $responses=Apply::where('customrequest_id', $id)->orderBy('created_at','desc')->get();
        //dd($responses);

        return view('admin.permutation.show', compact('permutation', 'responses'));
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
        $permutation=CustomRequest::find($id);

        $permutation->delete();

        Flashy::error('demande de permutation supprimée avec succès!');
        return redirect()->back();
        // ->with('success','demande de permutation supprimée avec succès!');
    }
}
