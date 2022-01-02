<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\ListKp;
use App\Models\ResultKp;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $students = Student::all()->count();
        $lecturers = Lecturer::all()->count();
        $users = User::all()->count();
        $lists_kp = ListKp::all()->count();
        $resultKp = ResultKp::all()->count();
        return view('pages.home.index', compact('students', 'users', 'lists_kp', 'resultKp', 'lecturers'));
    }
}
