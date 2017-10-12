<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
  protected $table = "perusahaans";
  protected $primaryKey = 'id';
  public $timestamps = true;
  protected $fillable = ['perusNama', 'perusKontak', 'perusAlamat', 'perusEmail'];

  public function PembLap(){
		return $this->hasMany(PembLap::class);
	}
  public function Pasangan(){
    return $this->hasMany(Pasangan::class);
  }
}
