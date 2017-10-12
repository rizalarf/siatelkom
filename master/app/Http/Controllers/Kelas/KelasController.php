<?php

namespace App\Http\Controllers\Kelas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Dosen;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class KelasController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $kelas = DB::table('kelas')
        ->join('dosens','kelas.idDosen','=','dosens.id')
        ->select('kelas.*','dosens.dosNama')
        ->get();
        return view('admin.dashboard.kelas.kelas',compact('kelas'));
  }

  public function hapus($datahapus)
    {
      $idkelas = Kelas::where('id', '=', $datahapus)->first();
      if ($idkelas == null)
        app::abort(404);

      $idkelas->delete();
      return Redirect::action('Kelas\KelasController@index');
    }

  public function tambah()
    {
      //$data = array('Kelas' => Kelas::all());

      return view('admin.dashboard.kelas.kelastambah');
      //return view('admin.dashboard.Kelas');
    }
    public function tambahkelas(Request $request)
    {
      //$data = array('Kelas' => Kelas::all());


          $input =$request->all();
          $pesan = array(
              //'id.required'    => 'Id Kelas dibutuhkan.',
              //'id.unique'      => 'Id Kelas sudah digunakan.',

              'klsNama.required'   => 'Nama kelas dibutuhkan.',
              'idDosen.required'    => 'Nama dosen wali dibutuhkan.',
          );

          $aturan = array(

              //'id' => 'required|unique:Kelass',

              'klsNama'   => 'required',
              'idDosen'    => 'required',
          );

          $validator = Validator::make($input,$aturan, $pesan);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();

            # Bila validasi sukses
          }

          $data = new Kelas;
          //$data->id = $request['id']; //atau bisa $input['id']
          $data->klsNama = $input['klsNama'];
          $data->idDosen = $input['idDosen'];

          if (! $data->save())
            App::abort(500);

          return Redirect::action('Kelas\KelasController@index')
                            ->with('successMessage','Data Kelas "'.$input['klsNama'].'" telah berhasil diubah.');

      //return view('admin.dashboard.Kelas');
      }

      public function editkelas($id)
        {
          $data = Kelas::find($id);
          return view('admin.dashboard.kelas.kelasedit',$data);
        }

      public function simpanedit($id)
        {
          $input =Input::all();
          $messages = [
            //'id.required' => 'Id Kelas dibutuhkan.',

            'klsNama.required'    => 'Nama kelas dibutuhkan.',
            'idDosen.required'     => 'Nama dosen wali dibutuhkan.',
          ];

          $validator = Validator::make($input, [
                            //'id' => 'required',
                            'klsNama'    => 'required',
                            'idDosen'     => 'required',
                        ], $messages);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();
            # Bila validasi sukses
          }

          $editkelas = Kelas::find($id);
          //$editkelas->id = Input::get('id'); //atau bisa $input['prodiKode']
          $editkelas->klsNama = $input['klsNama'];
          $editkelas->idDosen =  $input['idDosen'];
          if (! $editkelas->save())
            App::abort(500);

          return Redirect::action('Kelas\KelasController@index')
                            ->with('successMessage','Data Kelas "'.Input::get('klsNama').'" telah berhasil diubah.');
        }
}
