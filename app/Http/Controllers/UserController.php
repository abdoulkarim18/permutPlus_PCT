<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editUser($id)
    {
        $user=User::find($id);
        return view('users.profile.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user=User::find($id);
        $data=$this->validate($request, [
            'nom' => "required|string",
            'prenoms' => "required|string",
            'contact' => "required",
            'nom_fille'=>"",
            'emploi' => "required|string",
            'email' => "required|string",
            'fonction'=>"required|string",
            'datenaiss' =>"required|string",
        ]);
        $data['state']=1;
        $user->update($data);

        return redirect()->route('profile')->with('info', 'Votre profil a été modifié avec succès!');
    }
}
