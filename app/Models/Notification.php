<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable =['echancefactachat','echancefactvente','produitfinis'];
    use HasFactory;

}
