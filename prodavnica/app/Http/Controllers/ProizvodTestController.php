<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proizvod;
use App\Http\Resources\ProizvodResource;


class ProizvodTestController extends Controller
{
  

    public function index(){
        $proizvodi=Proizvod::all();
        return $proizvodi;
    }
    public function show(Proizvod $proizvod){
        //$proizvod=Proizvod::find($id);
        return new ProizvodResource($proizvod);
    }
}
