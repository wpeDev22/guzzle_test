<?php

namespace App\Http\Controllers;
use App\Http\Resources\country\Country as CountryResource;
use App\Http\Resources\country\CountryCollection;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Country;
class CountryController extends Controller
{
 

    public function index()
    {
        
        $client = new Client([           
            'base_uri' => 'https://restcountries.eu/rest/v2/region/europe',
        ]);
      
        $response= $client->get('https://restcountries.eu/rest/v2/region/europe');

      
        $body= $response->getBody();
        $datas=json_decode($body);       
        foreach($datas as $data){
            Country::create([
                'country_name'=> $data->name                                 
            ]);
        }
       return new CountryCollection(Country::all());    

    }
}

