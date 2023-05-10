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
}

