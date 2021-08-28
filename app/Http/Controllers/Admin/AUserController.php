<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class AUserController extends Controller
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
        $users=User::orderBy('nom','asc')->paginate(40);
        //dd($users);
        Flashy::info('Bienvenus sur la liste des Utilisateurs.');
        return view('admin.users.index', compact('users'));
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
        $user=User::find($id);
        return view('admin.users.edit', compact('user'));
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

        $user=User::find($id);
       if(Auth::user()->id !=$request->userId){
            if($request->has('isAdmin')){
                //dd($user);
                $user->update(['isAdmin' =>1]);
                Flashy::success(sprintf('Privilège accordée à "%s"!',$user->nom));
                return redirect()->route('admin-users.index');
            }else{
                $user->update(['isAdmin' =>0]);
                Flashy::primary(sprintf('Privilège rétirée à "%s"!',$user->nom));
                return redirect()->route('admin-users.index');
            }

       }else{
            Flashy::info('Cette opération ne peut-être effectuée!');
            return redirect()->back();
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);

        $user->delete();

        Flashy::error(sprintf('Utilisateur "%s" supprimé avec succès!',$user->nom));
        return redirect()->back();
    }
}
