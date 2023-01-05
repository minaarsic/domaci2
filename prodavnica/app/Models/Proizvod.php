<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
    use HasFactory;
    protected $guarded=['id'];//onemogucila sam da korisnik moze sam da unese id proizvoda
    protected $fillable=['sifra', 'naziv','prodajna_cena','kupovna_cena', 'stanje'];  

    public function vrsta()
    {
       return $this->belongsTo(Vrsta::class); ##proizvod moze pripadati samo jednoj vrsti proizvoda

    }
    public function prodavac()
    {
       return $this->belongsTo(User::class,'user_id'); ##proizvod moze pripadati samo jednom korisniku

    }
}
