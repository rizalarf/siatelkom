<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Mahasiswa extends Model
{
    protected $table = "mahasiswas";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['mhsNim', 'mhsNama'];

    public function Pasangan(){
  		return $this->hasMany(Pasangan::class);
    }
    public function Judul(){
      return $this->hasMany(Judul::class);
    }
}
