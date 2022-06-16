@extends('layouts.studentlayout')

@section('content')
<div class="container">

    <h1>Student Management System</h1>

    <div class="d-flex">
      <div><a href="/course/create" class="btn btn-primary">Create New Course</a></div>
    </div>

    <div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Course Name</th>
            <th scope="col">Course Initial</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach ($courses as $course )
            <tr>
              <th scope="row">{{ $course->id }}</th>
              <td><a href="/sections/{{ $course->id }}">{{ $course->course_name }}</a></td>
              <td>{{ $course->course_initial }}</td>
              <td>
                <div class="d-flex">
                  <div class="pe-2">
                    <a href="/course/{{$course->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                  </div>
                  <div>
                    <form action="/course/{{$course->id}}/delete" method="post">
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
