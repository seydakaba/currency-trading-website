<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class wallet extends Controller
{
    function WalletInformation(){
        $userId = session('id');
        $balance = DB::table('accounts')->select('balance', 'currency')->where('user_id', $userId)->first();
        return view('wallet', ['balance' => $balance]);
    }
}
