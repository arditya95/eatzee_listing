<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;

class RestoController extends Controller
{
  public function index(){
    $client = new Client();
    $api_resto = $client->get('https://eatzee-resto.herokuapp.com/api/resto')->getBody();
    $response_resto = json_decode($api_resto)->resto[0];

    $api_feed = $client->get('https://eatzee-resto.herokuapp.com/api/feed')->getBody();
    $response_feed = json_decode($api_feed)->feeds;

    $api_product = $client->get('https://eatzee-resto.herokuapp.com/api/products')->getBody();
    $response_product = json_decode($api_product)->products;

    // $user = User::all();

    // return $response_resto->resto_name;

    return view('resto.index', compact('response_resto', 'response_feed' , 'response_product'));
  }


}
