<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilReview extends Model
{
    protected $table = "hasil_reviews";
    protected $primaryKey = 'id';
    public $timestamps = false;
}
