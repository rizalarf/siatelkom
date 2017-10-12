<?php

namespace App\Http\Controllers\TA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use DB;
use App\Models\Judul;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Ruang;
use App\Models\SuratTugas;

class TugasAkhirController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function indexJudul()
  {
    $judul = DB::table('juduls')
      ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
      ->join('dosens as dosens1','juduls.idDosbing1','=','dosens1.id')
      ->join('dosens as dosens2','juduls.idDosbing2','=','dosens2.id')
      ->select('juduls.*','mahasiswas.mhsNim','mahasiswas.mhsNama','dosens1.dosNama as idDosbing1','dosens2.dosNama as idDosbing2')
      ->get();
    return view('admin.dashboard.tugasakhir.data_ta.index',compact('judul'));
  }
  public function createJudul()
  {
    $nim = DB::table('mahasiswas')->orderBy('mhsNim')->get();
    $dosbing = DB::table('dosens')->orderBy('dosNip')->get();
    return view('admin.dashboard.tugasakhir.data_ta.create',compact('nim','dosbing'));
  }
  public function storeJudul(Request $request)
  {
    $input =$request->all();
    $pesan = array(
      'idMahasiswa.required'   => 'NIM Mahasiswa dibutuhkan.',
      'jdJudul.required'       => 'Nama judul dibutuhkan.',
      'jdTahun.required'       => 'Tahun dibutuhkan.',
      'idDosbing1.required'    => 'Dosen pembimbing 1 dibutuhkan.',
      'idDosbing2.required'    => 'Dosen pembimbing 2 dibutuhkan.',
    );

    $aturan = array(
      'idMahasiswa' => 'required',
      'jdJudul' => 'required',
      'jdTahun' => 'required',
      'idDosbing1' => 'required',
      'idDosbing2' => 'required',
    );

    $validator = Validator::make($input,$aturan, $pesan);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    $data = new Judul;
    $data->idMahasiswa = $input['idMahasiswa'];
    $data->jdJudul = $input['jdJudul'];
    $data->jdTahun = $input['jdTahun'];
    $data->idDosbing1 = $input['idDosbing1'];
    $data->idDosbing2 = $input['idDosbing2'];

    if (! $data->save())
      App::abort(500);

    return Redirect::action('TA\TugasAkhirController@indexJudul')
                      ->with('successMessage','Data Judul Tugas Akhir "'.$input['jdJudul'].'" telah berhasil diubah.');
  }
  public function editJudul($id)
  {
    $judul = Judul::find($id);
    $nmMahasiswa = Mahasiswa::find($judul->idMahasiswa)->mhsNama;
    $mahasiswa = Mahasiswa::all();
    $dosbing1 = Dosen::find($judul->idDosbing1)->dosNama;
    $dosbing2 = Dosen::find($judul->idDosbing2)->dosNama;
    $dosen = Dosen::all();
    return view('admin.dashboard.tugasakhir.data_ta.edit', compact('judul','nmMahasiswa','mahasiswa','dosbing1','dosbing2','dosen'));
  }
  public function updateJudul($id)
  {
    $input =Input::all();
    $messages = [
      'idMahasiswa.required'   => 'NIM Mahasiswa dibutuhkan.',
      'jdJudul.required'       => 'Nama judul dibutuhkan.',
      'jdTahun.required'       => 'Tahun dibutuhkan.',
      'idDosbing1.required'    => 'Dosen pembimbing 1 dibutuhkan.',
      'idDosbing2.required'    => 'Dosen pembimbing 2 dibutuhkan.',
    ];

    $validator = Validator::make($input, [
      'idMahasiswa' => 'required',
      'jdJudul' => 'required',
      'jdTahun' => 'required',
      'idDosbing1' => 'required',
      'idDosbing2' => 'required',
    ], $messages);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    $editJudul = Judul::find($id);
    $editJudul->idMahasiswa =  $input['idMahasiswa'];
    $editJudul->jdJudul = $input['jdJudul'];
    $editJudul->jdTahun = $input['jdTahun'];
    $editJudul->idDosbing1 =  $input['idDosbing1'];
    $editJudul->idDosbing2 =  $input['idDosbing2'];
    if (! $editJudul->save())
      App::abort(500);

    return Redirect::action('TA\TugasAkhirController@indexJudul')
                      ->with('successMessage','Data NIM "'.Input::get('idMahasiswa').'" telah berhasil diubah.');
  }
  public function destroyJudul($id)
  {
    $idjudul = Judul::where('id','=',$id)->first();
    if ($idjudul == null)
    app::abort(404);

    $idjudul->delete();
    return Redirect::action('TA\TugasAkhirController@indexJudul');
  }

  public function indexDaftar()
  {
    $daftar = DB::table('juduls')
      ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
      ->join('dosens as dosens1','juduls.idDosbing1','=','dosens1.id')
      ->join('dosens as dosens2','juduls.idDosbing2','=','dosens2.id')
      ->select('juduls.*','mahasiswas.mhsNim','mahasiswas.mhsNama','dosens1.dosNama as idDosbing1','dosens2.dosNama as idDosbing2')
      ->get();
    return view('admin.dashboard.tugasakhir.daftar_sidang.index',compact('daftar'));
  }
  public function createDaftar()
  {
    $ruang = DB::table('ruangs')->get();
    $dosen = DB::table('dosens')->orderBy('dosNip')->get();
    $judul = DB::table('juduls')
      ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
      ->join('dosens as dosens1','juduls.idDosbing1','=','dosens1.id')
      ->join('dosens as dosens2','juduls.idDosbing2','=','dosens2.id')
      ->select('juduls.*','mahasiswas.mhsNim','mahasiswas.mhsNama','dosens1.dosNama as idDosbing1','dosens2.dosNama as idDosbing2')
      ->get();
    return view('admin.dashboard.tugasakhir.daftar_sidang.create',compact('dosen','ruang','judul'));
  }
  public function storeDaftar(Request $request)
  {
    // $idlogin = Auth::user()->id;
    // $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $input =$request->all();
    $pesan = array(
      // 'idMahasiswa.required'    => 'Nama mahasiswa dibutuhkan.',
      'idJudul.required'    => 'Nama judul dibutuhkan.',
      'stPengajuan.required'    => 'Tanggal pengajuan dibutuhkan.',
      'stNoSurat.required'    => 'nomor surat pengajuan dibutuhkan.',
      'stTglSid.required'    => 'Tanggal sidang dibutuhkan.',
      'stWktSid.required'    => 'Waktu sidang dibutuhkan.',
      'idRuang.required'    => 'Ruang sidang dibutuhkan.',
      'stPS.required'    => 'Sekretaris penguji dibutuhkan.',
      'stP1.required'    => 'Penguji 1 dibutuhkan.',
      'stP2.required'    => 'Penguji 3 dibutuhkan.',
      'stP3.required'    => 'Penguji 3 dibutuhkan.',
      // 'konfirmasi.required'    => 'Konfirmasi pembimbing dibutuhkan.',
    );
    $aturan = array(
      // 'idMahasiswa' = 'required',
      'stPengajuan'  => 'required',
      'stNoSurat'  => 'required',
      'stTglSid'  => 'required',
      'stWktSid'  => 'required',
      'idRuang' => 'required',
      'stPS' => 'required',
      'stP1' => 'required',
      'stP2' => 'required',
      'stP3' => 'required',
      // 'konfirmasi' => 'required',
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    $data = new SuratTugas;
    // $data->idMahasiswa = $input['idMahasiswa'];
    // $data->idMahasiswa = $mahasiswa->id;
    $data->idJudul = $input['idJudul'];
    $data->stPengajuan = $input['stPengajuan'];
    $data->stNoSurat = $input['stNoSurat'];
    $data->stTglSid = $input['stTglSid'];
    $data->stWktSid = $input['stWktSid'];
    $data->idRuang = $input['idRuang'];
    $data->stPS = $input['stPS'];
    $data->stP1 = $input['stP1'];
    $data->stP2 = $input['stP2'];
    $data->stP3 = $input['stP3'];
    // $data->konfirmasi = $input['konfirmasi'];
    if (! $data->save())
      App::abort(500);
      return Redirect::action('TA\TugasAkhirController@indexDaftar');
      // ->with('successMessage',"Data $mahasiswa->nama telah berhasil diubah.");
  }

}
