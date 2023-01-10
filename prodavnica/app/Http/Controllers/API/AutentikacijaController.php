<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AutentikacijaController extends Controller
{
    public function registracija(Request $request)
    {
      $validator=Validator::make($request->all(),[
 //unosimo poatke koji su obaveyni prilikom registracije
 'name'=>'required|string|max:255',
 'email'=>'required|string|max:255|email|unique:users',
'password'=>'required|string|min:7'
    ]);

//da li je korisnik ispunio ogranicenja
if($validator->fails()){
return response()->json($validator->errors());
    }
$user=User::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>Hash::make($request->password)

]); 

$token= $user ->createToken('auth_token')->plainTextToken;

return response()->json(['data'=>$user,'access_token'=>$token, 'token_type'=>'Bearer']);
    }

public function prijava(Request $request){

    if(!Auth::attempt($request->only('email', 'password'))){
    return response()->json([ 'message'=>'Ne postoji korisnik.'],401);
    }

    $user=User::where('email', $request['email'])->firstOrFail();
    $token= $user ->createToken('auth_token')->plainTextToken;

return  response()->json(['message'=>'Zdravo,'.$user->name. '. Dobro dosli!','access_token'=>$token, 'token_type'=>'Bearer']);

}

public function odjavljivanje(){
    auth()->user()->tokens()->delete();
    return[
        'message'=>'Uspesno ste se izlogovali.'
    ];
}
}
