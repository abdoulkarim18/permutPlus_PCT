<?php

namespace App\Http\Controllers\Admin;

use App\Models\Iep;
use App\Imports\IepImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Models\Dren;

class AIepController extends Controller
{
    public function __construct()
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
        $ieps=Iep::with('dren')->orderBy('name','asc')->paginate(20);
        //dd($ieps);
        return view('admin.iep.index', compact('ieps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drens=Dren::all();
        return view('admin.iep.create', compact('drens'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelIep(Request $request) 
    {
        Excel::import(new IepImport,$request->import_file);

        Session::put('success', 'Your file is imported successfully in database.');
           
        return redirect()->route('admin-ieps.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->validate($request, [
            'name' =>'required|unique:ieps',
            'dren_id' => 'required'
        ]);
        
        Iep::create($data);

        return redirect()->route('admin-ieps.index')->with('success', 'Enregistrement effectué avec succès!');
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
        $iep=Iep::find($id);
        
        $drens=Dren::all();
        return view('admin.iep.edit', compact('iep','drens'));
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
        //dd($request->all());
        $iep=Iep::find($id);
        $this->validate($request,[
            'name' =>'required|string',
            'dren_id' => 'required'
        ]);
        $iep->update([
            'name' => $request->name,
            'dren_id' => $request->dren_id
        ]);

        return redirect()->route('admin-ieps.index')->with('success', 'Modification effectuée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iep=Iep::find($id);

        $iep->delete();

        return redirect()->back()
        ->with('success','IEP supprimée avec succès!');
    }
}
