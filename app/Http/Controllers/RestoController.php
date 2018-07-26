<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use App\User;

class RestoController extends Controller
{
  private function login()
  {
    $guzzle = new Client();
    $response = $guzzle->post('https://eatzee-bitbucket.herokuapp.com/oauth/token', [
      'form_params' => [
        'grant_type' => 'client_credentials',
        'client_id' => '1',
        'client_secret' => 'KsxYToTwtxBw6zmVKwcsHeTuZ8ba7xlyPxr0lCF3',
        'scope' => '*',
      ],
      'http_errors' => false // add this to return errors in json
    ]);

    $access_token = json_decode((string) $response->getBody(), true)['access_token'];
    Storage::disk('public')->put('access_token.txt', $access_token);
    // Storage::put('access_token', $access_token, 'public');
  }

  private function ceklogin($response)
  {
    return $response->getStatusCode() == 401;
  }

  public function index(){
    $this->login();
    $contents = Storage::disk('public')->get('access_token.txt');
    $token = $contents;
    $client = new Client(['base_uri' => 'https://eatzee-bitbucket.herokuapp.com/api/']);
    $headers = [
        'Authorization' => 'Bearer ' . $token,
        'Accept'        => 'application/json',
    ];

    // $response = $client->request('GET', 'resto', [
    //     'headers' => $headers
    // ]);
    //
    // if ($this->ceklogin($response)) {
    //   $this->login();
    //   $contents = Storage::disk('public')->get('access_token.txt');
    //   $token = $contents;
    // }

    $api_resto = $client->request('GET', 'resto', [
        'headers' => $headers
    ])->getBody();

    $response_resto = json_decode($api_resto)->resto[0];

    // $client = new Client();
    // $api_resto = $client->get('https://eatzee-bitbucket.herokuapp.com/api/resto')->getBody();
    // $response_resto = json_decode($api_resto)->resto[0];

    $api_feed = $client->request('GET', 'feeds', [
        'headers' => $headers
    ])->getBody();

    $response_feed = json_decode($api_feed)->feeds;

    // $api_feed = $client->get('https://eatzee-bitbucket.herokuapp.com/api/feeds')->getBody();
    // $response_feed = json_decode($api_feed)->feeds;

    // $api_product = $client->request('GET', 'products', [
    //     'headers' => $headers
    // ])->getBody();
    //
    // $response_product = json_decode($api_product)->products;

    // $api_product = $client->get('https://eatzee-bitbucket.herokuapp.com/api/products')->getBody();
    // $response_product = json_decode($api_product)->products;

    $api_product = $client->request('GET', 'listing/product', [
        'headers' => $headers
    ])->getBody();

    $response_product = json_decode($api_product)->productListing;

    // $api_product = $client->get('https://eatzee-bitbucket.herokuapp.com/api/listing/product')->getBody();
    // $response_product = json_decode($api_product)->productListing;

    // $user = User::all();

    // return $response_resto->resto_name;

    return view('resto.index', compact('response_resto', 'response_feed' , 'response_product'));
  }

}
