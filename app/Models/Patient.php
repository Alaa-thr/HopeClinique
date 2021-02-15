<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;


    protected $primaryKey = 'user_id';
    protected $fillable = [
      'id ','user_id','prenom','nom','Num_Secrurite_Social','date_naissance',
      'maladie_chronique','age','allergie','antecedent','commentaire','ville'
  ];



  public function image()
  {
      return $this->hasMany('App\Models\Image');
  }
  public function rdv()
  {
    return $this->hasMany('App\Models\Rdv');
  }
  public function lettre_orientation()
  {
    return $this->hasMany('App\Models\Lettre_Orientation');
  }
  public function prescription()
  {
    return $this->hasMany('App\Models\Prescription');
  }


}
