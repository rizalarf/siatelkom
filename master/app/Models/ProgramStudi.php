<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
  protected $table = "program_studis";
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $fillable = ['prodiKode', 'prodiNama'];

  public function Kurikulum(){
    return $this->hasMany(Kurikulum::class);
  }
  public function Kaprodi(){
    return $this->hasMany(Kaprodi::class);
  }
}
