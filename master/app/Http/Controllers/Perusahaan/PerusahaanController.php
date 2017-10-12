<?php

namespace App\Http\Controllers\Perusahaan;
use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class PerusahaanController extends Controller
{
  public function index()
  {
    return view('admin.dashboard.magang.perusahaan', ['usaha'=>Perusahaan::all()]);
  }

  public function hapus($datahapus)
    {
      $idmhs = Perusahaan::where('id', '=', $datahapus)->first();
      if ($idmhs == null)
        app::abort(404);

      $idmhs->delete();
      return Redirect::action('Perusahaan\PerusahaanController@index');
    }

    public function tambah()
    {
      //$data = array('Perusahaan' => Perusahaan::all());


      return view('admin.dashboard.magang.perusahaantambah');
      //return view('admin.dashboard.Perusahaan');
    }

    public function tambahperusahaan(Request $request)
    {
      //$data = array('Perusahaan' => Perusahaan::all());


          $input =$request->all();
          $pesan = array(
              //'id.required'    => 'Id Perusahaan dibutuhkan.',
              //'id.unique'      => 'Id Perusahaan sudah digunakan.',
              'perusNama.required'    => 'Nama perusahaan dibutuhkan.',
              'perusAlamat.required'    => 'Alamat perusahaan dibutuhkan.',
              'perusKontak.required'    => 'Kontak perusahaan dibutuhkan.',
              'perusEmail.required'    => 'Email perusahaan dibutuhkan.',
          );

          $aturan = array(

              //'id' => 'required|unique:Perusahaans',
              'perusNama' => 'required',
              'perusAlamat' => 'required',
              'perusKontak' => 'required',
              'perusEmail' => 'required',
          );

          $validator = Validator::make($input,$aturan, $pesan);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();

            # Bila validasi sukses
          }

          $data = new Perusahaan;
          //$data->id = $request['id']; //atau bisa $input['id']
          $data->perusNama = $input['perusNama'];
          $data->perusAlamat = $input['perusAlamat'];
          $data->perusKontak = $input['perusKontak'];
          $data->perusEmail = $input['perusEmail'];

          if (! $data->save())
            App::abort(500);

          return Redirect::action('Perusahaan\PerusahaanController@index')
                            ->with('successMessage','Data Perusahaan "'.$input['perusAlamat'].'" telah berhasil diubah.');

      //return view('admin.dashboard.Perusahaan');
      }

  public function editperusahaan($id)
    {
      $data = Perusahaan::find($id);
      return view('admin.dashboard.magang.perusahaanedit',$data);
    }

  public function simpanedit($id)
    {
      $input =Input::all();
      $messages = [
        //'id.required' => 'Id Perusahaan dibutuhkan.',
        'perusNama.required' => 'Nama perusahaan dibutuhkan.',
        'perusAlamat.required' => 'Alamat perusahaan dibutuhkan.',
        'perusKontak.required' => 'Kontak perusahaan dibutuhkan.',
        'perusEmail.required' => 'Email perusahaan dibutuhkan.',
      ];

      $validator = Validator::make($input, [
                        //'id' => 'required',
                        'perusNama' => 'required',
                        'perusAlamat' => 'required',
                        'perusKontak' => 'required',
                        'perusEmail' => 'required',
                    ], $messages);

      if($validator->fails()) {
          # Kembali kehalaman yang sama dengan pesan error
          return Redirect::back()->withErrors($validator)->withInput();
        # Bila validasi sukses
      }

      $editPerusahaan = Perusahaan::find($id);
      //$editPerusahaan->id = Input::get('id'); //atau bisa $input['prodiKode']
      $editPerusahaan->perusNama = $input['perusNama'];
      $editPerusahaan->perusAlamat =  $input['perusAlamat'];
      $editPerusahaan->perusKontak =  $input['perusKontak'];
      $editPerusahaan->perusEmail =  $input['perusEmail'];
      if (! $editPerusahaan->save())
        App::abort(500);

      return Redirect::action('Perusahaan\PerusahaanController@index')
                        ->with('successMessage','Data Perusahaan "'.Input::get('perusAlamat').'" telah berhasil diubah.');
    }

  public function daftarmagang()
  {
    return view('admin.dashboard.magang.daftarmagang');
  }
}
