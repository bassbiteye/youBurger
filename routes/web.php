<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Symfony\Component\Console\Input\Input;

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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/send', [HomeController::class,'send']);
Route::post('/my-ipn', function () {
    $type_event = Input::get('type_event');
    $custom_field = json_decode(Input::get('custom_field'), true);
    $ref_command = Input::get('ref_command');
    $item_name = Input::get('item_name');
    $item_price = Input::get('item_price');
    $devise = Input::get('devise');
    $command_name = Input::get('command_name');
    $env = Input::get('env');
    $token = Input::get('token');
    $api_key_sha256 = Input::get('api_key_sha256');
    $api_secret_sha256 = Input::get('api_secret_sha256');

    $my_api_key = env('API_KEY');
    $my_api_secret = env('API_SECRET');

    if(hash('sha256', $my_api_secret) === $api_secret_sha256 && hash('sha256', $my_api_key) === $api_key_sha256)
    {
        //from PayTech
    }
    else{
        //not from PayTech
    }
});
