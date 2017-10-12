<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasangan extends Model
{
  protected $table = "pasangans";
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $fillable = ['idMahasiswa', 'idDosen', 'idPemb', 'idPerus'];

  public function Mahasiswa(){
    return $this->belongsTo(Mahasiswa::class);
  }
  public function Dosen(){
    return $this->belongsTo(Dosen::class);
  }
  public function PembLap(){
    return $this->belongsTo(PembLap::class);
  }
  public function Perusahaan(){
    return $this->belongsTo(Perusahaan::class);
  }
}
