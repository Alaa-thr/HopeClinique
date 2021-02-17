<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;

    protected $fillable = [
      'id','medecin_id','patient_id','deleted','deletedP','deletedA','prenom_medecin','date','heure_debut','heure_fin',
      'motif','nom_medecin','prenom_medecin'
    ];
    public function patient()
    {
          return $this->belongsTo('App\Models\Patient');
    }
    public function medecin()
    {
            return $this->belongsTo('App\Models\Medecin');
    }

}
