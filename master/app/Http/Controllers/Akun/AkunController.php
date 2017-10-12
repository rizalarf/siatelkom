<?php

namespace App\Http\Controllers\Akun;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use App\Models\Kaprodi;
use App\Models\Dosen;
use App\Models\PembLap;
use App\Models\Mahasiswa;

class AkunController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  protected function indexUser() {
    return view('admin.dashboard.akun.index');
  }
  //dosen
  protected function showAkunDosen() {
    return view('admin.dashboard.akun.akundosen');
  }

  //mahasiswa
  protected function showAkunMahasiswa() {
    return view('admin.dashboard.akun.akunmahasiswa');
  }

  //pemblap
  protected function showAkunPembLap() {
    return view('admin.dashboard.akun.akunpemblap');
  }
}
