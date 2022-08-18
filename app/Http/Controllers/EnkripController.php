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

        $saveEnkrip = "eyJpdiI6InhFRWcyZ29FbGNjckVGT1l3TzFKMHc9PSIsInZhbHVlIjoiWWxzVC9Sb1dBcGp3OCtteEFtdllmdz09IiwibWFjIjoiODhlODU3MjEzMDYzNGYyM2NiZjZiMjE5OGZmN2ZhY2UyM2VhOTE5N2Y5YzE1YzQ3ZDc0OTRhN2Q0MzM4NDU4MCIsInRhZyI6IiJ9";

        try {
            $decrypted = Crypt::decrypt($saveEnkrip);
        } catch (DecryptException $e) {
            return $e->getMessage();
        }
        
        return $decrypted;
        
        
        
    }
    

    //
}
