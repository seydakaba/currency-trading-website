<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreditCard_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::find(session('id'));
        $account = DB::table('accounts')->where('user_id','=',session('id'))->first();

        $creditCard = new CreditCard;
        $creditCard->UserID = $user->id;
        $creditCard->AccountID = $account->id;
        $creditCard->CardholderName = $request->CardholderName;
        $creditCard->CardNumber = $request->CardNumber;
        $creditCard->ExpirationDate = $request->ExpirationDate;
        $creditCard->SecurityCode = $request->SecurityCode;
        $creditCard->save();

        return back();
   
    }

    /**
     * Display the specified resource.
     */
    public function show(odel $odel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(odel $odel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, odel $odel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(odel $odel)
    {
        //
    }
}
