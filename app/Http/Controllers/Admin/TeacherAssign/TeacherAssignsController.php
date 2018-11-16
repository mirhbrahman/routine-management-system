<?php

namespace App\Http\Controllers\Admin\TeacherAssign;

use App\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\TeacherAssign;
use App\Http\Controllers\Controller;

class TeacherAssignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $ats = TeacherAssign::with('course')->with('teacher')->get();
         return view('admin.teacherAssign.index')
           ->with('ats', $ats);
     }

     public function getBySem(Request $request, $sem = 0)
     {
       $ats = TeacherAssign::with('course')
         ->with('teacher')
         ->where('semester', $sem)
         ->get();

        if ($request->ajax()) {
          return $ats;
        }

         return view('admin.teacherAssign.index')
           ->with('ats', $ats);
     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.teacherAssign.create')
          ->with('teachers', User::where('is_teacher', 1)->where('is_active', 1)->orderBy('name', 'ASC')->get())
          ->with('courses', Course::orderBy('name', 'ASC')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'semester' => 'required',
            'course' => 'required',
            'teacher' => 'required',
        ]);

        $ta = new TeacherAssign();
        $ta->semester = $request->semester;
        $ta->course_id = $request->course;
        $ta->teacher_id = $request->teacher;

        if ($ta->save()) {
            $request->session()->flash('success', 'Assign successful');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherAssign  $teacherAssign
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherAssign $teacherAssign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherAssign  $teacherAssign
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherAssign $teacherAssign)
    {
        return view('admin.teacherAssign.edit')
        ->with('teachers', User::orderBy('name', 'ASC')->get())
        ->with('courses', Course::orderBy('name', 'ASC')->get())
        ->with('ta', $teacherAssign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherAssign  $teacherAssign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherAssign $teacherAssign)
    {
        $this->validate($request, [
            'semester' => 'required',
            'course' => 'required',
            'teacher' => 'required',
        ]);

        $ta = $teacherAssign;
        $ta->semester = $request->semester;
        $ta->course_id = $request->course;
        $ta->teacher_id = $request->teacher;

        if ($ta->save()) {
            $request->session()->flash('success', 'Assign update successful');
        }
        return redirect()->route('teacher-assigns.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherAssign  $teacherAssign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TeacherAssign $teacherAssign)
    {
        $teacherAssign->delete();
        $request->session()->flash('success', 'Teacher deleted successfully');
        return redirect()->route('teacher-assigns.index');
    }
}
