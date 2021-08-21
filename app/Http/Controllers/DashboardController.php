<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
  
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function profile()
    {
        if(auth()->user()->isAdmin==1)
        {
            return view('admin.dashboard');
        }

        return view('users.profile');
    }

    public function pass()
    {
        return view('users.update_password');
    }

    public function updatePass(Request $request)
    {
        $verif_user = User::where('id',Auth::user()->id)->first();
        
        if(!Hash::check($request->old_pwd, $verif_user->password)){
            
            return redirect('/password')->with('message',"L'ancien mot de passe est incorrect")->with('success','false');
        }else{
             $updated =  Hash::make($request->new_pwd);
             DB::table('users')->where('id',Auth::user()->id)->update(['password' => $updated]);

            return redirect('profile')->with('message',"Le mot de passe a bien été modifié. ")->with('success','true');
        }
    }
}
