<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Distribution;
use App\Models\Course;
use App\Models\ClassRoutine;
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
        $user = Session::get('curr_user');
        
        $cs = Course::all();

        $routines = ClassRoutine::where('degree', $user->degree)
            ->where('level', $user->level)
            ->where('semester', $user->semester)
            ->where('session', $user->session)
            ->get();

        $courses = Course::where('degree', $user->degree)
            ->where('level', $user->level)
            ->where('semester', $user->semester)
            ->get();

        //dd($routines);
        // Check if routines are retrieved correctly
        if ($routines->isEmpty()) {
            // Handle the case where no routines are found
            return view('students.studentDashboard', [
                'routines' => collect(), // Pass an empty collection if no routines found
                'message' => 'No class routines found for your selection.',
            ]);
        }

        return view('students.studentDashboard', [
            'routines' => $routines,
            'user' => $user,
            'courses' => $courses,
            'cs' => $cs,
        ]);
    }

}
