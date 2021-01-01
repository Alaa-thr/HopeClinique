<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lettre_Orientation extends Model
{
    use HasFactory;


    protected $fillable = [
      'id','medecin_id','patient_id','date','contenu','nom_medecin','prenom_medecin'];

      public function patient()
        {
            return $this->belongsTo('App\Models\Patient');
        }

}
