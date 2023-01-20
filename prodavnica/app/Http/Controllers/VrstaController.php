<?php

namespace App\Http\Controllers;

use App\Models\Vrsta;
use Illuminate\Http\Request;
use App\Http\Resources\VrstaResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class VrstaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
           
            'naziv'=>'required',
            'napomena'=>'required',
        ]);

        if($validator->fails())
                 return response()->json($validator->errors());
                 
    
                 $vrsta=Vrsta::create(
                    [
                    'naziv'=>$request->naziv,
                    'napomena'=>$request->napomena]
                );
                return response()->json(['Vrsta je ubacen uspesno', new VrstaResource($vrsta)]);
               
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vrsta  $vrsta
     * @return \Illuminate\Http\Response
     */
    public function show(Vrsta $vrsta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vrsta  $vrsta
     * @return \Illuminate\Http\Response
     */
    public function edit(Vrsta $vrsta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vrsta  $vrsta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vrsta $vrsta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vrsta  $vrsta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vrsta $vrsta)
    {
        //
    }
}
