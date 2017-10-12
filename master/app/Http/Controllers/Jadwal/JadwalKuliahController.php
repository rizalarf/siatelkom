<?php

namespace App\Http\Controllers\Jadwal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JadwalKuliah;
use App\Models\Kurikulum;
use App\Models\ProgramStudi;
use App\Models\Kelas;
use App\Models\Hari;
use App\Models\Jam;
use App\Models\Matakuliah;
use App\Models\Pengampu;
use App\Models\Dosen;
use App\Models\Ruang;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class JadwalKuliahController extends Controller
{
  protected function index()
  {
    $jadwal = DB::table('jadwal_kuliahs')
    ->join('kelas','jadwal_kuliahs.idKelas','=','kelas.id')
    ->join('haris','jadwal_kuliahs.idHari','=','haris.id')
    ->join('jams','jadwal_kuliahs.idJam','=','jams.id')
    ->join('mata_kuliahs','jadwal_kuliahs.idMakul','=','mata_kuliahs.id')
    ->join('pengampus','jadwal_kuliahs.idPengampu','=','pengampus.id')
    ->join('ruangs','jadwal_kuliahs.idRuang','=','ruangs.id')
    ->join('dosens','pengampus.idDosen','=','dosens.id')
    ->select('jadwal_kuliahs.*','kelas.klsNama','haris.hrNama','jams.jmKode','jams.jmMulai','jams.jmSelesai','mata_kuliahs.makulNama','dosens.dosNama','ruangs.ruangNama')
    ->get();
    return view('admin.dashboard.jadwal.jadwal',compact('jadwal'));
  }
}
