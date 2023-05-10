<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getStockNews()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://mboum-finance.p.rapidapi.com/ne/news',  [
            'headers' => [
                'X-RapidAPI-Host' => 'mboum-finance.p.rapidapi.com',
                'X-RapidAPI-Key' => '84eed48f13mshb2f2672ec477740p13a944jsncfa8f8307ba4',
            ],
        ]);
        
        #echo $response->getBody();
        $news = json_decode($response->getBody());
        return view('news', compact('news'));

    }
}
