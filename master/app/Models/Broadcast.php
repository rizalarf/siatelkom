<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    protected $table = "broadcasts";
    protected $primaryKey = 'id';
    public $timestamps = false;
}
