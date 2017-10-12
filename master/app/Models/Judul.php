<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Judul extends Model
{
    protected $table = "juduls";
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['idMahasiswa', 'idDosen1', 'idDosen2'];

    public function Mahasiswa(){
      return $this->belongsTo(Mahasiswa::class);
    }
    public function Dosen(){
      return $this->belongsTo(Dosen::class);
    }
}
