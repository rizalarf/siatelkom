<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
  protected $table = "ruangs";
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $fillable = ['ruangNama', 'ruangJenis'];
}
