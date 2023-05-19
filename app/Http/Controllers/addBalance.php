<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class addBalance extends Controller
{
    public function creditCards()
    {
        $userId = session('id');
        $cards = DB::table('credit_cards')->select('CardID', 'CardNumber')->where('UserId', $userId)->get();

        return view('uploadbalance', ['cards' => $cards]);
    }

    public function uploadBalance(Request $request)
    {
        $validatedData = $request->validate([
            'yukleme_miktari' => 'required|numeric|min:1'
        ]);

        $userId = session('id');
        $balance = DB::table('accounts')->where('user_id', $userId)->where('currency', 'TRY')->first();

        $newBalance = $balance->balance + $validatedData['yukleme_miktari'];

        DB::table('accounts')->where('user_id', $userId)->where('currency', 'TRY')->update(['balance' => $newBalance]);

        return view('home')->with('success', 'Bakiye yükleme işlemi başarıyla tamamlandı.');
    }

}
