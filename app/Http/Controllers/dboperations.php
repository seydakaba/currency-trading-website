<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class dboperations extends Controller
{
    public function register(Request $req){
        $user = new User();

        if( $req->input('sifre') == $req->input('sifre') )
        {
            $user->first_name = $req->input('adi');
            $user->last_name = $req->input('soyadi');
            $user->email = $req->input('e_posta');  
            $user->password = bcrypt($req->sifre);
            $user->phone_number = $req->input('telefon'); 

            $user->save();
            return view('login');
        }
        else{
            return back()->with('error', 'Şifreler eşleşmiyor.');
        }
        
    }

}
