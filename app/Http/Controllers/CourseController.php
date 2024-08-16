<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Distribution;
use App\Models\Teacher;
use App\Models\Material;
use App\Models\Assignment;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function gotoAddCoursePage()
    {
        return view('courses.addCoursePage' , [
            'degrees' => ['B.Sc. in CSE', 'B.Sc. in ECE', 'B.Sc. in EEE'],
        ]);
    }

    public function addCourse(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'level' => 'required',
            'semester' => 'required',
            'type' => 'required',
            'degree' => 'required',
            'credit_hour' => 'required',
        ]);
        try {

            $course = Course::create([
                'code' => $request->code,
                'name' => $request->name,
                'level' => $request->level,
                'semester' => $request->semester,
                'type' => $request->type,
                'degree' => $request->degree,
                'credit_hour' => $request->credit_hour,
            ]);

            return redirect()->back()->with('success', "Course added successfully!");
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function gotoDistributeCoursePage()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        return view('courses.distributeCoursePage' , [
            'courses' => $courses,
            'teachers' => $teachers,
        ]);
    }

    public function distributeCourse(Request $request)
    {
        $request->validate([
            'course' => 'required',
            'teacher' => 'required',
            'session' => 'required',
        ]);
        try {

            $course = Distribution::create([
                'course' => $request->course,
                'teacher' => $request->teacher,
                'session' => $request->session,
            ]);

            return redirect()->back()->with('success', "{$request->course} is distributed successfully!");
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function gotoTeachersCoursesPage()
    {
        $user = Session::get('curr_user');
        $user_email = $user->email;
        //dd($user_email);
        $courses = Distribution::where('teacher', $user_email)->get();
        $cs = Course::all();
        //dd($courses);
        return view('teachers.teacherCourses' , [
            'courses' => $courses,
            'cs' => $cs,
        ]);
    }

    public function gotoTeachersCourseViewPage($code, $session)
    {
        $course = Course::where('code', $code)->first();
        $materials = Material::where('course_code', $code)->where('session', $session)->get();
        $assignments = Assignment::where('course_code', $code)->where('session', $session)->get();
        return view('courses.teacherCourseView' , [
            'course' => $course,
            'session' => $session,
            'materials' => $materials,
            'assignments' => $assignments,
        ]);
    }
}
