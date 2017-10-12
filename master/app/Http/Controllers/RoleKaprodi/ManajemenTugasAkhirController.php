<?php

namespace App\Http\Controllers\RoleKaprodi;

use Illuminate\Http\Request;

class ManajemenTugasAkhirController extends Controller
{
  public function index()
  {
    return view('kaprodi.manajementugasakhir.manjtugasakhir');
  }
}
