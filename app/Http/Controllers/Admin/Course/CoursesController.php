<?php

namespace App\Http\Controllers\Admin\Course;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.course.index')
          ->with('courses', Course::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
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
            'name' => 'required|min:3|max:200',
            'code' => 'required|min:2|max:10|unique:courses',
        ]);

        $course = new Course();
        $course->name = $request->name;
        $course->code = $request->code;

        if ($course->save()) {
            $request->session()->flash('success', 'Course create successful');
        }
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit')
          ->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:200',
            'code' => 'required|min:2|max:10|unique:courses,code,' . $course->id,
        ]);

        $course->name = $request->name;
        $course->code = $request->code;

        if ($course->save()) {
            $request->session()->flash('success', 'Course Update successful');
        }
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course)
    {
      $course->delete();
      $request->session()->flash('success', 'Course delete successfull');
      return redirect()->route('courses.index');
    }
}
