<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class paiementc extends Model
{
    use HasFactory;
    protected $fillable = ['reste','paye','client','reffact','date_reglement','date_echenace','id_facture'];
}
