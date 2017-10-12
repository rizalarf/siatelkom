<?php

namespace App\Http\Controllers\RoleKaprodi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Perusahaan;
use App\Models\PembLap;
use App\Models\Pasangan;
use App\Models\JadwalKuliah;
use App\Models\Kurikulum;
use App\Models\ProgramStudi;
use App\Models\Kelas;
use App\Models\Hari;
use App\Models\Jam;
use App\Models\Matakuliah;
use App\Models\Pengampu;
use App\Models\SuratTugas;
use App\Models\Judul;
use App\Models\Ruang;
use DB;

class RoleKaprodiController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function indexUser() {
    return view('kaprodi.akun.index', compact('user'));
  }
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
    return view('kaprodi.jadwal.index',compact('jadwal'));
  }
  public function destroyJadwal($id)
  {
    $idjadwal = JadwalKuliah::where('id', '=', $id)->first();
    if ($idjadwal == null)
    app::abort(404);

    $idjadwal->delete();
    return Redirect::action('RoleKaprodi\RoleKaprodiController@indexJadwal');
  }
  public function createJadwal()
  {
    $kelas=DB::table('kelas')->get();
    $hari=DB::table('haris')->get();
    $jam=DB::table('jams')->get();
    $makul=DB::table('mata_kuliahs')->get();
    $pengampu=DB::table('pengampus')
    ->join('dosens','pengampus.idDosen','=','dosens.id')
    ->select('pengampus.*','dosens.dosNama')
    ->get();
    $dosen=DB::table('dosens')->get();
    $ruang=DB::table('ruangs')->get();
    return view('kaprodi.jadwal.create', compact('kelas','hari','jam','makul','pengampu','dosen','ruang'));
  }
  public function storeJadwal(Request $request)
  {
    $input = $request->all();
    $input['composite'] = $input['idRuang'].$input['idHari'].$input['idJam'];
    $pesan = array(
    'idKelas.required'   => 'Kode kurikulum dibutuhkan.',
    'idHari.required'   => 'Nama kurikulum dibutuhkan.',
    'idJam.required'   => 'Nama program studi dibutuhkan.',
    'idMakul.required'  => 'Tahun kurikulum dibutuhkan.',
    'idPengampu.required'     => 'SK kurikulum dibutuhkan.',
    'idRuang.required'     => 'SK kurikulum dibutuhkan.',
    'composite.unique' => 'Ruangan sudah digunakan.'
    );
    $aturan = array(
    'idKelas'   => 'required',
    'idHari'   => 'required',
    'idJam'   => 'required',
    'idMakul'  => 'required',
    'idPengampu'     => 'required',
    'idRuang'     => 'required',
    'composite' => 'unique:jadwal_kuliahs'
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    $data = new JadwalKuliah;
    $data->idKelas  = $input['idKelas'];
    $data->idHari  = $input['idHari'];
    $data->idJam  = $input['idJam'];
    $data->idMakul = $input['idMakul'];
    $data->idPengampu    = $input['idPengampu'];
    $data->idRuang    = $input['idRuang'];
    $data->composite = $input['composite'];
    if (! $data->save())
    App::abort(500);
    return Redirect::action('RoleKaprodi\RoleKaprodiController@indexJadwal')
    ->with('successMessage','Data Jadwal Kuliah "'.$input['idHari'].'" telah berhasil diubah.');
  }
  public function editJadwal($id)
  {
    $data = JadwalKuliah::find($id);
    $kelas = Kelas::all();
    $hari=Hari::all();
    $jam=Jam::all();
    $makul=Matakuliah::all();
    $pengampu=DB::table('pengampus')
    ->join('dosens','pengampus.idDosen','=','dosens.id')
    ->select('pengampus.*','dosens.dosNama')
    ->get();
    $dosen=DB::table('dosens')->get();
    $ruang=DB::table('ruangs')->get();
    return view('kaprodi.jadwal.edit', compact('data','kelas','hari','jam','makul','pengampu','dosen','ruang'));
  }
  public function updateJadwal($id)
  {
    $input = Input::all();
    $input['composite'] = $input['idRuang'].$input['idHari'].$input['idJam'];
    $pesan = array(
    'idKelas.required'   => 'Kode kurikulum dibutuhkan.',
    'idHari.required'   => 'Nama kurikulum dibutuhkan.',
    'idJam.required'   => 'Nama program studi dibutuhkan.',
    'idMakul.required'  => 'Tahun kurikulum dibutuhkan.',
    'idPengampu.required'     => 'SK kurikulum dibutuhkan.',
    'idRuang.required'     => 'SK kurikulum dibutuhkan.',
    'composite.unique' => 'Ruangan sudah digunakan.'
    );
    $aturan = array(
    'idKelas'   => 'required',
    'idHari'   => 'required',
    'idJam'   => 'required',
    'idMakul'  => 'required',
    'idPengampu'     => 'required',
    'idRuang'     => 'required',
    'composite' => 'unique:jadwal_kuliahs'
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    $edit = JadwalKuliah::find($id);
    $edit->idKelas  = $input['idKelas'];
    $edit->idHari  = $input['idHari'];
    $edit->idJam  = $input['idJam'];
    $edit->idMakul = $input['idMakul'];
    $edit->idPengampu    = $input['idPengampu'];
    $edit->idRuang    = $input['idRuang'];
    $edit->composite = $input['composite'];
    if (! $edit->save())
    App::abort(500);
    return Redirect::action('RoleKaprodi\RoleKaprodiController@indexJadwal')
    ->with('successMessage','Data Jadwal Kuliah "'.$input['idHari'].'" telah berhasil diubah.');
  }
  public function infomagang()
  {
    $infopas = DB::table('pasangans')
    ->join('mahasiswas','pasangans.idMahasiswa','=','mahasiswas.id')
    ->join('dosens','pasangans.idDosen','=','dosens.id')
    ->join('perusahaans','pasangans.idPerus','=','perusahaans.id')
    ->join('pembimbing_lapangans','pasangans.idPemb','=','pembimbing_lapangans.id')
    ->select('pasangans.*','mahasiswas.mhsNama','dosens.dosNama','perusahaans.perusNama','pembimbing_lapangans.pembNama')
    ->get();
    return view('kaprodi.magang.info.index',compact('infopas'));
  }

  public function hapus($datahapus)
  {
    $idpasangan = Pasangan::where('id', '=', $datahapus)->first();
    if ($idpasangan == null)
    app::abort(404);

    $idpasangan->delete();
    return Redirect::action('RoleKaprodi\RoleKaprodiController@infomagang')
    ->with('successMessage','Info magang "'.Mahasiswa::find($idpasangan['idMahasiswa'])->mhsNama.'" telah berhasil dihapus.');
  }

  public function tambah()
  {
    $dosen=DB::table('dosens')->orderBy('dosNip')->get();
    $perusahaan=DB::table('perusahaans')->get();
    $mahasiswa=DB::table('mahasiswas')->orderBy('mhsNim')->get();
    $pemblap=DB::table('pembimbing_lapangans')->get();
    return view('kaprodi.magang.info.create', compact('dosen','perusahaan','mahasiswa','pemblap'));
  }

  public function tambahinfomagang(Request $request)
  {
    $input =$request->all();
    $pesan = array(
      'idMahasiswa.required'  => 'Nama mahsasiswa dibutuhkan.',
      'idDosen.required'      => 'Nama dosen dibutuhkan.',
      'idPerus.required'      => 'Nama perusahaan dibutuhkan.',
      'idPemb.required'       => 'Nama pembimbing lapangan dibutuhkan.',
    );

    $aturan = array(
      'idMahasiswa' => 'required',
      'idDosen' => 'required',
      'idPerus' => 'nullable',
      'idPemb' => 'nullable',
    );

    $validator = Validator::make($input,$aturan, $pesan);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    $data = new Pasangan;
    $data->idMahasiswa = $input['idMahasiswa'];
    $data->idDosen = $input['idDosen'];
    $data->idPerus = $input['idPerus'];
    $data->idPemb = $input['idPemb'];

    if (! $data->save())
    App::abort(500);

    return Redirect::action('RoleKaprodi\RoleKaprodiController@infomagang')
    ->with('successMessage','Info magang "'.Mahasiswa::find($input['idMahasiswa'])->mhsNama.'" telah berhasil ditambahkan.');
  }

  public function editinfomagang($id)
  {
    $data = Pasangan::find($id);
    $namaMhs = Mahasiswa::find($data->idMahasiswa)->mhsNama;
    $mahasiswa = Mahasiswa::all();
    $dosen = Dosen::all();
    $perusahaan = Perusahaan::all();
    $pemblap = PembLap::all();
    return view('kaprodi.magang.info.edit', compact('data', 'namaMhs', 'mahasiswa', 'dosen', 'perusahaan', 'pemblap'));
  }

  public function simpanedit($id)
  {
    $input =Input::all();
    $messages = [
      'idMahasiswa.required' => 'Nama mahsasiswa dibutuhkan.',
      'idDosen.required'     => 'Nama dosen dibutuhkan.',
      'idPerus.required'     => 'Nama perusahaan dibutuhkan.',
      'idPemb.required'       => 'Nama pembimbing lapangan dibutuhkan.',
    ];

    $validator = Validator::make($input, [
      'idMahasiswa' => 'required',
      'idDosen' => 'required',
      'idPerus' => 'nullable',
      'idPemb' => 'nullable',
    ], $messages);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    $editinfo = Pasangan::find($id);
    $editinfo->idMahasiswa = $input['idMahasiswa'];
    $editinfo->idDosen = $input['idDosen'];
    $editinfo->idPerus = $input['idPerus'];
    $editinfo->idPemb = $input['idPemb'];
    if (! $editinfo->save())
    App::abort(500);

    return Redirect::action('RoleKaprodi\RoleKaprodiController@infomagang')
    ->with('successMessage','Info magang "'.Mahasiswa::find($input['idMahasiswa'])->mhsNama.'" telah berhasil diubah.');
  }

  public function laporanharian()
  {
    $harian = DB::table('laporan_harians')
    ->join('pasangans','laporan_harians.idPas','=','pasangans.id')
    ->join('mahasiswas','pasangans.idMahasiswa','=','mahasiswas.id')
    ->join('dosens','pasangans.idDosen','=','dosens.id')
    ->join('perusahaans','pasangans.idPerus','=','perusahaans.id')
    ->join('pembimbing_lapangans','pasangans.idPemb','=','pembimbing_lapangans.id')
    ->select('laporan_harians.*','mahasiswas.mhsNama','dosens.dosNama','perusahaans.perusNama','pembimbing_lapangans.pembNama')
    ->get();
    return view('kaprodi.magang.laphar.index',compact('harian'));
  }

  public function harianisi()
  {
    $harian = DB::table('laporan_harians')
    ->join('pasangans','laporan_harians.idPas','=','pasangans.id')
    ->join('mahasiswas','pasangans.idMahasiswa','=','mahasiswas.id')
    ->join('dosens','pasangans.idDosen','=','dosens.id')
    ->join('perusahaans','pasangans.idPerus','=','perusahaans.id')
    ->join('pembimbing_lapangans','pasangans.idPemb','=','pembimbing_lapangans.id')
    ->select('laporan_harians.*','mahasiswas.mhsNama','dosens.dosNama','perusahaans.perusNama','pembimbing_lapangans.pembNama')
    ->get();
    return view('kaprodi.magang.laphar.detail',compact('harian'));
  }

  public function laporanakhir()
  {
    $akhir = DB::table('laporan_akhirs')
    ->join('pasangans','laporan_akhirs.idPas','=','pasangans.id')
    ->join('mahasiswas','pasangans.idMahasiswa','=','mahasiswas.id')
    ->join('dosens','pasangans.idDosen','=','dosens.id')
    ->join('perusahaans','pasangans.idPerus','=','perusahaans.id')
    ->join('pembimbing_lapangans','pasangans.idPemb','=','pembimbing_lapangans.id')
    ->select('laporan_akhirs.*','mahasiswas.mhsNama','dosens.dosNama','perusahaans.perusNama','pembimbing_lapangans.pembNama')
    ->get();
    return view('kaprodi.magang.lapakhir.index',compact('akhir'));
  }

  public function akhirisi()
  {
    $akhir = DB::table('laporan_akhirs')
    ->join('pasangans','laporan_akhirs.idPas','=','pasangans.id')
    ->join('mahasiswas','pasangans.idMahasiswa','=','mahasiswas.id')
    ->join('dosens','pasangans.idDosen','=','dosens.id')
    ->join('perusahaans','pasangans.idPerus','=','perusahaans.id')
    ->join('pembimbing_lapangans','pasangans.idPemb','=','pembimbing_lapangans.id')
    ->select('laporan_akhirs.*','mahasiswas.mhsNama','dosens.dosNama','perusahaans.perusNama','pembimbing_lapangans.pembNama')
    ->get();
    return view('kaprodi.magang.lapakhir.detail',compact('akhir'));
  }

  //tugas akhir
  public function indexProposal()
  {
    $judul = DB::table('juduls')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('dosens as dosens1','juduls.idDosbing1','=','dosens1.id')
    ->join('dosens as dosens2','juduls.idDosbing2','=','dosens2.id')
    ->select('juduls.*','mahasiswas.mhsNim','mahasiswas.mhsNama','dosens1.dosNama as idDosbing1','dosens2.dosNama as idDosbing2')
    ->orderBy('mhsNim')
    ->get();
    $mahasiswa = DB::table('mahasiswas')
    ->select('mahasiswas.*','mahasiswas.mhsNim','mahasiswas.mhsNama')
    ->orderBy('mhsNim')
    ->get();
    return view('kaprodi.tugas_akhir.proposal.index',compact('judul','mahasiswa'));
  }
  public function indexTA()
  {
    $judul = DB::table('juduls')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('dosens as dosens1','juduls.idDosbing1','=','dosens1.id')
    ->join('dosens as dosens2','juduls.idDosbing2','=','dosens2.id')
    ->select('juduls.*','mahasiswas.mhsNim','mahasiswas.mhsNama','dosens1.dosNama as idDosbing1','dosens2.dosNama as idDosbing2')
    ->get();
    $list = Judul::all();
    return view('kaprodi.tugas_akhir.data_ta.index',compact('judul'))
    ->with('list',$list)
    ->with('tahun','');
  }
  public function editTA($id) {
    $judul = Judul::find($id);
    $nmMahasiswa = Mahasiswa::find($judul->idMahasiswa)->mhsNama;
    $mahasiswa = Mahasiswa::all();
    $dosbing1 = Dosen::find($judul->idDosbing1)->dosNama;
    $dosbing2 = Dosen::find($judul->idDosbing2)->dosNama;
    $dosen = Dosen::all();
    $ruang = Ruang::all();
    return view('kaprodi.tugas_akhir.data_ta.create', compact('judul','nmMahasiswa','mahasiswa','dosbing1','dosbing2','dosen','ruang'));
  }
  public function updateTA($id) {
    $input =Input::all();
    $messages = [
      'idReviewer1.required'   => 'Dosen Reviewer 1 dibutuhkan.',
      'idReviewer2.required'   => 'Dosen Reviewer 2 dibutuhkan.',
      'idReviewer3.required'   => 'Dosen Reviewer 3 dibutuhkan.',
    ];
    $validator = Validator::make($input, [
      'jdTanggal' => 'nullable',
      'jdWaktu' => 'nullable',
      'idRuang' => 'nullable',
      'idReviewer1' => 'required',
      'idReviewer2' => 'required',
      'idReviewer3' => 'required',
    ], $messages);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    $edit = Judul::find($id);
    $edit->jdTanggal = $input['jdTanggal'];
    $edit->jdWaktu = $input['jdWaktu'];
    $edit->idRuang = $input['idRuang'];
    $edit->idReviewer1 =  $input['idReviewer1'];
    $edit->idReviewer2 =  $input['idReviewer2'];
    $edit->idReviewer3 =  $input['idReviewer3'];
    if (! $edit->save())
    App::abort(500);

    return Redirect::action('RoleKaprodi\RoleKaprodiController@indexTA')
    ->with('successMessage','Data NIM "'.Input::get('idMahasiswa').'" telah berhasil diubah.');
  }
  public function viewTA($id)
  {
    $proposal = DB::table('juduls')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('dosens as dosens1','juduls.idDosbing1','=','dosens1.id')
    ->join('dosens as dosens2','juduls.idDosbing2','=','dosens2.id')
    ->join('ruangs','juduls.idRuang','=','ruangs.id')
    ->join('dosens as dosRev1','juduls.idReviewer1','=','dosRev1.id')
    ->join('dosens as dosRev2','juduls.idReviewer2','=','dosRev2.id')
    ->join('dosens as dosRev3','juduls.idReviewer3','=','dosRev3.id')
    ->where('juduls.id','=',$id)
    ->select('juduls.*','mahasiswas.mhsNim','mahasiswas.mhsNama','ruangs.ruangNama','dosens1.dosNama as idDosbing1','dosens2.dosNama as idDosbing2',
    'dosRev1.dosNama as idReviewer1','dosRev2.dosNama as idReviewer2','dosRev3.dosNama as idReviewer3')
    ->get();
    return view('kaprodi.tugas_akhir.data_ta.view',compact('proposal'));
  }
  public function indexTugas()
  {
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
    ->get();
    return view('kaprodi.tugas_akhir.surat_tugas.index',compact('tugas'));
  }
  public function viewTugas($id)
  {
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
    ->where('surat_tugas.id','=',$id)
    ->select('surat_tugas.*','mahasiswas.mhsNim','mahasiswas.mhsNama','juduls.jdJudul','ruangs.ruangNama','dosens1.dosNama as idDosbing1','dosens2.dosNama as idDosbing2',
    'dosPS.dosNama as stPS','dosP1.dosNama as stP1','dosP2.dosNama as stP2','dosP3.dosNama as stP3')
    ->get();
    return view('kaprodi.tugas_akhir.surat_tugas.view',compact('tugas'));
  }
  public function indexRekap()
  {
    // $idlogin = Auth::user()->id;
    // $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $rekap = DB::table('rekaps')
    ->join('surat_tugas','rekaps.idTugas','=','surat_tugas.id')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('rekaps.*','mahasiswas.mhsNama','mahasiswas.mhsNim','juduls.jdJudul')
    // ->where('rekaps.idDosen','=',$dosen->id)
    ->get();
    return view('kaprodi.tugas_akhir.data_rekap.index',compact('rekap'));
  }
  public function indexLaporan()
  {
    // $idlogin = Auth::user()->id;
    // $dosen = Dosen::where('idLogin','=',$idlogin)->first();
    $laporan = DB::table('laporan_sidangs')
    ->join('surat_tugas','laporan_sidangs.idTugas','=','surat_tugas.id')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('ruangs','surat_tugas.idRuang','=','ruangs.id')
    ->select('laporan_sidangs.*','mahasiswas.mhsNama','mahasiswas.mhsNim','juduls.jdJudul','ruangs.ruangNama')
    // ->where('laporan_sidangs.idDosen','=',$dosen->id)
    ->get();
    return view('kaprodi.tugas_akhir.data_laporan.index',compact('laporan'));
  }

}
