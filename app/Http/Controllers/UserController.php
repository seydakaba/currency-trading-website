<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    function UserInfo(){
        session_start();
        $UserInfo=DB::table('users')->where('id','=',session('id'))->get(); 
       
        
        return view('profile',['UserInformation'=> $UserInfo]);

      


    }

        public function update(Request $request, $id)
    {
        
        $user = User::find($id);
        $user->first_name = $request->input('name');
        $user->last_name = $request->input('lastname');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
       
        
        $user->save();
        


        return redirect('/cikisyap')->with('success', 'Profil bilgileriniz başarıyla güncellendi.');
    }

}
