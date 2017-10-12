<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Kelas;
//use App\Http\Request;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class MahasiswaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $maha = DB::table('mahasiswas')
    ->leftJoin('kelas','mahasiswas.idKelas','=','kelas.id')
    ->select('mahasiswas.*','kelas.klsNama')
    ->get();
    return view('admin.dashboard.mahasiswa.mahasiswa', compact('maha'));
  }
  public function hapus($id)
  {
    DB::beginTransaction();
    try {
      $idmhs = Mahasiswa::find($id);
      if (!empty($idmhs->idLogin)) {
        $login = User::find($idmhs->idLogin);
        $login->delete();
      }
      $idmhs->delete();
      DB::commit();
    }catch(\Exception $e) {
      DB::rollBack();
    }
    return Redirect::action('Mahasiswa\MahasiswaController@index');
  }
  public function tambah()
  {
    $kelas=DB::table('kelas')->get();
    return view('admin.dashboard.mahasiswa.mahasiswatambah', compact('kelas'));
  }
  public function tambahmahasiswa(Request $request)
  {
    $input =$request->all();
    $pesan = array(
    'mhsNim.required'    => 'NIM Mahasiswa dibutuhkan.',
    'mhsNama.required'    => 'Nama Mahasiswa dibutuhkan.',
    'mhsEmail.required'    => 'Email Mahasiswa dibutuhkan.',
    // 'mhsKontak.required'    => 'Kontak Mahasiswa dibutuhkan.',
    );
    $aturan = array(
    'mhsNim' => 'required',
    'mhsNama' => 'required',
    'mhsEmail' => 'required',
    'mhsKontak' => 'nullable',
    );

    $validator = Validator::make($input,$aturan, $pesan);
    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }
    DB::beginTransaction();

    try{
      $login = User::create([
      'name' => $input['mhsNama'],
      'username' => $input['mhsNim'],
      'email' => $input['mhsEmail'],
      'password' => bcrypt($input['mhsNim']),
      'level' => 'Mahasiswa',
      ]);

      $data = new Mahasiswa;
      $data->mhsNim = $input['mhsNim'];
      $data->mhsNama = $input['mhsNama'];
      $data->mhsEmail = $input['mhsEmail'];
      $data->mhsKontak = $input['mhsKontak'];
      $data->idKelas = $input['idKelas'];
      $data->idLogin = $login->id;
      $data->save();

      DB::commit();
    }catch(\Exception $e){
      DB::rollBack();
    }
    return Redirect::action('Mahasiswa\MahasiswaController@index')
    ->with('successMessage','Data Mahasiswa "'.$input['mhsNama'].'" telah berhasil ditambahkan.');
  }
  public function editmahasiswa($id)
  {
    $data = Mahasiswa::find($id);
    $kelas = Kelas::all();
    return view('admin.dashboard.mahasiswa.mahasiswaedit', compact('data','kelas'));
  }
  public function simpanedit($id)
  {
    $input =Input::all();
    $messages = [
    //'id.required' => 'Id Mahasiswa dibutuhkan.',
    'mhsNim.required' => 'NIM Mahasiswa dibutuhkan.',
    'mhsNama.required' => 'Nama Mahasiswa dibutuhkan.',
    'mhsEmail.required' => 'Email Mahasiswa dibutuhkan.',
    'mhsKontak.required' => 'Kontak Mahasiswa dibutuhkan.',
    ];

    $validator = Validator::make($input, [
    //'id' => 'required',
    'mhsNim' => 'required',
    'mhsNama' => 'required',
    'mhsEmail' => 'required',
    'mhsKontak' => 'required',
    ], $messages);

    if($validator->fails()) {
      # Kembali kehalaman yang sama dengan pesan error
      return Redirect::back()->withErrors($validator)->withInput();
      # Bila validasi sukses
    }

    DB::beginTransaction();

    try{
      $editdata = Mahasiswa::find($id);

      if($editdata->mhsNim != $input['mhsNim'] || $editdata->mhsNama != $input['mhsNama'] || $editdata->mhsEmail != $input['mhsEmail']){
        $login = User::find($editdata->idLogin);
        $login->name = $input['mhsNama'];
        $login->username = $input['mhsNim'];
        $login->email = $input['mhsEmail'];
        $login->password = bcrypt($input['mhsNim']);
        $login->save();
      }
      //$data->id = $request['id']; //atau bisa $input['id']
      $editdata->mhsNim = $input['mhsNim'];
      $editdata->mhsNama = $input['mhsNama'];
      $editdata->mhsEmail = $input['mhsEmail'];
      $editdata->mhsKontak = $input['mhsKontak'];
      $editdata->idKelas =  $input['idKelas'];
      $editdata->save();

      DB::commit();
    }catch(\Exception $e){
      DB::rollBack();
      // echo $e;
      // echo $e->getMessage(); ->menunjukkkan error message
      // exit;
      // app::abort(404);
    }

    return Redirect::action('Mahasiswa\MahasiswaController@index')
    ->with('successMessage','Data Mahasiswa "'.Input::get('mhsNim').'" telah berhasil diubah.');
  }
}
