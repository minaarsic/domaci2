<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProizvodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public static$wrap='proizvod';
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'ID:'=> $this->resource->id,
            'Sifra proizvoda:'=> $this->resource->sifra,
            'Naziv proizvoda:'=> $this->resource->naziv,
            'Vrsta prizvoda:'=> new VrstaResource($this->resource->vrsta),
            'Stanje:'=> $this->resource->stanje,
            'Prodavac:'=> new UserResource($this->resource->prodavac)



        ];
    }
}
