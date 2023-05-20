<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;


class CurrencyPurchaseController extends Controller
{
    public static function buyCurrency(Request $request)
    {
        // Get user input
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $userId = session('id'); // Kullanıcının session kimliğini al
       
       
        // Get exchange rate for selected currency
        $exchangeRate = ExchangeRate::where('currency', $currency)->first();
    
        // Calculate amount in user's base currency
        $convertedAmount = $amount * $exchangeRate->rate;
    
        // Get user's account in the base currency
        $account = DB::table('accounts')->where('user_id', $userId)->where('currency', 'TRY')->first();
        $neWbalance=$account->balance - $convertedAmount;
        // Check if user has sufficient balance in the account
        if ($account && $account->balance < $convertedAmount) {
            return back()->with('error', 'Insufficient balance.');
        }
   
    // Deduct the amount from the user's account
    if ($account) {
        DB::table('accounts')->where('user_id', $userId)->where('currency', 'TRY')
        ->update(['balance' =>$neWbalance]);
        
    } else {
        return back()->with('error', 'User account not found.');
    }
    
        // Add the transaction to the account's transaction history
        $transaction = new Transaction([
            'account_id' => $account->account_id,
            'type' => 'crncy-exch',
            'amount' => $convertedAmount,
            'currency' => $currency,
            'rate' => $exchangeRate->rate,
            'datetime' => now()
            
        ]);
       
        $transaction->save();
        // Get user's account in the selected currency
        $account = DB::table('accounts')->where('user_id', $userId)->where('currency', $currency)->first();
    
        // If user does not have an account in the selected currency, create one
        if (!$account) {
            
            $account = new Account([
                'user_id' => $userId,
                'balance' => 0,
                'currency' => $currency
            ]);
            $account->save();
        }
        $buyBalance=$account->balance + $amount;
        // Add the converted amount to the user's selected currency account
        DB::table('accounts')->where('user_id', $userId)->where('currency', $currency)
        ->update(['balance' => $buyBalance]);
       
    
        return redirect()->route('currency-purchase-form')->with('success', 'Currency bought successfully.');
    }
    public static function showCurrencyPurchaseForm()
    {
        $accounts = Account::all();
        $exchangeRates = ExchangeRate::all();
        
        return view('purchase', compact('accounts', 'exchangeRates'));
    }
}
