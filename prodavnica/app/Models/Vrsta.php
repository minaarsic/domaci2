<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vrsta extends Model
{
    use HasFactory;
    protected $fillable=[
     'naziv',
     'napomena'
 ];  
    public function proizvodi()
    {
       return $this->hasMany(Proizvod::class); ##jedna vrsta moze imati vise proizvoda

    }
}
