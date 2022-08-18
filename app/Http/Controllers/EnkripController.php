<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EnkripController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function enkrip(Request $request){
        $this->validate($request, [
            'pass' => 'required',
        ]);
        
        return Crypt::encrypt($request->pass);
    }

    public function deskrip(Request $request){
        $this->validate($request, [
            'pass' => 'required',
        ]);

        $saveEnkrip = "eyJpdiI6IkZkUllJNFBqVmx4S0hnUkxZRTRhYUE9PSIsInZhbHVlIjoiVkVtUU5Sc1lxWkhHelNLM29rL3JRZz09IiwibWFjIjoiZGMxODdjNzk2YmZhYTczNmI5N2ZhZjIzZWQ3MzYyZGU1OGUwNzgyMzM5M2IzZmRiNmQyZGUxMmE1NmMyM2YzMyIsInRhZyI6IiJ9";

        try {
            $decrypted = Crypt::decrypt($saveEnkrip);
        } catch (DecryptException $e) {
            //
        }
        
        return $decrypted;
        
        
        
    }
    

    //
}
