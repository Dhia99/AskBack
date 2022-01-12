<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;
    protected $fillable =['NOM','CIVILITE','RAISONSOCIALE','EMAIL','ADRESSE','NTELEPHONE','IDENTIFIANT','MATFISCALE'];
    public function produits(){
        return $this->belongsToMany('App\Models\product', 'facturef');
    }
}
