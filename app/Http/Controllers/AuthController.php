<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth(){

        $authheader = \request()->header('Authorization');
        $keyauth    = substr($authheader,6);

        $plainauth  = base64_encode($keyauth);
        $tokenauth  = explode(':', $plainauth);

        $email      = $tokenauth[0];
        $pass       = $tokenauth[1];

        $data       = (new Customers())->newQuery()
                                       ->where(['email' => $email])
                                       ->get(['id', 'first_name', 'last_name', 'email', 'password'])->first();

        if($data == null){

        }else{

        }

    }
}
