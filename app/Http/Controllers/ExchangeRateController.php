<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\ExchangeRate;
use Illuminate\Support\Facades\DB;


class ExchangeRateController extends Controller
{

    public function getExchangeRates()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/latest?symbols=XAU%2C%20USD%2C%20EUR%2C%20GBP%2C%20CHF%2C%20CAD%2C%20JPY%2C%20HKD%2C%20SGD%2C%20AUD&base=TRY",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: 8705hjJd8Ohuv5rF885Ul9lYDbMb4swt"
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
    
        // Parse the JSON response
        $data = json_decode($response, true);
    
        // Loop through each currency and save its exchange rate
        foreach ($data['rates'] as $currency => $rate) {
            $exchangeRate = ExchangeRate::where('currency', $currency)->first();
            if ($exchangeRate) {
                // If the exchange rate already exists, update the existing record
                $exchangeRate->rate = 1 / $rate; 
                $exchangeRate->save();
            } else {
                // If the exchange rate does not exist, create a new record
                $exchangeRate = new ExchangeRate();
                $exchangeRate->currency = $currency;
                $exchangeRate->rate = 1 / $rate; 
                $exchangeRate->save();
            }
        }
        
        $exchangeRates = ExchangeRate::all();
        return view('exchange-rates', compact('exchangeRates'));
    }

    
    public function convertCurrency(Request $request)
    {
        // Get the user input
        $amount = $request->input('amount');
        $fromCurrency = $request->input('to_currency');
        $toCurrency = $request->input('from_currency');

        // Get the exchange rates
        $exchangeRates = ExchangeRate::all();
        

        // Find the exchange rate for the from currency
        $fromExchangeRate = $exchangeRates->where('currency', $fromCurrency)->pluck('rate')->first();

        // Find the exchange rate for the to currency
        $toExchangeRate = $exchangeRates->where('currency', $toCurrency)->pluck('rate')->first();

        // Calculate the converted amount
        $convertedAmount = $amount * ($toExchangeRate / $fromExchangeRate);

        // Format the result
        $result = number_format($convertedAmount, 2);

        // Return the result to the view
        return view('home', compact('result','exchangeRates'));
    }

    

    public function buyCurrency(Request $request)
    {
        // Get user input
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $userId = auth()->user()->id;

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

        return back()->with('success', 'Currency bought successfully.');
    }

}

