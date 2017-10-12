<?php

namespace App\Http\Controllers\Kurikulum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use App\Models\ProgramStudi;
use App\Models\Matakuliah;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class KurikulumController extends Controller
{
  //kurikulum
  protected function index()
  {
    $kur = DB::table('kurikulums')
        ->join('program_studis','kurikulums.idProdi','=','program_studis.id')
        ->select('kurikulums.*','program_studis.prodiNama')
        ->get();
        return view('admin.dashboard.kurikulum.kurikulum',compact('kur'));
    }

  public function hapus($datahapus)
    {
      $idkurikulum = Kurikulum::where('id', '=', $datahapus)->first();
      if ($idkurikulum == null)
        app::abort(404);

      $idkurikulum->delete();
      return Redirect::action('Kurikulum\KurikulumController@index');
    }

  public function tambah()
    {
      //$data = array('kurikulum' => kurikulum::all());

      return view('admin.dashboard.kurikulum.kurikulumtambah');
      //return view('admin.dashboard.kurikulum');
    }

    public function tambahkurikulum(Request $request)
    {
      //$data = array('kurikulum' => kurikulum::all());


          $input =$request->all();
          $pesan = array(
              //'id.required'    => 'Id kurikulum dibutuhkan.',
              //'id.unique'      => 'Id kurikulum sudah digunakan.',

              'kurKode.required'   => 'Kode kurikulum dibutuhkan.',
              'kurNama.required'   => 'Nama kurikulum dibutuhkan.',
              'idProdi.required'   => 'Nama program studi dibutuhkan.',
              'kurTahun.required'  => 'Tahun kurikulum dibutuhkan.',
              'kurSk.required'     => 'SK kurikulum dibutuhkan.',
          );

          $aturan = array(

              //'id' => 'required|unique:Kurikulums',

              'kurKode'   => 'required',
              'kurNama'   => 'required',
              'idProdi'   => 'required',
              'kurTahun'  => 'required',
              'kurSk'     => 'required',

          );

          $validator = Validator::make($input,$aturan, $pesan);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();

            # Bila validasi sukses
          }

          $data = new Kurikulum;
          //$data->id = $request['id']; //atau bisa $input['id']
          $data->kurKode  = $input['kurKode'];
          $data->kurNama  = $input['kurNama'];
          $data->idProdi  = $input['idProdi'];
          $data->kurTahun = $input['kurTahun'];
          $data->kurSk    = $input['kurSk'];

          if (! $data->save())
            App::abort(500);

          return Redirect::action('Kurikulum\KurikulumController@index')
                            ->with('successMessage','Data Kurikulum "'.$input['kurNama'].'" telah berhasil diubah.');

      //return view('admin.dashboard.Kurikulum');
      }

      public function editkurikulum($id)
        {
          $data = Kurikulum::find($id);
          return view('admin.dashboard.kurikulum.kurikulumedit',$data);
        }

      public function simpanedit($id)
        {
          $input =Input::all();
          $messages = [
            //'id.required' => 'Id kurikulum dibutuhkan.',

            'kurKode.required'    => 'Kode kurikulum dibutuhkan.',
            'kurNama.required'    => 'Nama kurikulum dibutuhkan.',
            'idProdi.required'    => 'Nama program studi dibutuhkan.',
            'kurTahun.required'   => 'Tahun kurikulum dibutuhkan.',
            'kurSk.required'      => 'Sk kurikulum dibutuhkan.',
          ];

          $validator = Validator::make($input, [
                            //'id' => 'required',
                            'kurKode'    => 'required',
                            'kurNama'    => 'required',
                            'idProdi'    => 'required',
                            'kurTahun'   => 'required',
                            'kurSk'      => 'required',
                        ], $messages);

          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();
            # Bila validasi sukses
          }

          $editkurikulum = Kurikulum::find($id);
          //$editkurikulum->id = Input::get('id'); //atau bisa $input['prodiKode']
          $editkurikulum->kurKode = $input['kurKode'];
          $editkurikulum->kurNama = $input['kurNama'];
          $editkurikulum->idProdi = $input['idProdi'];
          $editkurikulum->kurTahun= $input['kurTahun'];
          $editkurikulum->kurSk   = $input['kurSk'];
          if (! $editkurikulum->save())
            App::abort(500);

          return Redirect::action('Kurikulum\KurikulumController@index')
                            ->with('successMessage','Data Kurikulum "'.Input::get('kurNama').'" telah berhasil diubah.');
        }

  //matakuliah
  protected function jadwalkuliah() {
    return view('admin.dashboard.kurikulum.jadwalkuliah');
  }
}
