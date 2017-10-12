<?php

namespace App\Http\Controllers\Ruang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ruang;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class RuangController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    return view('admin.dashboard.ruang.ruang', ['ruang' => Ruang::all()]);
  }

  public function hapus($datahapus)
    {
      $idruang = Ruang::where('id', '=', $datahapus)->first();
      if ($idruang == null)
        app::abort(404);

      $idruang->delete();
      return Redirect::action('Ruang\RuangController@index');
    }

  public function tambah()
    {
      //$data = array('ruang' => ruang::all());

      return view('admin.dashboard.ruang.ruangtambah');
      //return view('admin.dashboard.ruang');
    }

    public function tambahruang(Request $request)
    {
      //$data = array('ruang' => ruang::all());


          $input =$request->all();
          $pesan = array(
              //'id.required'    => 'Id ruang dibutuhkan.',
              //'id.unique'      => 'Id ruang sudah digunakan.',
              'ruangNama.required'    => 'Nama ruang dibutuhkan.',
              'ruangJenis.required'    => 'Jenis ruang dibutuhkan.',
              );

          $aturan = array(

              //'id' => 'required|unique:ruangs',
              'ruangNama' => 'required',
              'ruangJenis' => 'required',
              );

          $validator = Validator::make($input,$aturan, $pesan);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();

            # Bila validasi sukses
          }

          $data = new Ruang;
          //$data->id = $request['id']; //atau bisa $input['id']
          $data->ruangNama = $input['ruangNama'];
          $data->ruangJenis = $input['ruangJenis'];

          if (! $data->save())
            App::abort(500);

          return Redirect::action('Ruang\RuangController@index')
                            ->with('successMessage','Data Ruang "'.$input['ruangJenis'].'" telah berhasil diubah.');

      //return view('admin.dashboard.ruang');
      }

    public function editruang($id)
      {
        $data = Ruang::find($id);
        return view('admin.dashboard.ruang.ruangedit',$data);
      }

    public function simpanedit($id)
      {
        $input =Input::all();
        $messages = [
          //'id.required' => 'Id ruang dibutuhkan.',
          'ruangNama.required' => 'Nama ruang dibutuhkan.',
          'ruangJenis.required' => 'Jenis ruang dibutuhkan.',
          ];

        $validator = Validator::make($input, [
                          //'id' => 'required',
                          'ruangNama' => 'required',
                          'ruangJenis' => 'required',
                            ], $messages);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();
          # Bila validasi sukses
        }

        $editruang = Ruang::find($id);
        //$editruang->id = Input::get('id'); //atau bisa $input['ruangJenis']
        $editruang->ruangNama =  $input['ruangNama'];
        $editruang->ruangJenis = $input['ruangJenis'];
        if (! $editruang->save())
          App::abort(500);

        return Redirect::action('Ruang\RuangController@index')
                          ->with('successMessage','Data Ruang "'.Input::get('ruangJenis').'" telah berhasil diubah.');
      }
}
