<?php

namespace App\Http\Controllers\Hari;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hari;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class HariController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    return view('admin.dashboard.hari.hari', ['hari' => Hari::all()]);
  }

  public function hapus($datahapus)
    {
      $idhari = Hari::where('id', '=', $datahapus)->first();
      if ($idhari == null)
        app::abort(404);

      $idhari->delete();
      return Redirect::action('Hari\HariController@index');
    }

    public function tambah()
    {
      //$data = array('hari' => hari::all());


      return view('admin.dashboard.hari.haritambah');
      //return view('admin.dashboard.hari');
    }

    public function tambahhari(Request $request)
    {
      //$data = array('hari' => hari::all());


          $input =$request->all();
          $pesan = array(
              //'id.required'    => 'Id hari dibutuhkan.',
              //'id.unique'      => 'Id hari sudah digunakan.',
              'hrNama.required'    => 'Nama hari dibutuhkan.',
              );

          $aturan = array(

              //'id' => 'required|unique:haris',
              'hrNama' => 'required',
              );

          $validator = Validator::make($input,$aturan, $pesan);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();

            # Bila validasi sukses
          }

          $data = new Hari;
          //$data->id = $request['id']; //atau bisa $input['id']
          $data->hrNama = $input['hrNama'];

          if (! $data->save())
            App::abort(500);

          return Redirect::action('Hari\HariController@index')
                            ->with('successMessage','Data Hari "'.$input['hrNama'].'" telah berhasil diubah.');

      //return view('admin.dashboard.hari');
      }

  public function edithari($id)
    {
      $data = Hari::find($id);
      return view('admin.dashboard.hari.hariedit',$data);
    }

  public function simpanedit($id)
    {
      $input =Input::all();
      $messages = [
        //'id.required' => 'Id hari dibutuhkan.',
        'hrNama.required' => 'Nama hari dibutuhkan.',
        ];

      $validator = Validator::make($input, [
                        //'id' => 'required',
                        'hrNama' => 'required',
                          ], $messages);

      if($validator->fails()) {
          # Kembali kehalaman yang sama dengan pesan error
          return Redirect::back()->withErrors($validator)->withInput();
        # Bila validasi sukses
      }

      $edithari = Hari::find($id);
      //$edithari->id = Input::get('id'); //atau bisa $input['hariKode']
      $edithari->hrNama =  $input['hrNama'];
      if (! $edithari->save())
        App::abort(500);

      return Redirect::action('Hari\HariController@index')
                        ->with('successMessage','Data hari "'.Input::get('hrNama').'" telah berhasil diubah.');
    }
}
