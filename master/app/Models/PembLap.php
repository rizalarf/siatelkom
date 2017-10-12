<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembLap extends Model
{
    protected $table = "pembimbing_lapangans";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['pembNik', 'pembNama', 'pembEmail', 'idPerus'];

    public function Perusahaan(){
      	return $this->belongsTo(Perusahaan::class);
      }

    public function Pasangan(){
        return $this->hasMany(Pasangan::class);
      }
}
