<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


    protected $fillable = [
      'id','patient_id','type','image'];

      public function patient()
        {
            return $this->belongsTo('App\Models\Patient');
        }

}
