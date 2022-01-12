<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class devis extends Model
{
    use HasFactory;
    protected $fillable = ['id_client','quantite_entre','Ref_Facture','Montant_TVA','Montant_TTC','Total_HT','Nom_client','note','Timbre_fiscale','Libelle','date_creation'];
}
