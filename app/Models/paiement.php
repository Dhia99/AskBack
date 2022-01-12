<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paiement extends Model
{
    use HasFactory;
    protected $fillable = ['reste','paye','fournisseur','reffact','date_reglement','date_echenace','id_facture'];

}
