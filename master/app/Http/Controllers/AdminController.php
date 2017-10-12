<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
//use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use App\Click as Click;
use App\View as View;
use App\Kompensasi as Kompensasi;
use App\Mangkir as Mangkir;
use App\Presensi as Presensi;
use App\Jurusan as Jurusan;
use App\Prodi as Prodi;
use App\Semester as Semester;
use App\Mahasiswa as Mahasiswa;
use App\Dosen as Dosen;


class AdminController extends Controller
{

    /*public function __construct(Request $request)
    {
      $this->middleware('auth');
      $this->semesterAktif($request);
    }

    public function semesterAktif(Request $request)
    {
      //cek_semester_aktif
      $semAktif = Semester::select(DB::raw('semId'))
        ->where('semStatus','1')
        ->first();

      $request->session()->set('semId', $semAktif->semId);
    }*/
        /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    /* public function index(Request $request){
       $level = Auth::user()->level;

       switch ($level) {
         case "1":
             return $this->dashboardLevel1(); //Admin
             break;
         case "2":
             return $this->dashboardLevel2($request); //Dosen
             break;
         case "3":
             return $this->dashboardLevel3(); //Mahasiswa
             break;
         default:
             echo "Dashboard Larasia!";
       }
     }*/
     public function __construct(Request $request)
     {
       $this->middleware('auth');
     }
     public function dashBoard()
     {
         return view('admin.dashboard.index.mainadmin');
     }
   }
