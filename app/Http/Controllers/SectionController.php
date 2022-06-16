<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Course;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course_id)
    {
        $sections = Section::where('course_id', 'LIKE', $course_id->id)->orderBy('created_at', 'DESC')->get();

        return view('sections.index', compact('sections', 'course_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course_id)
    {
        return view('sections.create', compact('course_id'));
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
            'section_name' => 'required'
        ]);

        Section::create($data);

        return redirect("/sections/" . $data['course_id']);
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
    public function edit(Section $section_id)
    {
        return view('sections.edit', compact('section_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Section $section_id)
    {
        $data = request()->validate([

            'section_name' => 'required'
        ]);

        $section_id->update($data);
        return redirect("/sections/" . $section_id->course_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section_id)
    {
        $section_id->delete();

        return redirect('/sections/' . $section_id->course_id);
    }
}
