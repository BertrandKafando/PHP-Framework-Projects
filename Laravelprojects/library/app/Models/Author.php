<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_prenom','sexe','date_naissance','nationalite'
        ];

    protected $table='Authors';  
}
