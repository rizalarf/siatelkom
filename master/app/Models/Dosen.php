<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = "dosens";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['dosNip', 'dosNama', 'dosEmail', 'dosKontak'];

    public function Kelas(){
  		return $this->hasMany(Kelas::class);
  	}
    public function Pasangan(){
  		return $this->hasMany(Pasangan::class);
  	}
    public function Kaprodi(){
      return $this->hasMany(Kaprodi::class);
    }
    public function Pengampu(){
      return $this->hasMany(Pengampu::class);
    }
    public function Judul(){
      return $this->hasMany(Judul::class);
    }
}
