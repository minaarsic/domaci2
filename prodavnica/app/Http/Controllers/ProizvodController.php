<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proizvod;
use App\Http\Resources\ProizvodResource;
use App\Http\Resources\ProizvodCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProizvodController extends Controller
{
    public function store(Request $request){

        $validator= Validator::make($request->all(),[
            'sifra'=>'required|max:8',
            'naziv'=>'required|string|max:255',
            'prodajna_cena'=>'required',
            'kupovna_cena'=>'required',
            'stanje'=>'nullable',
            'vrsta_id'=>'required',
            'napomena'=>'nullable|string',
        ]);

        if($validator->fails())
                 return response()->json($validator->errors());
                 
    
                 $proizvod=Proizvod::create(
                    [ 'sifra'=>$request->sifra,
                    'naziv'=>$request->naziv,
                     'prodajna_cena'=>$request->prodajna_cena,
                    'kupovna_cena'=>$request->kupovna_cena,
                    'stanje'=>$request->stanje,
                    'vrsta_id'=>$request->vrsta_id,
                     'user_id'=>Auth::user()->id,
                    'napomena'=>$request->napomena]
                );
                return response()->json(['Proizvod je ubacen uspesno', new ProizvodResource($proizvod)]);
               
            }
    public function index(){
        $proizvodi=Proizvod::all();
       // return ProizvodResource ::collection($proizvodi);
       return new ProizvodCollection($proizvodi);
    }

    public function show(Proizvod $proizvod){
        //$proizvod=Proizvod::find($id);
        return new ProizvodResource($proizvod);
    }

    public function update(Request $request, Proizvod $proizvod){
$validator = Validator::make($request->all(),[
    'sifra'=>'required|integer|max:8',
    'naziv'=>'required|string|max:255',
    'prodajna_cena'=>'required|integer',
    'kupovna_cena'=>'required|integer',
    'stanje'=>'nullable|integer',
    'vrsta_id'=>'required',
    'napomena'=>'nullable|string'
]);

if($validator->fails())
    return response()->json($validator->errors());
     
     $proizvod->sifra=$request->sifra;
     $proizvod->naziv=$request->naziv;
     $proizvod->prodajna_cena=$request->prodajna_cena;
     $proizvod->kupovna_cena=$request->kupovna_cena;
     $proizvod->stanje=$request->stanje;
     $proizvod->vrsta_id=$request->vrsta_id;
     $proizvod->napomena=$request->napomena;

     $proizvod->save();
return response()->json(['Proizvod izmenjen uspesno', new ProizvodResource($proizvod)]);
    }

public function destroy(Proizvod $proizvod){
    $proizvod->delete();
    return response()->json('Proizvod obrisan uspesno ');
}

}
