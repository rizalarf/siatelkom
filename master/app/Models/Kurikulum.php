<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
  protected $table = "kurikulums";
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $fillable = ['kurKode', 'kurNama', 'idProdi', 'kurTahun', 'kurSk'];

  public function ProgramStudi(){
    return $this->belongsTo(ProgramStudi::class);
  }
  public function Makul(){
    return $this->belongsTo(Matakuliah::class);
  }
}
