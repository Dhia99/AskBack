<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commandeachat extends Model
{
    use HasFactory;
    protected $fillable = [ 'id_fournisseur','date_echeance', 'Ref_Facture','Etat','Montant_TVA','Montant_TTC','Total_HT','Nom_fournisseur','note','Timbre_fiscale','date_creation'];
}
