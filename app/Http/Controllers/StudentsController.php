<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Course;
use App\Models\StudentList;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Section $section_id)
    {
        $students = StudentList::where('section_id', 'LIKE', $section_id->id)->orderBy('created_at', 'DESC')->get();

        return view("student.index", compact('section_id', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course_id, Section $section_id)
    {
        return view('student.create', compact('course_id', 'section_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'course_id' => 'required',
            'section_id' => 'required',
            'student_name' => 'required',
            'campus' => 'required',
            'course' => 'required',
            'section' => 'required',
            'email' => ['required', 'email'],
            'address' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'number' => 'required',
        ]);

        StudentList::create($data);

        return redirect("/student/" . $data['section_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
