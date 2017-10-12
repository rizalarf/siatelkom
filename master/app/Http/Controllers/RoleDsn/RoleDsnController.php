<?php

namespace App\Http\Controllers\RoleDsn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use DB;
use Auth;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Bimbingan;
use App\Models\Judul;
use App\Models\NilaiPembimbing;
use App\Models\NilaiPenguji;
use App\Models\Rekap;
use App\Models\LaporanSidang;
use App\Models\Revisi;

class RoleDsnController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function indexUser() {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $user = DB::table('dosens')
    ->select('dosens.*')
    ->where('id','=',$dosen->id)
    ->get();
    return view('dosen.akun.index', compact('user'));
  }
  // jadwal
  public function indexJadwal()
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
    return view('dosen.jadwal.index',compact('jadwal'));
  }
  public function indexReviewer() {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $review = DB::table('juduls')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('juduls.*','mahasiswas.mhsNama','mahasiswas.mhsNim')
    ->where('juduls.idReviewer1','=',$dosen->id)
    ->orWhere('juduls.idReviewer2','=',$dosen->id)
    ->orWhere('juduls.idReviewer3','=',$dosen->id)
    ->get();
    return view('dosen.tugas_akhir.reviewer.index', compact('review'));
  }
  public function createReviewer($id) {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $judul = Judul::find($id);
    $nmMahasiswa = Mahasiswa::find($judul->idMahasiswa)->mhsNama;
    $mahasiswa = Mahasiswa::find($judul->idMahasiswa)->mhsNim;
    $dosbing1 = Dosen::find($judul->idDosbing1)->dosNama;
    $dosbing2 = Dosen::find($judul->idDosbing2)->dosNama;
    $dosen = Dosen::all();
    return view('dosen.tugas_akhir.reviewer.create', compact('judul','nmMahasiswa','mahasiswa','dosbing1','dosbing2','dosen'));
  }
  public function mainBimbingan() {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();

    $judul = DB::table('juduls')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('juduls.*','mahasiswas.mhsNama','mahasiswas.mhsNim')
    ->where('idDosbing1','=',$dosen->id)
    ->orWhere('idDosbing2','=',$dosen->id)

    ->get();
    return view('dosen.tugas_akhir.bimbingan.main',compact('judul'));
  }
  public function indexBimbingan($id)
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $bimbingan = DB::table('bimbingans')
    ->join('juduls','bimbingans.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('bimbingans.*','mahasiswas.mhsNama','juduls.jdJudul')
    // ->where('bimbingans.idDosen','=',$dosen->id)
    ->where('bimbingans.idJudul','=',$id)
    ->get();
    return view('dosen.tugas_akhir.bimbingan.index',compact('bimbingan'));
  }
  public function editBimbingan($id)
  {
    $data = Bimbingan::find($id);
    $judul = Judul::find($data->idJudul);
    $mahasiswa = Mahasiswa::find($judul->idMahasiswa);
    $mhs = array($mahasiswa);
    return view('dosen.tugas_akhir.bimbingan.edit',compact('data','mahasiswa','mhs','judul'));
  }
  public function updateBimbingan($id)
  {
    $input =Input::all();
    $messages = [
      'bbKomen.required'   => 'Komentar dibutuhkan.',
    ];
    $validator = Validator::make($input, [
      'idJudul' => 'nullable',
      'idDosen' => 'nullable',
      'bbTanggal' => 'nullable',
      'bbMinggu' => 'nullable',
      'bbUraian' => 'nullable',
      'bbKomen' => 'required',
    ], $messages);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    $edit = Bimbingan::find($id);
    $edit->bbKomen =  $input['bbKomen'];
    if (! $edit->save())
      App::abort(500);
    return Redirect::action('RoleDsn\RoleDsnController@indexBimbingan');
  }
  public function indexTugas()
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $tugas = DB::table('surat_tugas')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('dosens as dosens1','juduls.idDosbing1','=','dosens1.id')
    ->join('dosens as dosens2','juduls.idDosbing2','=','dosens2.id')
    ->join('ruangs','surat_tugas.idRuang','=','ruangs.id')
    ->join('dosens as dosPS','surat_tugas.stPS','=','dosPS.id')
    ->join('dosens as dosP1','surat_tugas.stP1','=','dosP1.id')
    ->join('dosens as dosP2','surat_tugas.stP2','=','dosP2.id')
    ->join('dosens as dosP3','surat_tugas.stP3','=','dosP3.id')
    ->select('surat_tugas.*','mahasiswas.mhsNim','mahasiswas.mhsNama','juduls.jdJudul','ruangs.ruangNama','dosens1.dosNama as idDosbing1','dosens2.dosNama as idDosbing2',
    'dosPS.dosNama as stPS','dosP1.dosNama as stP1','dosP2.dosNama as stP2','dosP3.dosNama as stP3')
    ->where('idDosbing1','=',$dosen->id)
    ->orWhere('idDosbing2','=',$dosen->id)
    ->orWhere('stP1','=',$dosen->id)
    ->orWhere('stP2','=',$dosen->id)
    ->orWhere('stP3','=',$dosen->id)
    ->orWhere('stPS','=',$dosen->id)
    ->get();
    return view('dosen.tugas_akhir.surat_sidang.index',compact('tugas'));
  }
  public function viewTugas($id)
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $tugas = DB::table('surat_tugas')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('dosens as dosens1','juduls.idDosbing1','=','dosens1.id')
    ->join('dosens as dosens2','juduls.idDosbing2','=','dosens2.id')
    ->join('ruangs','surat_tugas.idRuang','=','ruangs.id')
    ->join('dosens as dosPS','surat_tugas.stPS','=','dosPS.id')
    ->join('dosens as dosP1','surat_tugas.stP1','=','dosP1.id')
    ->join('dosens as dosP2','surat_tugas.stP2','=','dosP2.id')
    ->join('dosens as dosP3','surat_tugas.stP3','=','dosP3.id')
    ->select('surat_tugas.*','mahasiswas.mhsNim','mahasiswas.mhsNama','juduls.jdJudul','ruangs.ruangNama','dosens1.dosNama as idDosbing1','dosens2.dosNama as idDosbing2',
    'dosPS.dosNama as stPS','dosP1.dosNama as stP1','dosP2.dosNama as stP2','dosP3.dosNama as stP3')
    ->where('surat_tugas.id','=',$id)
    // ->where('idDosbing1','=',$dosen->id)
    // ->orWhere('idDosbing2','=',$dosen->id)
    // ->orWhere('stP1','=',$dosen->id)
    // ->orWhere('stP2','=',$dosen->id)
    // ->orWhere('stP3','=',$dosen->id)
    // ->orWhere('stPS','=',$dosen->id)
    ->get();
    return view('dosen.tugas_akhir.surat_sidang.view',compact('tugas'));
  }
  public function indexNilBimb()
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $nilai = DB::table('nilai_pembimbings')
    ->join('juduls','nilai_pembimbings.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('nilai_pembimbings.*','mahasiswas.mhsNama','mahasiswas.mhsNim','juduls.jdJudul')
    ->where('nilai_pembimbings.idDosen','=',$dosen->id)
    ->get();
    return view ('dosen.tugas_akhir.nil_bimb.index',compact('nilai'));
  }
  public function createNilBimb()
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $judul = DB::table('juduls')
    ->select('juduls.*','mahasiswas.mhsNama')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->where('idDosbing1','=',$dosen->id)
    ->orWhere('idDosbing2','=',$dosen->id)
    ->get();
    return view ('dosen.tugas_akhir.nil_bimb.create',compact('judul'));
  }
  public function storeNilBimb(Request $request)
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $input =$request->all();
    // print_r($input);
    // exit;
    $pesan = array(
      'npNilai1.required'    => 'Nilai bimbingan 1 dibutuhkan.',
      'npNilai2.required'    => 'Nilai bimbingan 2 dibutuhkan.',
      'npNilai3.required'    => 'Nilai bimbingan 3 dibutuhkan.',
      'npNilai4.required'    => 'Nilai bimbingan 4 dibutuhkan.',
      // 'bbMinggu.required'    => 'Minggu bimbingan dibutuhkan.',
      // 'bbUraian.required'    => 'Uraian bimbingan dibutuhkan.',
    );
    $aturan = array(
      // 'bbMinggu' => 'required',
      // 'bbUraian' => 'required',
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    $data = new NilaiPembimbing;
    $data->idDosen = $dosen->id;
    $data->idJudul = $input['idJudul'];
    $data->npNilai1 = $input['ket1'];
    $data->npNilai2 = $input['ket2'];
    $data->npNilai3 = $input['ket3'];
    $data->npNilai4 = $input['ket4'];
    $data->npJumlah = $input['ketJml'];

    if (! $data->save())
      App::abort(500);

      return Redirect::action('RoleDsn\RoleDsnController@indexNilBimb');
  }
  public function destroyNilBimb($id)
  {
    $nilbimb = NilaiPembimbing::where('id','=',$id)->first();
    if ($nilbimb == null)
    app::abort(404);
    $nilbimb->delete();
    return Redirect::action('RoleDsn\RoleDsnController@indexNilBimb');
  }

  public function indexNilUji()
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $nilai = DB::table('nilai_pengujis')
    ->join('surat_tugas','nilai_pengujis.idTugas','=','surat_tugas.id')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('nilai_pengujis.*','mahasiswas.mhsNama','mahasiswas.mhsNim','juduls.jdJudul')
    ->where('nilai_pengujis.idDosen','=',$dosen->id)
    ->get();
    return view ('dosen.tugas_akhir.nil_uji.index',compact('nilai'));
  }
  public function createNilUji()
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $tugas = DB::table('surat_tugas')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('surat_tugas.*','mahasiswas.mhsNama','juduls.jdJudul')
    ->where('stP1','=',$dosen->id)
    ->orWhere('stP2','=',$dosen->id)
    ->orWhere('stP3','=',$dosen->id)
    ->get();
    return view ('dosen.tugas_akhir.nil_uji.create',compact('tugas'));
  }
  public function storeNilUji(Request $request)
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $input =$request->all();
    // print_r($input);
    // exit;
    $pesan = array(
      'ujiNilai1.required'    => 'Nilai pengujian 1 dibutuhkan.',
      'ujiNilai2.required'    => 'Nilai pengujian 2 dibutuhkan.',
      'ujiNilai3.required'    => 'Nilai pengujian 3 dibutuhkan.',
      'ujiNilai4.required'    => 'Nilai pengujian 4 dibutuhkan.',
      // 'bbMinggu.required'    => 'Minggu bimbingan dibutuhkan.',
      // 'bbUraian.required'    => 'Uraian bimbingan dibutuhkan.',
    );
    $aturan = array(
      // 'bbMinggu' => 'required',
      // 'bbUraian' => 'required',
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    $data = new NilaiPenguji;
    $data->idDosen = $dosen->id;
    $data->idTugas = $input['idTugas'];
    $data->ujiNilai1 = $input['ket1'];
    $data->ujiNilai2 = $input['ket2'];
    $data->ujiNilai3 = $input['ket3'];
    $data->ujiNilai4 = $input['ket4'];
    $data->ujiJumlah = $input['ketJml'];

    if (! $data->save())
      App::abort(500);

      return Redirect::action('RoleDsn\RoleDsnController@indexNilUji');
  }
  public function destroyNilUji($id)
  {
    $niluji = NilaiPenguji::where('id','=',$id)->first();
    if ($niluji == null)
    app::abort(404);
    $niluji->delete();
    return Redirect::action('RoleDsn\RoleDsnController@indexNilUji');
  }
  public function indexRekap()
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $rekap = DB::table('rekaps')
    ->join('surat_tugas','rekaps.idTugas','=','surat_tugas.id')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('rekaps.*','mahasiswas.mhsNama','mahasiswas.mhsNim','juduls.jdJudul')
    ->where('rekaps.idDosen','=',$dosen->id)
    ->get();
    return view('dosen.tugas_akhir.rekap.index',compact('rekap'));
  }
  public function createRekap()
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $rekap = DB::table('surat_tugas')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('surat_tugas.*','mahasiswas.mhsNama','juduls.jdJudul')
    ->where('stPS','=',$dosen->id)
    ->get();
    return view('dosen.tugas_akhir.rekap.create',compact('rekap'));
  }
  public function storeRekap(Request $request)
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $input =$request->all();
    // print_r($input);
    // exit;
    $pesan = array(
      'rekNilai1.required'    => 'Nilai penguji 1 dibutuhkan.',
      'rekNilai2.required'    => 'Nilai penguji 2 dibutuhkan.',
      'rekNilai3.required'    => 'Nilai penguji 3 dibutuhkan.',
      // 'bbMinggu.required'    => 'Minggu bimbingan dibutuhkan.',
      // 'bbUraian.required'    => 'Uraian bimbingan dibutuhkan.',
    );
    $aturan = array(
      // 'bbMinggu' => 'required',
      // 'bbUraian' => 'required',
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    $data = new Rekap;
    $data->idDosen = $dosen->id;
    $data->idTugas = $input['idTugas'];
    $data->rekNilai1 = $input['ket1'];
    $data->rekNilai2 = $input['ket2'];
    $data->rekNilai3 = $input['ket3'];
    $data->rekTotal = $input['ketJml'];
    if (! $data->save())
      App::abort(500);
      return Redirect::action('RoleDsn\RoleDsnController@indexRekap');
  }
  public function destroyRekap($id)
  {
    $rekap = Rekap::where('id','=',$id)->first();
    if ($rekap == null)
    app::abort(404);
    $rekap->delete();
    return Redirect::action('RoleDsn\RoleDsnController@indexRekap');
  }
  public function indexLaporan()
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $laporan = DB::table('laporan_sidangs')
    ->join('surat_tugas','laporan_sidangs.idTugas','=','surat_tugas.id')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('ruangs','surat_tugas.idRuang','=','ruangs.id')
    ->select('laporan_sidangs.*','mahasiswas.mhsNama','mahasiswas.mhsNim','juduls.jdJudul','ruangs.ruangNama')
    ->where('laporan_sidangs.idDosen','=',$dosen->id)
    ->get();
    return view('dosen.tugas_akhir.laporan.index',compact('laporan'));
  }
  public function createLaporan()
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $laporan = DB::table('surat_tugas')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('surat_tugas.*','mahasiswas.mhsNama','juduls.jdJudul')
    ->where('stPS','=',$dosen->id)
    ->get();
    return view('dosen.tugas_akhir.laporan.create',compact('laporan'));
  }
  public function storeLaporan(Request $request)
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $input =$request->all();
    // print_r($input);
    // exit;
    $pesan = array(
      'nilBimb.required'    => 'Nilai bimbingan dibutuhkan.',
      'nilUji.required'    => 'Nilai ujian dibutuhkan.',
      'hasilAkhir.required'    => 'Hasi akhir dibutuhkan.',
    );
    $aturan = array(
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    $data = new LaporanSidang;
    $data->idDosen = $dosen->id;
    $data->idTugas = $input['idTugas'];
    $data->nilBimb = $input['ket1'];
    // $data->nilUji = $input['ket2'];
    $data->nilUji = $input['ket3'];
    $data->nilAkhir = $input['ketJml'];
    $data->hasilAkhir = $input['hasilAkhir'];
    if (! $data->save())
      App::abort(500);
      return Redirect::action('RoleDsn\RoleDsnController@indexLaporan');
  }
  public function destroyLaporan($id)
  {
    $laporan = LaporanSidang::where('id','=',$id)->first();
    if ($laporan == null)
    app::abort(404);
    $laporan->delete();
    return Redirect::action('RoleDsn\RoleDsnController@indexLaporan');
  }
  public function indexRevisi()
  {$idlogin = Auth::user()->id;
  $dosen = Dosen::where('idLogin','=',$idlogin)->first();
  $revisi = DB::table('revisis')
  ->join('surat_tugas','revisis.idTugas','=','surat_tugas.id')
  ->join('juduls','surat_tugas.idJudul','=','juduls.id')
  ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
  ->select('revisis.*','mahasiswas.mhsNama','mahasiswas.mhsNim','juduls.jdJudul')
  ->where('revisis.idDosen','=',$dosen->id)
  ->get();
    return view('dosen.tugas_akhir.revisi.index',compact('revisi'));
  }
  public function createRevisi()
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $revisi = DB::table('surat_tugas')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('surat_tugas.*','mahasiswas.mhsNama','juduls.jdJudul')
    ->where('stP1','=',$dosen->id)
    ->orWhere('stP2','=',$dosen->id)
    ->orWhere('stP3','=',$dosen->id)
    ->get();
    return view ('dosen.tugas_akhir.revisi.create',compact('revisi'));
  }
  public function storeRevisi(Request $request)
  {
    $idlogin = Auth::user()->id;
    $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $input =$request->all();
    // print_r($input);
    // exit;
    $pesan = array(
      // 'ujiNilai1.required'    => 'Nilai pengujian 1 dibutuhkan.',
      // 'ujiNilai2.required'    => 'Nilai pengujian 2 dibutuhkan.',
      // 'ujiNilai3.required'    => 'Nilai pengujian 3 dibutuhkan.',
      // 'ujiNilai4.required'    => 'Nilai pengujian 4 dibutuhkan.',
      // 'bbMinggu.required'    => 'Minggu bimbingan dibutuhkan.',
      // 'bbUraian.required'    => 'Uraian bimbingan dibutuhkan.',
    );
    $aturan = array(
      // 'bbMinggu' => 'required',
      // 'bbUraian' => 'required',
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    $data = new Revisi;
    $data->idDosen = $dosen->id;
    $data->idTugas = $input['idTugas'];
    $data->revTanggal = $input['revTanggal'];
    $data->revUraian = $input['revUraian'];
    // $data->ujiNilai3 = $input['ket3'];
    // $data->ujiNilai4 = $input['ket4'];
    // $data->ujiJumlah = $input['ketJml'];
    if (! $data->save())
      App::abort(500);
      return Redirect::action('RoleDsn\RoleDsnController@indexRevisi');
  }
  public function destroyRevisi($id)
  {
    $revisi = Revisi::where('id','=',$id)->first();
    if ($revisi == null)
    app::abort(404);
    $revisi->delete();
    return Redirect::action('RoleDsn\RoleDsnController@indexRevisi');
  }
}
