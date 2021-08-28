<?php

namespace App\Http\Controllers\Admin;

use App\Models\Iep;
use App\Models\Locality;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Http\Controllers\Controller;
use App\Imports\EtablissementImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use MercurySeries\Flashy\Flashy;

class ASchoolController extends Controller
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
        $schools=Etablissement::with('iep')->orderBy('created_at','desc')->paginate(15);
        Flashy::info('Bienvenus sur la liste des Etablissements.');
        return view('admin.school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ieps=Iep::all();

        return view('admin.school.create', compact('ieps'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelSchool(Request $request)
    {
        Excel::import(new EtablissementImport,$request->import_file);

        Session::put('success', 'Your file is imported successfully in database.');

        return redirect()->route('admin-school.index');
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
            'name' => 'required|string|unique:etablissements',
            'iep_id' => 'required'
        ]);
        $store = Etablissement::create($data);

        Flashy::primary(sprintf('Etablissement "%s" enregistré avec succès!', $store->name));
        return redirect()->route('admin-school.index');
        // ->with('success', 'Enregistrement effectué avec succès!')
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
        $school=Etablissement::find($id);

        // $localities=Locality::all();
        $ieps=Iep::all();

        return view('admin.school.edit', compact('school', 'ieps'));
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
        $school=Etablissement::find($id);

        $data=$this->validate($request, [
            'name' => 'required|string|',
            'iep_id' => 'required',
        ]);

        $school->update($data);
        Flashy::success(sprintf('Etablissement "%s" modifié avec succès!', $school->name));

        return redirect()->route('admin-school.index');
        // ->with('success', 'Modification effectuée avec succès!')

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school=Etablissement::find($id);
        $school->delete();

        Flashy::success(sprintf('Etablissement "%s" supprimé avec succès!', $school->name));
        return redirect()->back();
        // ->with('success','Ecole supprimée avec succès!');
    }
}
