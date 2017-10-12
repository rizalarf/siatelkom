<?php

namespace App\Http\Controllers\Prodi;
use App\Http\Controllers\Controller;
use App\Models\ProgramStudi;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class ProdiController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    return view('admin.dashboard.prodi.index', ['prodi' => ProgramStudi::all()]);
  }

  public function hapus($datahapus)
    {
      $idprodi = ProgramStudi::where('id', '=', $datahapus)->first();
      if ($idprodi == null)
        app::abort(404);

      $idprodi->delete();
      return Redirect::action('Prodi\ProdiController@index');
    }

    public function tambah()
    {
      //$data = array('prodi' => prodi::all());


      return view('admin.dashboard.prodi.proditambah');
      //return view('admin.dashboard.prodi');
    }

    public function tambahprodi(Request $request)
    {
      //$data = array('prodi' => prodi::all());


          $input =$request->all();
          $pesan = array(
              //'id.required'    => 'Id prodi dibutuhkan.',
              //'id.unique'      => 'Id prodi sudah digunakan.',
              'prodiKode.required'    => 'Kode program studi dibutuhkan.',
              'prodiNama.required'    => 'Nama program studi dibutuhkan.',
              );

          $aturan = array(

              //'id' => 'required|unique:prodis',
              'prodiKode' => 'required',
              'prodiNama' => 'required',
              );

          $validator = Validator::make($input,$aturan, $pesan);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();

            # Bila validasi sukses
          }

          $data = new ProgramStudi;
          //$data->id = $request['id']; //atau bisa $input['id']
          $data->prodiKode = $input['prodiKode'];
          $data->prodiNama = $input['prodiNama'];

          if (! $data->save())
            App::abort(500);

          return Redirect::action('Prodi\ProdiController@index')
                            ->with('successMessage','Data Prodi "'.$input['prodiNama'].'" telah berhasil diubah.');

      //return view('admin.dashboard.prodi');
      }

  public function editprodi($id)
    {
      $data = ProgramStudi::find($id);
      return view('admin.dashboard.prodi.prodiedit',$data);
    }

  public function simpanedit($id)
    {
      $input =Input::all();
      $messages = [
        //'id.required' => 'Id prodi dibutuhkan.',
        'prodiKode.required' => 'Kode program studi dibutuhkan.',
        'prodiNama.required' => 'Nama program studi dibutuhkan.',
        ];

      $validator = Validator::make($input, [
                        //'id' => 'required',
                        'prodiKode' => 'required',
                        'prodiNama' => 'required',
                          ], $messages);

      if($validator->fails()) {
          # Kembali kehalaman yang sama dengan pesan error
          return Redirect::back()->withErrors($validator)->withInput();
        # Bila validasi sukses
      }

      $editprodi = ProgramStudi::find($id);
      //$editprodi->id = Input::get('id'); //atau bisa $input['prodiKode']
      $editprodi->prodiKode = $input['prodiKode'];
      $editprodi->prodiNama =  $input['prodiNama'];
      if (! $editprodi->save())
        App::abort(500);

      return Redirect::action('Prodi\ProdiController@index')
                        ->with('successMessage','Data Prodi "'.Input::get('prodiNama').'" telah berhasil diubah.');
    }
}
