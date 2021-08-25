<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function dashboard()
  {


    if (Auth::user()->getRole() == 'admin') {
      return view('admin.dashboard');
    } elseif (Auth::user()->getRole() == 'student') {
      return view('student.dashboard');
    } elseif (Auth::user()->getRole() == 'teacher') {
      return view('teacher.dashboard');
    }
  }
}
