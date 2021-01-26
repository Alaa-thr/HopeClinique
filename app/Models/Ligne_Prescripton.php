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

    public function prescription()
      {
          return $this->belongsTo('App\Models\Prescription');
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
