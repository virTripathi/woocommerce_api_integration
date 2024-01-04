<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cookie;

trait HttpResponses{
    private function success($data = [], string $message = 'OK', int $code = 200, Cookie $cookie = null) {
        $response =  response()->json(['data'=>$data,'message'=>$message],$code);
        if($cookie) {
            $response =  $response->withCookie($cookie);
        }
        return $response;
    }

    private function error($data = [], string $message='Server Error', int $code=500, Cookie $cookie = null){
       
       $response = response()->json(['data'=>$data,'message'=>$message],$code);
        if($cookie) {
            $response =  $response->withCookie($cookie);
        }
        return $response;
    }
}