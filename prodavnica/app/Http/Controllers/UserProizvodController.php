<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proizvod;

///lista sve proizvode vezane za datog prodavca
class UserProizvodController extends Controller
{
   public function index($user_id)
   {
  $proizvodi= Proizvod::get()->where('user_id', $user_id);
  if (is_null($proizvodi))
  return response()->json('Nije pronadjeno', 404);
  return response()->json($proizvodi);
  
   }
}
