<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
  protected $table = "mata_kuliahs";
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $fillable = ['makulKode', 'makulNama', 'idKur', 'makulSemester', 'makulSks', 'makulJam'];

  public function Kurikulum(){
      return $this->belongsTo(Kurikulum::class);
    }
  public function Pengampu(){
      return $this->hasMany(Pengampu::class);
    }
}
