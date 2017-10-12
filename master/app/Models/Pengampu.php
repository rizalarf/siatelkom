<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Pengampu extends Model
{
  protected $table = "pengampus";
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $fillable = ['idDosen', 'idMakul'];

  public function Dosen(){
      return $this->belongsTo(Dosen::class);
    }
  public function Matakuliah(){
      return $this->belongsTo(Matakuliah::class);
    }
}
