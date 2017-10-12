<?php

namespace App\Http\Controllers\Semester;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SemesterController extends Controller
{
  //semester
  protected function index() {
    return view('admin.dashboard.semester.semester');
  }

  //semster prodi
  protected function semesterprodi() {
    return view('admin.dashboard.semester.semesterprodi');
  }
}
