<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne_Prescripton extends Model
{
    use HasFactory;

    protected $fillable = [
      'id','prescription_id','medicament','dose','moment_prises','duree_traitement'
    ];
}
