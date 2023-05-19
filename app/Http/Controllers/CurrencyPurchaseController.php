<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;
use App\Models\Account;
use App\Models\Transaction;

class CurrencyPurchaseController extends Controller
{
    public static function buyCurrency(Request $request)
    {
        // Get user input
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $userId = session('user_id'); // Kullanıcının session kimliğini al
    
        // Get exchange rate for selected currency
        $exchangeRate = ExchangeRate::where('currency', $currency)->firstOrFail();
    
        // Calculate amount in user's base currency
        $convertedAmount = $amount / $exchangeRate->rate;
    
        // Get user's account in the base currency
        $account = Account::where('user_id', $userId)->where('currency', 'TRY')->firstOrFail();
    
        // Check if user has sufficient balance in the account
        if ($account->balance < $convertedAmount) {
            return back()->with('error', 'Insufficient balance.');
        }
    
        // Deduct the amount from the user's account
        $account->balance -= $convertedAmount;
        $account->save();
    
        // Add the transaction to the account's transaction history
        $transaction = new Transaction([
            'account_id' => $account->id,
            'type' => 'currency-exchange',
            'amount' => $convertedAmount,
            'currency' => $currency,
            'rate' => $exchangeRate->rate,
            'datetime' => now()
        ]);
        $transaction->save();
    
        // Get user's account in the selected currency
        $account = Account::where('user_id', $userId)->where('currency', $currency)->first();
    
        // If user does not have an account in the selected currency, create one
        if (!$account) {
            $account = new Account([
                'user_id' => $userId,
                'balance' => 0,
                'currency' => $currency
            ]);
            $account->save();
        }
    
        // Add the converted amount to the user's selected currency account
        $account->balance += $amount;
        $account->save();
    
        return redirect()->route('currency-purchase')->with('success', 'Currency bought successfully.');
    }
    public static function showCurrencyPurchaseForm()
    {
        $accounts = Account::all();
        $exchangeRates = ExchangeRate::all();
        
        return view('purchase', compact('accounts', 'exchangeRates'));
    }
}
