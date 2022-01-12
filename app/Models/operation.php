<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class operation extends Model
{
    public $timestamps = false;
    protected $fillable =['mode','typep','montant','categorie','datereg','note'];
}
