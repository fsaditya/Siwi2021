<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Xendit\Xendit;
use Illuminate\Support\Facades\Auth;
require base_path('vendor/autoload.php');


class XenditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     function __construct () {
       $options['secret_api_key']='xnd_production_UlOYPCqw7NmD9JNJK6RCAUXwmNm8KT23Xrlp7uxTkqGpP93ikIPLU7nWXGY';
       $this->server_domain = 'https://api.xendit.co';
       $this->secret_api_key = $options['secret_api_key'];
     }



     function getBalance () {

        Xendit::setApiKey($this->secret_api_key);

        $external_id = "".Auth::user()->id.".".Auth::user()->npm.".".Auth::user()->email;

        $id = '610110b2909c2f5c6e80b028';
        $getInvoice = \Xendit\Invoice::retrieve($id);
        var_dump($getInvoice['status']);
        // $params = [
        //   'external_id' => $external_id,
        //   'payer_email' => Auth::user()->email,
        //   'description' => 'Pembayaran Toga',
        //   'amount' => 200000
        // ];

        // $createInvoice = \Xendit\Invoice::create($params);

        // // return redirect($createInvoice['invoice_url']);
        // var_dump($createInvoice);
     }
}
