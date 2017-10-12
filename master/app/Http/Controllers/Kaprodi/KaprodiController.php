<?php

namespace App\Http\Controllers\Kaprodi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kaprodi;
use App\Models\Dosen;
use App\Models\ProgramStudi;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class KaprodiController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {

    $kapro = DB::table('kaprodis')
        ->join('dosens','kaprodis.idDosen','=','dosens.id')
        ->join('program_studis','kaprodis.idProdi','=','program_studis.id')
        ->select('kaprodis.*','dosens.dosNama','program_studis.prodiNama')
        ->get();
        return view('admin.dashboard.kaprodi.kaprodi',compact('kapro'));
  }

  public function tambah()
  {
    //$data = array('Perusahaan' => Perusahaan::all());


    return view('admin.dashboard.kaprodi.kaproditambah');
    //return view('admin.dashboard.Perusahaan');
  }

  public function tambahkaprodi(Request $request)
  {
    //$data = array('Perusahaan' => Perusahaan::all());


        $input =$request->all();
        $pesan = array(
            //'id.required'    => 'Id Perusahaan dibutuhkan.',
            //'id.unique'      => 'Id Perusahaan sudah digunakan.',
            'idDosen.required'    => 'Nama kaprodi dibutuhkan.',
            'idProdi.required'    => 'Program studi dibutuhkan.',
            'kapMulai.required'    => 'Tanggal mulai menjabat dibutuhkan.',
        );

        $aturan = array(

            //'id' => 'required|unique:Perusahaans',
            'idDosen'  => 'required',
            'idProdi'  => 'required',
            'kapMulai' => 'required',
        );

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();

          # Bila validasi sukses
        }

        $data = new Kaprodi;
        //$data->id = $request['id']; //atau bisa $input['id']
        $data->idDosen = $input['idDosen'];
        $data->idProdi = $input['idProdi'];
        $data->kapMulai = $input['kapMulai'];

        if (! $data->save())
          App::abort(500);

        return Redirect::action('Kaprodi\KaprodiController@index')
                          ->with('successMessage','Data Kaprodi "'.$input['idDosen'].'" telah berhasil diubah.');

    //return view('admin.dashboard.Perusahaan');
    }

    public function tanggal()
    {

      return view('admin.dashboard.kaprodi.tanggal');
    }
    public function editkaprodi($id)
      {
        $data = Kaprodi::find($id);
        return view('admin.dashboard.kaprodi.kaprodiedit',$data);
      }

    public function simpanedit($id)
      {
        $input =Input::all();
        $messages = [
          //'id.required' => 'Id Perusahaan dibutuhkan.',
          'idDosen.required'    => 'Nama kaprodi dibutuhkan.',
          'idProdi.required'    => 'Program studi dibutuhkan.',
          'kapMulai.required'   => 'Tanggal mulai menjabat dibutuhkan.',
        ];

        $validator = Validator::make($input, [
                          //'id' => 'required',
                          'idDosen' => 'required',
                          'idProdi' => 'required',
                          'kapMulai' => 'required',
                      ], $messages);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();
          # Bila validasi sukses
        }

        $editKaprodi = Kaprodi::find($id);
        //$editPerusahaan->id = Input::get('id'); //atau bisa $input['prodiKode']
        $editKaprodi->idDosen =  $input['idDosen'];
        $editKaprodi->idProdi =  $input['idProdi'];
        $editKaprodi->kapMulai = $input['kapMulai'];
        if (! $editKaprodi->save())
          App::abort(500);

        return Redirect::action('Kaprodi\KaprodiController@index')
                          ->with('successMessage','Data Kaprodi "'.Input::get('idDosen').'" telah berhasil diubah.');
      }

}
