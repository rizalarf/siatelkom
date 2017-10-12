<?php

namespace App\Http\Controllers\PembLap;
use App\Http\Controllers\Controller;
use App\Models\PembLap;
use App\Models\Perusahaan;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;


class PembLapController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {

    $plap = DB::table('pembimbing_lapangans')
    ->join('perusahaans','pembimbing_lapangans.idPerus','=','perusahaans.id')
    ->select('pembimbing_lapangans.*','perusahaans.perusNama')
    ->get();
    return view('admin.dashboard.pemblap.pemblap',compact('plap'));

  }

  public function hapus($id)
  {
    DB::beginTransaction();
    try {
      $idpemblap = PembLap::find($id);
      if (!empty($idpemblap->idLogin)) {
        $login = User::find($idpemblap->idLogin);
        $login->delete();
      }
      $idpemblap->delete();
      DB::commit();
    }catch(\Exception $e) {
      DB::rollBack();
    }
    return Redirect::action('PembLap\PembLapController@index')
    ->with('successMessage','Data Pembimbing Lapangan "'.$idpemblap->pembNama.'" telah berhasil dihapus.');
  }

  public function tambah()
  {
    $perusahaan=DB::table('perusahaans')->get();
    return view('admin.dashboard.pemblap.pemblaptambah', compact('perusahaan'));
  }

  public function tambahpemblap(Request $request)
  {
    $input =$request->all();
    $pesan = array(
    'pembNik.required'    => 'Nik pembimbing lapangan dibutuhkan.',
    'pembNama.required'    => 'Nama pembimbing lapangan dibutuhkan.',
    'pembEmail.required'    => 'Email pembimbing lapangan dibutuhkan.',
    'pembKontak.required'    => 'Kontak pembimbing lapangan dibutuhkan.',
    'idPerus.required'    => 'Perusahaan dibutuhkan.',
    );

    $aturan = array(
    'pembNik' => 'required',
    'pembNama' => 'required',
    'pembEmail' => 'required',
    'pembKontak' => 'required',
    'idPerus' => 'required',
    'idLogin' => 'nullable',
    );

    $validator = Validator::make($input,$aturan, $pesan);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    DB::beginTransaction();

    try {
      $login = User::create([
        'name' => $input['pembNama'],
        'username' => $input['pembNik'],
        'email' => $input['pembEmail'],
        'password' => bcrypt($input['pembNik']),
        'level' => 'Pembimbing Lapangan',
      ]);

      $data = new PembLap;
      $data->pembNik = $input['pembNik'];
      $data->pembNama = $input['pembNama'];
      $data->pembEmail = $input['pembEmail'];
      $data->pembKontak = $input['pembKontak'];
      $data->idPerus = $input['idPerus'];
      $data->idLogin = $login->id;
      $data->save();

      DB::commit();
    }catch(\Exception $e) {
      DB::rollBack();
    }

    return Redirect::action('PembLap\PembLapController@index')
    ->with('successMessage','Data Pembimbng Lapangan "'.Input::get('pembNama').'" telah berhasil ditambahkan.');
    }

  public function editpemblap($id)
  {
    $data = PembLap::find($id);
    $namaPerusahaan = Perusahaan::find($data->idPerus)->perusNama;
    $perusahaan = Perusahaan::all();
    return view('admin.dashboard.pemblap.pemblapedit', compact('data', 'namaPerusahaan', 'perusahaan'));
  }

  public function simpanedit($id)
  {
    $input =Input::all();
    $messages = [
    'pembNik.required'    => 'Nik pembimbing lapangan dibutuhkan.',
    'pembNama.required'    => 'Nama pembimbing lapangan dibutuhkan.',
    'pembEmail.required'    => 'Email pembimbing lapangan dibutuhkan.',
    'pembKontak.required'    => 'Kontak pembimbing lapangan dibutuhkan.',
    'idPerus.required'    => 'Perusahaan dibutuhkan.',
    ];

    $validator = Validator::make($input, [
    'pembNik' => 'required',
    'pembNama' => 'required',
    'pembEmail' => 'required',
    'pembKontak' => 'required',
    'idPerus' => 'required',
    ], $messages);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    DB::beginTransaction();

    try {
      $editPembLap = Pemblap::find($id);
      if ($editPembLap->pembNik != $input['pembNik'] || $editPembLap->pembNama != $input['pembNama'] || $editPembLap->pembEmail != $input['pembEmail']) {
        $login = User::find($editPembLap->idLogin);
        $login->name = $input['pembNama'];
        $login->username = $input['pembNik'];
        $login->email = $input['pembEmail'];
        $login->password = bcrypt($input['pembNik']);
        $login->save();
      }
      $editPembLap->pembNik =  $input['pembNik'];
      $editPembLap->pembNama = $input['pembNama'];
      $editPembLap->pembEmail =  $input['pembEmail'];
      $editPembLap->pembKontak =  $input['pembKontak'];
      $editPembLap->idPerus =  $input['idPerus'];

      DB::commit();
    }catch(\Exception $e) {
      DB::rollBack();
    }

    return Redirect::action('PembLap\PembLapController@index')
    ->with('successMessage','Data Pembimbing Lapangan "'.Input::get('pembNama').'" telah berhasil diubah.');
  }

  public function daftarmagang()
  {
    return view('admin.dashboard.magang.daftarmagang');
  }
}
