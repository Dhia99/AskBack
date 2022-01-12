<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bondereception extends Model
{
    protected $fillable = ['id_client','id_product','date_echeance', 'quantite_entre','Ref_Facture','Etat','Montant_TVA','Montant_TTC','Total_HT','Nom_client','note','Timbre_fiscale','Libelle','date_creation'];

    use HasFactory;
}
