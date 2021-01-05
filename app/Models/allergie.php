<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class allergie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom','id'
    ];

    public function patient()
    {
       return $this->hasMany('App\Models\Patient');
    }
  
}
