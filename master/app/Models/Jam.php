<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
  protected $table = "jams";
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $fillable = ['jmKode', 'jmMulai', 'jmSelesai', 'jmRange'];
}
