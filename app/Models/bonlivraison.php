<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bonlivraison extends Model
{
    use HasFactory;
    protected $fillable = ['id_client','date_echeance', 'quantite_entre','Ref_Facture','Etat','Montant_TVA','Montant_TTC','Total_HT','Nom_client','note','Timbre_fiscale','Libelle','date_creation'];
}
