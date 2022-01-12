<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    public $timestamps = false;
    protected $fillable =['name','type','raisonsociale','matfiscale','civilite','email','adress','ntelephone','reference'];
    public function produits(){
        return $this->belongsToMany('App\Models\product', 'facture');
    }
}
