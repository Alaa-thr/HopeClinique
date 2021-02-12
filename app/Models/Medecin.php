<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
  //  protected $primaryKey = 'user_id';
    protected $fillable = [
      'id','user_id ','nom','prenom','specialite','gender','avater'];

      public function blog()
      {
        return $this->hasMany('App\Models\Blog');
      }

      public function prescription()
      {
        return $this->hasMany('App\Models\Prescription');
      }
      public function patient()
      {
        return $this->hasMany('App\Models\Patient');
      }
      public function rdv()
      {
        return $this->hasMany('App\Models\Rdv');
      }
      public function lettre_orientation()
      {
        return $this->hasMany('App\Models\Lettre_Orientation');
      }
}
