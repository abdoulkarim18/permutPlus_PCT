<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Apply;
use Illuminate\Http\Request;
use App\Models\CustomRequest;
use App\Notifications\ConfirmPermut;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class NotifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users.notifications.index');
    }

    public function edit(User $user, CustomRequest $customRequest, DatabaseNotification $notification)
    {
        //dd($customRequest);
        $notification->markAsRead();
        $response=Apply::where('user_id', $user->id)->first();
        //dd($response);
        $apply=DatabaseNotification::where('id', $notification->id)->get()[0];
       // dd($apply);
        return view('users.apply.detail-apply', compact('apply','response'));
    }

    public function messageAccepted(User $user,$id, DatabaseNotification $notification)
    {
       
        $apply=CustomRequest::where('user_id', $user->id)->first();
        //dd($apply);
        $decision=Apply::where('user_id', Auth::user()->id)->first();
       
        $notification->markAsRead();
        return view('users.notifications.detail', compact('apply', 'decision'));
    }



    public function confirmCustomRequest(Request $request)
    {
       // dd($request->all());
        $customRequest=CustomRequest::find($request->customRequestId);
        $apply=Apply::where('user_id', $request->userId)->first();
        //dd($apply);
        $user=User::where('id', $request->userId)->first();

        if($request->decision=='accepted'){
           if($customRequest->isAccepted==0){
            $customRequest->update(['isAccepted' =>1]);
            $apply=$apply->update(['isAccepted' =>1]);
           }else{
            return redirect()->back()->with("error","Vous avez déjà accepté la permutation avec une autre personne");
           }  
        }else{
            //dd(false);
            $apply=$apply->update(['isAccepted' =>2]);
        }

        $apply=Apply::where('user_id', $request->userId)->first();
       
        
        $user->notify(new ConfirmPermut($apply, Auth::user()));
        
        return redirect()->back()->with("success","Votre réponse à la demande a été effectuée avec succès!");

    }

    public function download($userId)
    {
        $response=CustomRequest::where('user_id', Auth::user()->id)->first();
        
        $apply=Apply::where('user_id', $userId)->with('user')->first();
        

        return view('users.apply.imprime', compact('response', 'apply'));
        
    }

    public function createPdf($id)
    {
        $apply=Apply::where('user_id', Auth::user()->id)->with('user')->first();
        
        $customRequest=Apply::find($id)->customrequest;

        $user=CustomRequest::find($customRequest->id)->user;
        
        return view('users.notifications.imprime', compact('apply','customRequest','user'));
    }

}
