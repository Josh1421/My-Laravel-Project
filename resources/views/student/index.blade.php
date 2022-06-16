@extends('layouts.studentlayout')

@section('content')
<div class="container">

    <h1>Student Management System</h1>

    <div class="d-flex">
      <div class="pe-2"><a href="/student/{{$section_id->course_id}}/{{$section_id->id}}/create" class="btn btn-primary">Create New Student</a></div>
      <div><a href="/sections/{{$section_id->course_id}}" class="btn btn-secondary">Back</a></div>
    </div>
    <div class="pb-3 pt-3">
      <h4>Students in {{ $section_id->section_name }}</h4>
    </div>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Student Name</th>
            <th scope="col">Course</th>
            <th scope="col">Section</th>
            <th scope="col">Campus</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student )
            <tr>
              <th scope="row">{{ $student->id }}</th>
              <td><a href="#">{{ $student->student_name }}</a></td>
              <td>{{ $student->course }}</td>
              <td>{{ $student->section }}</td>
              <td>{{ $student->campus }}</td>
              <td>
                <div class="d-flex">
                  <div class="pe-2">
                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                  </div>
                  <div>
                    <form action="#" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    

    
</div>
@endsection
