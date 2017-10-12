<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kaprodi extends Model
{
  protected $table = "kaprodis";
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $fillable = ['idDosen', 'kapMulai', 'idProdi'];

  public function Dosen(){
      return $this->belongsTo(Dosen::class);
    }
  public function ProgramStudi(){
      return $this->belongsTo(ProgramStudi::class);
    }
}
