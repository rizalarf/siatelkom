<?php

namespace App\Http\Controllers\Dosen;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;


class DosenController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    return view('admin.dashboard.dosen.dosen', ['dosen' => Dosen::all()]);
  }
  public function hapus($id)
  {
    DB::beginTransaction();
    try {
      $iddosen = Dosen::find($id);
      if (!empty($iddosen->idLogin)) {
        $login = User::find($iddosen->idLogin);
        $login->delete();
      }
      $iddosen->delete();
      DB::commit();
    }catch(\Exception $e) {
      DB::rollBack();
    }
    return Redirect::action('Dosen\DosenController@index')
    ->with('successMessage','Data Dosen "'.$iddosen->dosNama.'" telah berhasil dihapus.');
  }

  public function tambah()
  {
    return view('admin.dashboard.dosen.dosentambah');
  }

  public function tambahdosen(Request $request)
  {
    $input =$request->all();
    $pesan = array(
    'dosNip.required'    => 'NIP dosen dibutuhkan.',
    'dosNip.unique'    => 'NIP dosen sudah ada.',
    'dosNama.required'    => 'Nama dosen dibutuhkan.',
    'dosEmail.required'    => 'Email dosen dibutuhkan.',
    'dosKontak.required'    => 'Kontak dosen dibutuhkan.',
    );
    $aturan = array(
    'dosNip' => 'required|unique:dosens',
    'dosNama' => 'required',
    'dosEmail' => 'required',
    'dosKontak' => 'required',
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
      'name' => $input['dosNama'],
      'username' => $input['dosNip'],
      'email' => $input['dosEmail'],
      'password' => bcrypt($input['dosNip']),
      'level' => 'Dosen',
      ]);
      $data = new Dosen;
      $data->dosNip = $input['dosNip'];
      $data->dosNama = $input['dosNama'];
      $data->dosEmail = $input['dosEmail'];
      $data->dosKontak = $input['dosKontak'];
      $data->idLogin = $login->id;
      $data->save();
      DB::commit();
    }catch(\Exception $e) {
      DB::rollBack();
    }
    return Redirect::action('Dosen\DosenController@index')
    ->with('successMessage','Data Dosen "'.$input['dosNama'].'" telah berhasil diubah.');
  }
  public function editdosen($id)
  {
    $data = Dosen::find($id);
    return view('admin.dashboard.dosen.dosenedit',$data);
  }
  public function simpanedit($id)
  {
    $input =Input::all();
    $messages = [
    'dosNip.required' => 'NIP dosen dibutuhkan.',
    'dosNip.unique' => 'NIP dosen sudah ada.',
    'dosNama.required' => 'Nama dosen dibutuhkan.',
    'dosEmail.required' => 'Email dosen dibutuhkan.',
    'dosKontak.required' => 'Kontak dosen dibutuhkan.',
    ];
    $validator = Validator::make($input, [
    'dosNip' => 'required|unique:dosens,dosNip,'.$id,
    'dosNama' => 'required',
    'dosEmail' => 'required',
    'dosKontak' => 'nullable',
    ], $messages);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    DB::beginTransaction();
    try {
      $editDosen = Dosen::find($id);
      if ($editDosen->dosNip != $input['dosNip'] || $editDosen->dosNama != $input['dosNama'] || $editDosen->dosEmail != $input['dosEmail'] || $editDosen->dosKontak != $input['dosKontak']) {
        $login = User::find($editDosen->idLogin);
        $login->name = $input['dosNama'];
        $login->username = $input['dosNip'];
        $login->email = $input['dosEmail'];
        $login->password = bcrypt($input['dosNip']);
        $login->save();
      }
      $editDosen->dosNip = $input['dosNip'];
      $editDosen->dosNama =  $input['dosNama'];
      $editDosen->dosEmail =  $input['dosEmail'];
      $editDosen->dosKontak =  $input['dosKontak'];
      $editDosen->save();
      DB::commit();
    }catch(\Exception $e) {
      DB::rollBack();
    }
    return Redirect::action('Dosen\DosenController@index')
    ->with('successMessage','Data Dosen "'.Input::get('dosNip').'" telah berhasil diubah.');
  }
}
