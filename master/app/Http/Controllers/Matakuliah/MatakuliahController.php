<?php

namespace App\Http\Controllers\Matakuliah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use App\Models\Kurikulum;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class MatakuliahController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $makul = DB::table('mata_kuliahs')
        ->join('kurikulums','mata_kuliahs.idKur','=','kurikulums.id')
        ->select('mata_kuliahs.*','kurikulums.kurNama')
        ->get();
        return view('admin.dashboard.makul.matakuliah',compact('makul'));
  }

  public function tambah()
    {
      //$data = array('kurikulum' => kurikulum::all());

      return view('admin.dashboard.makul.matakuliahtambah');
      //return view('admin.dashboard.kurikulum');
    }

    public function tambahmatakuliah(Request $request)
    {
      //$data = array('kurikulum' => kurikulum::all());


          $input =$request->all();
          $pesan = array(
              //'id.required'    => 'Id kurikulum dibutuhkan.',
              //'id.unique'      => 'Id kurikulum sudah digunakan.',

              'makulKode.required'      => 'Kode mata kuliah dibutuhkan.',
              'makulNama.required'      => 'Nama mata kuliah dibutuhkan.',
              'idKur.required'          => 'Nama kurikulum dibutuhkan.',
              'makulSemester.required'  => 'Semester mata kuliah dibutuhkan.',
              'makulSks.required'       => 'Jumlah SKS mata kuliah dibutuhkan.',
              'makulJam.required'       => 'Jumlah jam mata kuliah dibutuhkan.',
          );

          $aturan = array(

              //'id' => 'required|unique:mata kuliahs',

              'makulKode'      => 'required',
              'makulNama'      => 'required',
              'idKur'          => 'required',
              'makulSemester'  => 'required',
              'makulSks'       => 'required',
              'makulJam'       => 'required',

          );

          $validator = Validator::make($input,$aturan, $pesan);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();

            # Bila validasi sukses
          }

          $data = new Matakuliah;
          //$data->id = $request['id']; //atau bisa $input['id']
          $data->makulKode     = $input['makulKode'];
          $data->makulNama     = $input['makulNama'];
          $data->idKur         = $input['idKur'];
          $data->makulSemester = $input['makulSemester'];
          $data->makulSks      = $input['makulSks'];
          $data->makulJam      = $input['makulJam'];

          if (! $data->save())
            App::abort(500);

          return Redirect::action('Matakuliah\MatakuliahController@index')
                            ->with('successMessage','Data mata kuliah "'.$input['makulNama'].'" telah berhasil diubah.');

      //return view('admin.dashboard.mata kuliah');
      }

      public function editmatakuliah($id)
        {
          $data = Matakuliah::find($id);
          return view('admin.dashboard.makul.matakuliahedit',$data);
        }

      public function simpanedit($id)
        {
          $input =Input::all();
          $messages = [
            //'id.required' => 'Id matakuliah dibutuhkan.',

            'makulKode.required'      => 'Kode mata kuliah dibutuhkan.',
            'makulNama.required'      => 'Nama mata kuliah dibutuhkan.',
            'idKur.required'          => 'Nama kurikulum dibutuhkan.',
            'makulSemester.required'  => 'Semester mata kuliah dibutuhkan.',
            'makulSks.required'       => 'Jumlah SKS mata kuliah dibutuhkan.',
            'makulJam.required'       => 'Jumlah jam mata kuliah dibutuhkan.',
          ];

          $validator = Validator::make($input, [
                            //'id' => 'required',
                            'makulKode'     => 'required',
                            'makulNama'     => 'required',
                            'idKur'         => 'required',
                            'makulSemester' => 'required',
                            'makulSks'      => 'required',
                            'makulJam'      => 'required',
                        ], $messages);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();
            # Bila validasi sukses
          }

          $editmatakuliah = Matakuliah::find($id);
          //$editmatakuliah->id = Input::get('id'); //atau bisa $input['prodiKode']
          $editmatakuliah->makulKode = $input['makulKode'];
          $editmatakuliah->makulNama = $input['makulNama'];
          $editmatakuliah->idKur = $input['idKur'];
          $editmatakuliah->makulSemester= $input['makulSemester'];
          $editmatakuliah->makulSks   = $input['makulSks'];
          $editmatakuliah->makulJam   = $input['makulJam'];
          if (! $editmatakuliah->save())
            App::abort(500);

          return Redirect::action('Matakuliah\MatakuliahController@index')
                            ->with('successMessage','Data Matakuliah "'.Input::get('makulNama').'" telah berhasil diubah.');
        }
}
