<?php

namespace App\Http\Controllers\Pengampu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengampu;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class PengampuController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $pengampu = DB::table('pengampus')
        ->join('dosens','pengampus.idDosen','=','dosens.id')
        ->join('mata_kuliahs','pengampus.idMakul','=','mata_kuliahs.id')
        ->select('pengampus.*','dosens.dosNama','mata_kuliahs.makulNama')
        ->get();
        return view('admin.dashboard.pengampu.pengampu',compact('pengampu'));
  }

  public function tambah()
    {
      $dosen=DB::table('dosens')->get();
      $makul=DB::table('mata_kuliahs')->get();
      return view('admin.dashboard.pengampu.pengamputambah', compact('dosen','makul'));
    }

    public function tambahpengampu(Request $request)
    {
      //$data = array('kurikulum' => kurikulum::all());


          $input =$request->all();
          $pesan = array(
              //'id.required'    => 'Id kurikulum dibutuhkan.',
              //'id.unique'      => 'Id kurikulum sudah digunakan.',

              'idDosen.required'      => 'Nama pengampu dibutuhkan.',
              'idMakul.required'      => 'Nama mata kuliah dibutuhkan.',
          );

          $aturan = array(

              //'id' => 'required|unique:mata kuliahs',

              'idDosen'      => 'required',
              'idMakul'      => 'required',

          );

          $validator = Validator::make($input,$aturan, $pesan);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();

            # Bila validasi sukses
          }

          $data = new Pengampu;
          //$data->id = $request['id']; //atau bisa $input['id']
          $data->idDosen     = $input['idDosen'];
          $data->idMakul     = $input['idMakul'];

          if (! $data->save())
            App::abort(500);

          return Redirect::action('Pengampu\PengampuController@index')
                            ->with('successMessage','Data pengampu "'.$input['idMakul'].'" telah berhasil diubah.');

      //return view('admin.dashboard.mata kuliah');
      }

      public function editpengampu($id)
        {
          $data = Pengampu::find($id);
          return view('admin.dashboard.pengampu.pengampuedit',$data);
        }

      public function simpanedit($id)
        {
          $input =Input::all();
          $messages = [
            //'id.required' => 'Id pengampu dibutuhkan.',

            'idDosen.required'      => 'Nama pengampu dibutuhkan.',
            'idMakul.required'      => 'Nama mata kuliah dibutuhkan.',
          ];

          $validator = Validator::make($input, [
                            //'id' => 'required',
                            'idDosen'     => 'required',
                            'idMakul'     => 'required',
                        ], $messages);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();
            # Bila validasi sukses
          }

          $editpengampu = Pengampu::find($id);
          //$editpengampu->id = Input::get('id'); //atau bisa $input['prodiKode']
          $editpengampu->idDosen = $input['idDosen'];
          $editpengampu->idMakul = $input['idMakul'];
          if (! $editpengampu->save())
            App::abort(500);

          return Redirect::action('Pengampu\PengampuController@index')
                            ->with('successMessage','Data Pengampu "'.Input::get('idMakul').'" telah berhasil diubah.');
        }
}
