<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = request()->query('name');
        if($search){
            $students = Student::where('name', 'LIKE', '%'.$search.'%')->orderBy('created_at', 'DESC')->paginate(3);
        }else{
            $students = Student::orderBy('created_at', 'DESC')->paginate(3);
        }

        return view('students.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Student::create($request->all());

        return redirect("/students");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student)
    {
        $data = request()->validate([

            'name' => 'required',
            'course' => 'required',
            'year' => 'required',
            'subject' => 'required'
        ]);

        $student->update($data);
        return redirect('/students');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('/students');
        
    }

    public function search(){

        $search_name = $_GET['name'];
        $data['students'] = Student::where('name', 'LIKE', '%'.$search_name.'%')->paginate(3);

        return view('students.index', $data);
    }
}
