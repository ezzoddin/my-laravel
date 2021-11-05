<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect', function (Request $request) {

    $query = http_build_query([
        'client_id' => 3,
        'redirect_uri' => 'http://localhost:8001/info-bank/callback',
        'response_type' => 'code',
        'scope' => '*',
    ]);

    return redirect('http://localhost:8000/oauth/authorize?' . $query);

})->name('info.bank');


Route::get('info-bank/callback', function (Request $request) {

    if ($request->has('error')) {
        return 'no access';
    }

    $http = new GuzzleHttp\Client;
    $response = $http->post('http://localhost:8000/oauth/token',
        ['form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 3,
            'client_secret' => 'JRCERZnUw5cld8OXnhQLd4kU8wULFjLR15qHdCG7',
            'redirect_uri' => 'http://localhost:8001/info-bank/callback',
            'code' => $request->code,
        ],]);

    $accessToken = json_decode((string)$response->getBody(), true);

    //dd($accessToken );
    dd($accessToken['access_token']);

});


