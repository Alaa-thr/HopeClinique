<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','title','medecin_id','description','avatr','nom_medecin','nom_medecin','prenom_medecin'
    ];

    public function medecin()
    {
       return $this->belongsTo('App\Models\Medecin');
    }

}
