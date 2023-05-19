<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    function UserInfo(){
        
        $UserInfo=DB::table('users')->where('user_id','=',session('id'))->get(); 
       
        
        return view('profile',['UserInformation'=> $UserInfo]);

    }

        public function update(Request $request, $id)
    {
        
        DB::table('users')
        ->where('user_id', $id)
        ->update([
            'first_name' => $request->input('name'),
            'last_name' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
        ]);
        session(['e_posta' =>$request->input('email'), 'adi' => $request->input('name'), 'soyadi' => $request->input('lastname'),'id'=>$id]);
    
        return redirect('/user/profile')->with('success', 'Profil bilgileriniz başarıyla güncellendi.');
    }

}
