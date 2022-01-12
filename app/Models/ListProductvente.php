<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListProductvente extends Model
{
    protected $fillable = ['id_product','quantite','Libelle','facture_id'];
    use HasFactory;
}
