<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermutationRequest;
use App\Models\Iep;
use App\Models\Dren;
use App\Models\Apply;
use Illuminate\Http\Request;
use App\Models\CustomRequest;
use App\Models\Etablissement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PostulPermutation;

class PermutationController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permutations=CustomRequest::with('user')->get();

        return view('users.permutations.index', compact('permutations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drens=Dren::orderBy('name')->get();
        $schools=Etablissement::orderBy('name')->get();
        return view('users.permutations.create', compact('drens'));
    }

    public function applyFor(Request $request)
    {

        $permutationId=$request->permutationId;
        $customRequest=CustomRequest::where('id', $permutationId)->first();
        //dd($customRequest);
        $user=CustomRequest::find($permutationId)->user;
        $sdren=DB::table('drens')->where('id', $request->sdren)->first()->name;
        $siep=DB::table('ieps')->where('id', $request->siep)->first()->name;
        //dd($siep);
        if($customRequest->sdren!=$sdren){
            return redirect()->back()->with("error","Votre DREN n'est pas celle souhaitée  par le demandeur");
        }else{
            if($customRequest->siep!=$siep){
                return redirect()->back()->with("error","Votre IEP n'est pas celle souhaitée  par le demandeur");
            }else{
                $apply=new Apply();
                $apply->odren=$sdren;
                $apply->oiep=$siep;
                $apply->sdren=$request->odren;
                $apply->siep=$request->oiep;
                $apply->oschool=$request->sschool;
                $apply->sschool=$request->oschool;
                $apply->phone=$request->phone;
                $apply->email=$request->email;
                $apply->user_id=Auth::user()->id;
                $apply->customrequest_id=$permutationId;
                //dd($apply);
                $apply->save();

                //dd($apply);
                $user->notify(new PostulPermutation($apply, Auth::user()));
            }
        }

        return redirect()->route('profile')->with("success", "Vous avez postulé à cette demande avec succès!");
    }

    public function postuler(Request $request, $id)
    {
            $drens=Dren::all();
            $ieps=Iep::all();
            $response=CustomRequest::where('id', $request->id)->first();
            //dd($response);
            return view('users.apply.postuler', compact('response', 'drens', 'ieps'));
    }


    public function detailApply()
    {
        return view('users.apply.postuler');
    }

    /**
     * Get locality's school.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inspections($id)
    {
        // Retour des IEP pour la DRENsélectionnée
        return Iep::whereDrenId($id)->get();
    }
    /**
     * Get locality's school.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ecoles($id)
    {
        // Retour des ecoles pour la IEpsélectionnée
        return Etablissement::whereIepId($id)->get();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermutationRequest $request)
    {
        if(Auth::user()->state==0){
            return redirect()->back()->with("info","veuillez completer votre profil pour pouvoir réaliser cette opération");
        }else{
            $odren=DB::table('drens')->where('id', $request->odren)->first()->name;
            $oiep=DB::table('ieps')->where('id', $request->oiep)->first()->name;
            $sdren=DB::table('drens')->where('id', $request->sdren)->first()->name;
            $siep=DB::table('ieps')->where('id', $request->siep)->first()->name;

            $data=$request->all();
                if($odren==$sdren){
                    return redirect()->back()->with("error","la DREN d'origine doit être différente de celle souhaitée!");
                }else{
                    if($oiep==$siep){
                        return redirect()->back()->with("error","la IEP d'origine doit être différente de celle souhaitée!");
                    }else{
                        $data['odren']=$odren;
                        $data['oiep']=$oiep;
                        $data['sdren']=$sdren;
                        $data['siep']=$siep;
                        $data['user_id']=Auth::user()->id;
                        //dd($data);
                        CustomRequest::create($data);
                    }
                }

            return redirect()->route('avis.index')->with("success","Demande effectuée avec succès!");
        }
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
        $permutation=CustomRequest::find($id);
        //dd($permutation);
        $drens=Dren::all();
        $ieps=Iep::all();
        $etablissements=Etablissement::all();
        return view('users.permutations.edit', compact('permutation', 'drens','ieps','etablissements'));
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
        $data=$request->all();
        $permutation=CustomRequest::find($id);
        $odren=DB::table('drens')->where('id', $request->odren)->first()->name;
        $oiep=DB::table('ieps')->where('id', $request->oiep)->first()->name;
        $sdren=DB::table('drens')->where('id', $request->sdren)->first()->name;
        $siep=DB::table('ieps')->where('id', $request->siep)->first()->name;

        $data=$request->all();
            if($odren==$sdren){
                return redirect()->back()->with("error","la DREN d'origine doit être différente de celle souhaitée!");
            }else{
                if($oiep==$siep){
                    return redirect()->back()->with("error","la IEP d'origine doit être différente de celle souhaitée!");
                }else{
                    $data['odren']=$odren;
                    $data['oiep']=$oiep;
                    $data['sdren']=$sdren;
                    $data['siep']=$siep;
                    $data['user_id']=Auth::user()->id;
                   // dd($data);
                    $permutation->update($data);
                }
            }
        return redirect()->route('avis.index')->with("success","Modification de la demande effectuée avec succès!");
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

        return redirect()->back()
        ->with('success','permutation supprimée avec succès!');
    }

}
