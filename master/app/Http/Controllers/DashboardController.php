<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      //$this->middleware('admin');
  }

    public function index () {
      return view('admin.dashboard.index.mainadmin');
    }
    public function dashboard () {
      return view('admin.dashboard.admin.dashboard');
    }
    //public function mahasiswa () {
    //  return view('admin.dashboard.admin.mahasiswa');
    //}
    public function kaprodi () {
      return view('admin.dashboard.index.mainkaprodi');
    }
}
