<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
  protected $table = "kelas";
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $fillable = ['klsNama', 'idDosen'];

  public function Dosen(){
    return $this->belongsTo(Dosen::class);
  }
}
