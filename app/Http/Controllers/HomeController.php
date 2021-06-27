<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $postFields;
    public $api_key;
    public $api_secret;
    public $paymentRequestUrl;
    public $headers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
       $this->postFields =  array(
        "item_name"    =>'Commande n°'.rand(100,1000000),
        "item_price"   => 1000,
        "currency"     => "xof",
        "ref_command"  =>  'Commande n°'.rand(100,1000000),
        "command_name" =>  'Commande n°'.rand(100,1000000),
        "env"          =>  "test",
        "success_url"  =>  "",
        "ipn_url"		   =>  "https://domaine.com/ipn",
        "cancel_url"   =>  "",
        "custom_field" =>   ""
    );
$this->paymentRequestUrl = "https://paytech.sn/api/payment/request-payment";
// $this->headers = array(
//         'Accept'=> "application/json",
//         "Content-Type"=> "application/json",
//         'API_KEY'=>"9b81373470ecf81379821bb478a970cf4dea10a12ed45d9487ab0770f9de2c9b",
//         'API_SECRET'=>"28642af4d4d677b77e23084693993e984736b36c4c58c37dd65a75a02e1988fa"
//         );

//     }


}


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function send(Request $request)
    {
        $this->postFields['item_price'] =$request->item_price;
        $postFields =http_build_query($this->postFields);
        $opts =  array('http' =>
        array(
          'method'  => 'POST',
          'header'  =>
          "Accept: application/json\r\n".
          "Content-Type: application/x-www-form-urlencoded\r\n".
          "API_KEY:9b81373470ecf81379821bb478a970cf4dea10a12ed45d9487ab0770f9de2c9b\r\n".
          "API_SECRET:28642af4d4d677b77e23084693993e984736b36c4c58c37dd65a75a02e1988fa\r\n",
          'content' =>$postFields,
          'timeout' => 60
        )
        );
      $context  = stream_context_create($opts);
      $result = file_get_contents($this->paymentRequestUrl, true, $context);

        return $result;

    }

}
