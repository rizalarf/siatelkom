<?php

namespace App\Http\Controllers\RoleMhs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Validator;
use Response;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Bimbingan;
use App\Models\BimbinganEnd;
use App\Models\SiapSidang;
use App\Models\LaporanHarian;
use App\Models\LaporanAkhir;
use App\Models\Pasangan;
use App\Models\Judul;

class RoleMhsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function indexUser() {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $user = DB::table('mahasiswas')
    ->select('mahasiswas.*')
    ->where('id','=',$mahasiswa->id)
    ->get();
    return view('mahasiswa.akun.index', compact('user'));
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
    return view('mahasiswa.jadwal.index',compact('jadwal'));
  }

  //magang
  public function infomhs()
  {
    $infopas = DB::table('pasangans')
    ->join('mahasiswas','pasangans.idMahasiswa','=','mahasiswas.id')
    ->join('dosens','pasangans.idDosen','=','dosens.id')
    ->leftJoin('perusahaans','pasangans.idPerus','=','perusahaans.id')
    ->leftJoin('pembimbing_lapangans','pasangans.idPemb','=','pembimbing_lapangans.id')
    ->select('pasangans.*','mahasiswas.mhsNama','dosens.dosNama','perusahaans.perusNama','pembimbing_lapangans.pembNama')
    ->get();
    return view('mahasiswa.magang.info.index',compact('infopas'));
  }

  public function laporanharian()
  {
    // $idlogin = Auth::user()->id;
    // $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $harian = DB::table('laporan_harians')
    ->join('pasangans','laporan_harians.idPas','=','pasangans.id')
    ->join('mahasiswas','pasangans.idMahasiswa','=','mahasiswas.id')
    ->join('dosens','pasangans.idDosen','=','dosens.id')
    ->join('perusahaans','pasangans.idPerus','=','perusahaans.id')
    ->select('laporan_harians.*','mahasiswas.mhsNama','dosens.dosNama')
    // ->where('idMahasiswa','=',$mahasiswa->id)
    ->get();
    return view('mahasiswa.magang.laphar.index',compact('harian'));
  }

  public function hapusharian($datahapus)
  {
    $idharian = LaporanHarian::where('id', '=', $datahapus)->first();
    if ($idharian == null)

    $idharian->delete();
    return Redirect::action('RoleMhs\RoleMhsController@laporanharian')
    ->with('successMessage','Laporan harian tanggal "'.$idharian->lapTanggal.'" telah berhasil dihapus.');
  }

  public function tambahharian()
  {
    $mahasiswa=DB::table('mahasiswas')->get();
    return view('mahasiswa.magang.laphar.create', compact('mahasiswa'));
  }

  public function tambahlapharian(Request $request)
  {
    $input =$request->all();
    $pesan = array(
      'idPas.required'        => 'Nama mahasiswa dibutuhkan.',
      'lapTanggal.required'   => 'Tanggal laporan dibutuhkan.',
      'lapIsi.required'       => 'Isi kegiatan dibutuhkan.',
    );

    $aturan = array(
      'idPas'        => 'required',
      'lapTanggal'   => 'required',
      'lapIsi'       => 'required',
      'lapKomen'     => 'nullable',
    );

    $validator = Validator::make($input,$aturan, $pesan);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    $data = new LaporanHarian;
    $data->idPas  = $input['idPas'];
    $data->lapTanggal  = $input['lapTanggal'];
    $data->lapIsi  = $input['lapIsi'];
    if (! $data->save())
    App::abort(500);

    return Redirect::action('RoleMhs\RoleMhsController@laporanharian')
    ->with('successMessage','Laporan harian tanggal "'.Input::get('lapTanggal').'" telah berhasil ditambahkan.');
  }

  public function editlaphar($id)
  {
    $data = LaporanHarian::find($id);;
    $mahasiswa = Mahasiswa::all();
    $pasangan = Pasangan::all();
    return view('mahasiswa.magang.laphar.edit', compact('data', 'mahasiswa'.'pasangan'));
  }

  public function simpanedit($id)
  {
    $input =Input::all();
    $messages = [
      'idPas.required'        => 'Nama mahasiswa dibutuhkan.',
      'lapTanggal.required'   => 'Tanggal laporan dibutuhkan.',
      'lapIsi.required'       => 'Isi kegiatan dibutuhkan.',
    ];

    $validator = Validator::make($input, [
      'lapTanggal'    => 'required',
      'lapIsi'        => 'required',
      'lapKomen'      => 'nullable',
    ], $messages);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    $editlaphar = LaporanHarian::find($id);
    $editlaphar->lapTanggal = $input['lapTanggal'];
    $editlaphar->lapIsi = $input['lapIsi'];
    if (! $editlaphar->save())
    App::abort(500);

    return Redirect::action('RoleMhs\RoleMhsController@laporanharian')
    ->with('successMessage','Laporan harian tanggal "'.Input::get('lapTanggal').'" telah berhasil diubah.');
  }

  public function laporanakhir()
  {
    $akhir = DB::table('laporan_akhirs')
    ->join('pasangans','laporan_akhirs.idPas','=','pasangans.id')
    ->join('mahasiswas','pasangans.idMahasiswa','=','mahasiswas.id')
    ->join('dosens','pasangans.idDosen','=','dosens.id')
    ->select('laporan_akhirs.*','mahasiswas.mhsNama','dosens.dosNama')
    ->get();
    return view('mahasiswa.magang.lapakhir.index',compact('akhir'));
  }

  public function hapusakhir($datahapus)
  {
    $idakhir = LaporanAkhir::where('id', '=', $datahapus)->first();
    if ($idakhir == null)
    app::abort(404);

    $idakhir->delete();
    return Redirect::action('RoleMhs\RoleMhsController@laporanakhir')
    ->with('successMessage','Laporan akhir tanggal "'.$idakhir->lapakIsi.'" telah berhasil dihapus.');
  }

  public function tambahakhir()
  {
    $mahasiswa=DB::table('mahasiswas')->get();
    return view('mahasiswa.magang.lapakhir.create', compact('mahasiswa'));
  }

  public function tambahlapakhir(Request $request)
  {
    $input =$request->all();
    $pesan = array(
      'idPas.required'        => 'Nama mahasiswa dibutuhkan.',
      'lapakTanggal.required'   => 'Tanggal laporan dibutuhkan.',
      'lapakIsi.required'       => 'Laporan akhir dibutuhkan.',
    );

    $aturan = array(
      'idPas'        => 'required',
      'lapakTanggal'   => 'required',
      'lapakIsi'       => 'required',
      'lapakKomen'     => 'nullable',
    );

    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    // file upload
    $filePath = 'admin/contents/lapakhir/document/';
    $fileName = time().'_'.$request->lapakIsi->getClientOriginalName();
    $request->lapakIsi->move($filePath, $fileName);

    $data = new LaporanAkhir;
    $data->idPas  = $input['idPas'];
    $data->lapakTanggal  = $input['lapakTanggal'];
    $data->lapakIsi = $fileName;
    if (! $data->save())
    App::abort(500);

    return Redirect::action('RoleMhs\RoleMhsController@laporanakhir')
    ->with('successMessage','Laporan akhir tanggal "'.$data->lapakIsi.'" telah berhasil ditambahkan.');
  }

  public function editlapakhir($id)
  {
    $data = LaporanAkhir::find($id);
    $mahasiswa = Mahasiswa::all();
    $pasangan = Pasangan::all();
    return view('mahasiswa.magang.lapakhir.edit', compact('data', 'mahasiswa'.'pasangan'));
  }

  public function simpaneditakhir(Request $request,$id)
  {
    $input = $request->all();
    $messages = [
      'idPas.required'        => 'Nama mahasiswa dibutuhkan.',
      'lapakTanggal.required'   => 'Tanggal laporan dibutuhkan.',
      'lapakIsi.required'       => 'Laporan akhir dibutuhkan.',
    ];

    $validator = Validator::make($input, [
      'idPas'         => 'required',
      'lapakTanggal'    => 'required',
      'lapakIsi'        => 'required',
      'lapakKomen'      => 'nullable',
    ], $messages);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    // file upload
    if(isset($input['document'])){
      $filePath = 'admin/contents/lapakhir/document/';
      $fileName = time().'_'.$request->lapakIsi->getClientOriginalName();
      $request->lapakIsi->move($filePath, $fileName);
      $this->model->findOrFail($id)->update($input);
    }
    $editlapakhir = LaporanAkhir::find($id);
    $editlapakhir->idPas = $input['idPas'];
    $editlapakhir->lapakTanggal = $input['lapakTanggal'];
    $editlapakhir->lapakIsi = $input['lapakIsi'];
    if (! $editlapakhir->save())
    App::abort(500);

    return Redirect::action('RoleMhs\RoleMhsController@laporanakhir')
    ->with('successMessage','Data Laporan Akhir "'.$editlapakhir->lapakIsi.'" telah berhasil diubah.');
  }

  public function indexProposal()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $judul = DB::table('juduls')
      ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
      ->join('dosens as dosens1','juduls.idDosbing1','=','dosens1.id')
      ->join('dosens as dosens2','juduls.idDosbing2','=','dosens2.id')
      ->select('juduls.*','mahasiswas.mhsNim','mahasiswas.mhsNama','dosens1.dosNama as idDosbing1','dosens2.dosNama as idDosbing2')
      ->where('idMahasiswa','=',$mahasiswa->id)
      ->get();
    $count = DB::table('juduls')
      ->select('juduls.*')
      ->where('idMahasiswa','=',$mahasiswa->id)
      ->where('jdStatus','!=', 'ditolak')
      ->count();

    // print_r($judul);
    // foreach ($row as $judul) {
    //   if($row->jdStatus=='ditolak')
    // }
    // exit;
    return view('mahasiswa.tugas_akhir.proposal.index',compact('judul','count'));
  }
  public function createProposal()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $dosbing = DB::table('dosens')->orderBy('dosNama')->get();
    return view('mahasiswa.tugas_akhir.proposal.create',compact('dosbing'));
  }
  public function storeProposal(Request $request)
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $input =$request->all();
    $pesan = array(
      // 'idMahasiswa.required'   => 'NIM Mahasiswa dibutuhkan.',
      'jdJudul.required'       => 'Nama judul dibutuhkan.',
      'jdTahun.required'       => 'Tahun dibutuhkan.',
      'idDosbing1.required'    => 'Dosen pembimbing 1 dibutuhkan.',
      'idDosbing2.required'    => 'Dosen pembimbing 2 dibutuhkan.',
      // 'jdProposal.required'    => 'File proposal dibutuhkan.',
    );
    $aturan = array(
      // 'idMahasiswa' => 'required',
      'jdJudul' => 'required',
      'jdTahun' => 'required',
      'idDosbing1' => 'required',
      'idDosbing2' => 'required',
      'jdProposal' => 'nullable',
      'idReviewer1' => 'nullable',
      'jdRev1' => 'nullable',
      'jdKet1' => 'nullable',
      'idReviewer2' => 'nullable',
      'jdRev2' => 'nullable',
      'jdKet2' => 'nullable',
      'idReviewer3' => 'nullable',
      'jdRev3' => 'nullable',
      'jdKet3' => 'nullable',
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    // file upload
    $filePath = 'admin/contents/documents/proposal/';
    $fileName = $request->jdProposal->getClientOriginalName();
    $request->jdProposal->move($filePath, $fileName);

    $data = new Judul;
    // $data->idMahasiswa = $input['idMahasiswa'];
    $data->idMahasiswa = $mahasiswa->id;
    $data->jdJudul = $input['jdJudul'];
    $data->jdTahun = $input['jdTahun'];
    $data->idDosbing1 = $input['idDosbing1'];
    $data->idDosbing2 = $input['idDosbing2'];
    $data->jdProposal = $fileName;
    if (! $data->save())
      App::abort(500);
    return Redirect::action('RoleMhs\RoleMhsController@indexProposal')
                      ->with('successMessage','Data Judul Tugas Akhir "'.$input['jdJudul'].'" telah berhasil ditambahkan.');
  }
  public function editProposal($id)
  {
    $judul = Judul::find($id);
    $dosbing1 = Dosen::find($judul->idDosbing1)->dosNama;
    $dosbing2 = Dosen::find($judul->idDosbing2)->dosNama;
    $dosen = Dosen::all();
    return view('mahasiswa.tugas_akhir.proposal.edit',compact('judul','dosbing1','dosbing2','dosen'));
  }
  public function updateProposal($id)
  {
    $input =Input::all();
    $messages = [
      'jdJudul.required'       => 'Nama judul dibutuhkan.',
      'jdTahun.required'       => 'Tahun dibutuhkan.',
      'idDosbing1.required'    => 'Dosen pembimbing 1 dibutuhkan.',
      'idDosbing2.required'    => 'Dosen pembimbing 2 dibutuhkan.',
      'jdProposal.required'    => 'File proposal dibutuhkan.',
    ];

    $validator = Validator::make($input, [
      'jdJudul' => 'required',
      'jdTahun' => 'required',
      'idDosbing1' => 'required',
      'idDosbing2' => 'required',
      'jdProposal' => 'required',
    ], $messages);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    // file upload
    $filePath = 'admin/contents/documents/proposal/';
    $fileName = $input['jdProposal']->getClientOriginalName();
    $input['jdProposal']->move($filePath, $fileName);

    $editJudul = Judul::find($id);
    $editJudul->jdJudul = $input['jdJudul'];
    $editJudul->jdTahun = $input['jdTahun'];
    $editJudul->idDosbing1 =  $input['idDosbing1'];
    $editJudul->idDosbing2 =  $input['idDosbing2'];
    $editJudul->jdProposal = $fileName;
    if (! $editJudul->save())
      App::abort(500);
    return Redirect::action('RoleMhs\RoleMhsController@indexProposal')
    ->with('successMessage','Data NIM "'.Input::get('idMahasiswa').'" telah berhasil diubah.');
  }
  public function destroyProposal($id)
  {
    $idjudul = Judul::where('id','=',$id)->first();
    if ($idjudul == null)
    app::abort(404);
    $idjudul->delete();
    return Redirect::action('RoleMhs\RoleMhsController@indexProposal');
  }
  public function indexJadProposal() {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $proposal = DB::table('juduls')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('dosens as dosens1','juduls.idDosbing1','=','dosens1.id')
    ->join('dosens as dosens2','juduls.idDosbing2','=','dosens2.id')
    ->join('ruangs','juduls.idRuang','=','ruangs.id')
    ->join('dosens as dosRev1','juduls.idReviewer1','=','dosRev1.id')
    ->join('dosens as dosRev2','juduls.idReviewer2','=','dosRev2.id')
    ->join('dosens as dosRev3','juduls.idReviewer3','=','dosRev3.id')
    ->select('juduls.*','mahasiswas.mhsNim','mahasiswas.mhsNama','juduls.jdJudul','ruangs.ruangNama','dosens1.dosNama as idDosbing1','dosens2.dosNama as idDosbing2','dosRev1.dosNama as idReviewer1','dosRev2.dosNama as idReviewer2','dosRev3.dosNama as idReviewer3')
    ->where('idMahasiswa','=',$mahasiswa->id)
    ->get();
    return view('mahasiswa.tugas_akhir.jad_proposal.view',compact('proposal'));
  }
  public function indexJadSidang()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
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
    ->where('idMahasiswa','=',$mahasiswa->id)
    ->get();
    return view('Mahasiswa.tugas_akhir.jad_sidang.view',compact('tugas'));
  }
  public function indexDokProposal()
  {
    return view('Mahasiswa.tugas_akhir.dok_proposal.index');
  }
  public function indexDokSidang()
  {
    return view('Mahasiswa.tugas_akhir.dok_sidang.index');
  }

  public function indexKontrolBimbingan()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $bimbingan = DB::table('bimbingans')
      ->join('juduls','bimbingans.idJudul','=','juduls.id')
      ->join('dosens','bimbingans.idDosen','=','dosens.id')
      ->select('bimbingans.*','dosens.dosNama')
      ->where('idMahasiswa','=',$mahasiswa->id)
      ->get();
    return view('mahasiswa.tugas_akhir.bimbingan.index',compact('bimbingan'));
  }
  public function createKontrolBimbingan()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $judul = Judul::where('idMahasiswa','=',$mahasiswa->id)->first();
    $dosbing1 = Dosen::find($judul->idDosbing1);
    $dosbing2 = Dosen::find($judul->idDosbing2);
    $dosbing = array($dosbing1,$dosbing2);
    return view('Mahasiswa.tugas_akhir.bimbingan.create',compact('dosbing'));
  }
  public function storeKontrolBimbingan(Request $request)
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $judul = Judul::where('idMahasiswa','=',$mahasiswa->id)->first();
    $input =$request->all();
    $pesan = array(
      'bbTanggal.required'    => 'Tanggal bimbingan dibutuhkan.',
      'bbMinggu.required'    => 'Minggu bimbingan dibutuhkan.',
      'bbUraian.required'    => 'Uraian bimbingan dibutuhkan.',
    );
    $aturan = array(
      'bbTanggal' => 'required',
      'bbMinggu' => 'required',
      'bbUraian' => 'required',
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    $data = new Bimbingan;
    // $data->idMahasiswa = $input['idMahasiswa'];
    $data->idJudul = $judul->id;
    $data->idDosen = $input['idDosen'];
    $data->bbTanggal = $input['bbTanggal'];
    $data->bbMinggu = $input['bbMinggu'];
    $data->bbUraian = $input['bbUraian'];
    // $data->konfirmasi = $input['konfirmasi'];

    if (! $data->save())
      App::abort(500);

      return Redirect::action('RoleMhs\RoleMhsController@indexKontrolBimbingan')
      ->with('successMessage',"Data Bimbingan $mahasiswa->nama telah berhasil diubah.");
  }
  public function indexSelesaiBimbingan()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $selesai = DB::table('bimbingan_ends')
    ->join('juduls','bimbingan_ends.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->select('bimbingan_ends.*','mahasiswas.mhsNama','mahasiswas.mhsNim')
    ->where('idMahasiswa','=',$mahasiswa->id)
    ->get();
    return view('mahasiswa.tugas_akhir.bimb_selesai.index',compact('selesai'));
  }
  public function createSelesaiBimbingan()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $judul = Judul::where('idMahasiswa','=',$mahasiswa->id)->first();
    return view('mahasiswa.tugas_akhir.bimb_selesai.create');
  }
  public function storeSelesaiBimbingan(Request $request)
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $judul = Judul::where('idMahasiswa','=',$mahasiswa->id)->first();
    $input =$request->all();
    $pesan = array(
      'endTanggal.required'    => 'Tanggal bimbingan dibutuhkan.',
    );
    $aturan = array(
      'endTanggal' => 'required',
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    $data = new BimbinganEnd;
    $data->idJudul = $judul->id;
    $data->endTanggal = $input['endTanggal'];
    if (! $data->save());
    return Redirect::action('RoleMhs\RoleMhsController@indexSelesaiBimbingan')
    ->with('successMessage',"Data Bimbingan $mahasiswa->nama telah berhasil diubah.");
  }
  public function indexSiapSidang()
  {
  $idlogin = Auth::user()->id;
  $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
  $siap = DB::table('siap_sidangs')
  ->join('juduls','siap_sidangs.idJudul','=','juduls.id')
  ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
  ->select('siap_sidangs.*','mahasiswas.mhsNama','mahasiswas.mhsNim')
  ->where('idMahasiswa','=',$mahasiswa->id)
  ->get();
    return view('mahasiswa.tugas_akhir.sidang_siap.index',compact('siap'));
  }
  public function createSiapSidang()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $judul = Judul::where('idMahasiswa','=',$mahasiswa->id)->first();
    return view('mahasiswa.tugas_akhir.sidang_siap.create');
  }
  public function storeSiapSidang(Request $request)
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $judul = Judul::where('idMahasiswa','=',$mahasiswa->id)->first();
    $input =$request->all();
    $pesan = array(
      'ssTanggal.required'    => 'Tanggal bimbingan dibutuhkan.',
    );
    $aturan = array(
      'ssTanggal' => 'required',
    );
    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    $data = new SiapSidang;
    $data->idJudul = $judul->id;
    $data->ssTanggal = $input['ssTanggal'];
    if (! $data->save());
    return Redirect::action('RoleMhs\RoleMhsController@indexSiapSidang')
    ->with('successMessage',"Data Bimbingan $mahasiswa->nama telah berhasil diubah.");
  }
  public function indexProgresTA()
  {
    return view('Mahasiswa.tugas_akhir.progress.index');
  }
  public function indexNilBimb()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $nilai = DB::table('nilai_pembimbings')
    ->join('juduls','nilai_pembimbings.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('dosens','nilai_pembimbings.idDosen','=','dosens.id')
    ->select('nilai_pembimbings.*','mahasiswas.mhsNama','mahasiswas.mhsNim','dosens.dosNama')
    ->where('idMahasiswa','=',$mahasiswa->id)
    ->get();
    return view('mahasiswa.tugas_akhir.nilai_bimb.index',compact('nilai'));
  }
  public function indexNilUji()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $nilai = DB::table('nilai_pengujis')
    ->join('surat_tugas','nilai_pengujis.idTugas','=','surat_tugas.id')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('dosens','nilai_pengujis.idDosen','=','dosens.id')
    ->select('nilai_pengujis.*','mahasiswas.mhsNama','mahasiswas.mhsNim','dosens.dosNama')
    ->where('idMahasiswa','=',$mahasiswa->id)
    ->get();
    return view('mahasiswa.tugas_akhir.nilai_uji.index',compact('nilai'));
  }
  public function indexRevisi()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $revisi = DB::table('revisis')
    ->join('surat_tugas','revisis.idTugas','=','surat_tugas.id')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('dosens','revisis.idDosen','=','dosens.id')
    ->select('revisis.*','mahasiswas.mhsNama','mahasiswas.mhsNim','juduls.jdJudul','dosens.dosNama')
    ->where('idMahasiswa','=',$mahasiswa->id)
    ->get();
    return view('mahasiswa.tugas_akhir.revisi.index',compact('revisi'));
  }
  public function indexAkhir()
  {
    $idlogin = Auth::user()->id;
    $mahasiswa = Mahasiswa::where('idLogin','=',$idlogin)->first();
    $laporan = DB::table('laporan_sidangs')
    ->join('surat_tugas','laporan_sidangs.idTugas','=','surat_tugas.id')
    ->join('juduls','surat_tugas.idJudul','=','juduls.id')
    ->join('mahasiswas','juduls.idMahasiswa','=','mahasiswas.id')
    ->join('ruangs','surat_tugas.idRuang','=','ruangs.id')
    ->select('laporan_sidangs.*','mahasiswas.mhsNama','mahasiswas.mhsNim','juduls.jdJudul','ruangs.ruangNama')
    ->where('idMahasiswa','=',$mahasiswa->id)
    ->get();
    return view('mahasiswa.tugas_akhir.hasil_akhir.index',compact('laporan'));
  }

}
