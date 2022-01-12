<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $timestamps = false;
    protected $fillable =['name','category','marque','type','typep','typetaxe','pricev','priceht','pricettc','refconst','refint','TVA','Enstock','desc'];
    public function getclients(){
       return $this->belongsToMany('App\Models\client', 'facture');
    }
   // public function getinv(){
      //  return $this->belongsToMany('App\Models\inventaire');
   // }
}
