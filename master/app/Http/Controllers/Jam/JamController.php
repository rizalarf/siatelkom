<?php

namespace App\Http\Controllers\Jam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jam;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class JamController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    return view('admin.dashboard.jam.jam', ['jam' => Jam::all()]);
  }

  public function hapus($datahapus)
    {
      $idjam = Jam::where('id', '=', $datahapus)->first();
      if ($idjam == null)
        app::abort(404);

      $idjam->delete();
      return Redirect::action('Jam\JamController@index');
    }

  public function tambah()
    {
        //$data = array('jam' => jam::all());

      return view('admin.dashboard.jam.jamtambah');
      //return view('admin.dashboard.jam');
    }
  public function tambahjam(Request $request)
  {
    //$data = array('jam' => jam::all());


        $input =$request->all();
        $pesan = array(
            //'id.required'    => 'Id jam dibutuhkan.',
            //'id.unique'      => 'Id jam sudah digunakan.',
            'jmKode.required'    => 'Kode jam dibutuhkan.',
            'jmMulai.required'    => 'Jam mulai dibutuhkan.',
            'jmSelesai.required'    => 'Jam selesai dibutuhkan.',
            'jmRange.required'    => 'Range jam dibutuhkan.',
            );

        $aturan = array(

            //'id' => 'required|unique:jams',
                'jmKode' => 'required',
                'jmMulai' => 'required',
                'jmSelesai' => 'required',
                'jmRange' => 'required',
            );

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();

          # Bila validasi sukses
        }

        $data = new Jam;
            //$data->id = $request['id']; //atau bisa $input['id']
        $data->jmKode = $input['jmKode'];
        $data->jmMulai = $input['jmMulai'];
        $data->jmSelesai = $input['jmSelesai'];
        $data->jmRange = $input['jmRange'];

        if (! $data->save())
          App::abort(500);

        return Redirect::action('Jam\JamController@index')
                          ->with('successMessage','Data jam "'.$input['jmMulai'].'" telah berhasil diubah.');

    //return view('admin.dashboard.jam');
    }

  public function editjam($id)
    {
      $data = Jam::find($id);
      return view('admin.dashboard.jam.jamedit',$data);
    }

  public function simpanedit($id)
    {
      $input =Input::all();
      $messages = [
        //'id.required' => 'Id jam dibutuhkan.',
        'jmKode.required' => 'Kode jam dibutuhkan.',
        'jmMulai.required' => 'Jam mulai dibutuhkan.',
        'jmSelesai.required' => 'Jam selesai dibutuhkan.',
        'jmRange.required' => 'Range jam dibutuhkan.',
        ];

      $validator = Validator::make($input, [
                        //'id' => 'required',
                        'jmKode' => 'required',
                        'jmMulai' => 'required',
                        'jmSelesai' => 'required',
                        'jmRange' => 'required',
                          ], $messages);

      if($validator->fails()) {
          # Kembali kehalaman yang sama dengan pesan error
          return Redirect::back()->withErrors($validator)->withInput();
        # Bila validasi sukses
      }

      $editjam = Jam::find($id);
        //$editjam->id = Input::get('id'); //atau bisa $input['jamMulai']
      $editjam->jmKode =  $input['jmKode'];
      $editjam->jmMulai = $input['jmMulai'];
      $editjam->jmSelesai =  $input['jmSelesai'];
      $editjam->jmRange = $input['jmRange'];
      if (! $editjam->save())
        App::abort(500);

      return Redirect::action('Jam\JamController@index')
                        ->with('successMessage','Data Jam "'.Input::get('jmMulai').'" telah berhasil diubah.');
    }
}
