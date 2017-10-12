<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
  protected $table = "haris";
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $fillable = ['hrNama'];
}
