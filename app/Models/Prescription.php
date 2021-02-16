<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;



    protected $fillable = [
      'id','medecin_id','patient_id','date','nom_medecin','prenom_medecin','deleted'  ];


      public function ligne_prescripton()
        {
            return $this->hasMany('App\Models\Ligne_Prescripton');
        }
      public function patient()
        {
            return $this->belongsTo('App\Models\Patient');
        }
        public function medecin()
          {
              return $this->belongsTo('App\Models\Medecin');
          }
}
