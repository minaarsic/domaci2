<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\UserProizvodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AutentikacijaController;
use App\Http\Controllers\VrstaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/proizvodi/{id}',[ProizvodTestController::class, 'show']);
//Route::get('/proizvodi',[ProizvodTestController::class, 'index']);

Route::get('/users',[UserController::class, 'index']); //vraca sve prodavce
Route::get('/users/{id}',[UserController::class, 'show']);//vraca prodavce sa id
//Route::resource('proizvod',ProizvodController::class);//lista prizvode, ako stavim id onda pr sa tim idem
Route::get('users/{id}/proizvodi', [UserProizvodController::class, 'index'])->name('users.proizvodi.index');//lista proizvode koje je kreirao prodavac sa zadatim idem

Route::post('/registracija', [AutentikacijaController::class, 'registracija']);
Route::post('/prijava', [AutentikacijaController::class, 'prijava']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    
    Route::get('/profile',function(Request $request){
        return auth()->user();
    });
    Route::resource('vrsta',VrstaController::class)->only(['update', 'store', 'destroy']);
    Route::resource('proizvod',ProizvodController::class)->only(['update', 'store', 'destroy']);
    Route::post('/odjavljivanje', [AutentikacijaController::class, 'odjavljivanje']);
});
Route::resource('proizvod',ProizvodController::class)->only(['index']);
