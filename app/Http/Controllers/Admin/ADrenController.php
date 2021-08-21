<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dren;
use App\Imports\DrenImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class ADrenController extends Controller
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
        $drens=Dren::orderBy('name', 'asc')->paginate(15);
        return view('admin.dren.index', compact('drens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dren.create');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelDren(Request $request) 
    {
        Excel::import(new DrenImport,$request->import_file);

        Session::put('success', 'Your file is imported successfully in database.');
           
        return redirect()->route('admin-drens.index');
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
            'name' => 'required|string'
        ]);
        Dren::create($data);
        
        return redirect()->route('admin-drens.index')->with('success', 'Enregistrement effectué avec succès!');
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
        $dren=Dren::find($id);
        
        return view('admin.dren.edit', compact('dren'));
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
        $dren=Dren::find($id);
        $this->validate($request,[
            'name' =>'required|string'
        ]);
        $dren->update(['name' => $request->name]);

        return redirect()->route('admin-drens.index')->with('success', 'Modification effectuée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dren=Dren::find($id);
       
        $dren->delete();

        return redirect()->back()
        ->with('success','DREN supprimée avec succès!');
    }
}
