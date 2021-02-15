<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom','id','avatar'
    ];

    public function medecin()
    {
       return $this->hasMany('App\Models\Medecin');
    }
}
