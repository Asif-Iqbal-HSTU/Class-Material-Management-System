<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Distribution;
use App\Models\Course;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function gotoAdminDashboard()
    {
        return view('admins.adminDashboard');
    }
    
    public function gotoTeacherDashboard()
    {
        $user = Session::get('curr_user');
        $user_email = $user->email;
        //dd($user_email);
        $courses = Distribution::where('teacher', $user_email)->get();
        $cs = Course::all();
        //dd($courses);
        return view('teachers.teacherDashboard' , [
            'courses' => $courses,
            'cs' => $cs,
        ]);
    }
    public function gotoStudentDashboard()
    {
        return view('students.studentDashboard');
    }
}
