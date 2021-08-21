<?php

namespace App\Http\Controllers\Admin;

use App\Models\Locality;
use Illuminate\Http\Request;
use App\Imports\LocalityImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class ALocalityController extends Controller
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
        $localities=Locality::orderBy('name', 'asc')->paginate(20);

        return view('admin.locality.index', compact('localities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.locality.create');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelLocality(Request $request) 
    {
        Excel::import(new LocalityImport,$request->import_file);

        Session::put('success', 'Your file is imported successfully in database.');
           
        return redirect()->route('admin-localities.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->validate($request,['name' =>'required|string|unique:localities']);
        Locality::create($data);
        return redirect()->route('admin-localities.index')->with('success', 'Enregistrement effectué avec succès!');
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
        $locality=Locality::find($id);

        return view('admin.locality.edit', compact('locality'));
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
        $locality=Locality::find($id);

        $data=$this->validate($request,[
            'name' =>'required|string'
        ]);
        $locality->update($data);

        return redirect()->route('admin-localities.index')->with('success', 'Modification effectuée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locality=Locality::find($id);

        $locality->delete();

        return redirect()->back()
        ->with('success','Localité supprimée avec succès!');
    }
}
