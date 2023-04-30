<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class dboperations extends Controller
{
    public function register(Request $req){
        $user = new User();

        if( $req->input('sifre') == $req->input('sifret') )
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
            return redirect()->back()->withErrors(['error' => 'Şifreler eşleşmiyor']);
        }
        
    }

    function accessControl(Request $request) {
        $validatedData = $request->validate([
            'e_posta' => 'required',
            'sifre' => 'required',
        ]);

        $user = DB::table('Users')->where('email', $validatedData['e_posta'])->first();
        session('UserPass=>sifre');
        if (!$user) {
            return redirect()->back()->with('error', 'Kullanıcı adı veya şifre yanlış.');
        }

        if (Hash::check($validatedData['sifre'], $user->password)) {
            session(['e_posta' => $user->email, 'sifre' => $user->password, 'adi' => $user->first_name, 'soyadi' => $user->last_name,'id'=>$user->id]);
           

            return view('home');
        } 
        else {

            return redirect()->back()->with('error', 'Kullanıcı adı veya şifre yanlış.');
        }
    }

    public function logOut()
    {
        session()->forget('e_posta');
        return redirect('/login');
    }
     

}
