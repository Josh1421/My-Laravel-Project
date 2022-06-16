@extends('layouts.studentlayout')

@section('content')
<div class="container">

    <h1>Student Management System</h1>

    <div class="d-flex">
      <div class="pe-2"><a href="/sections/{{ $course_id->id }}/create" class="btn btn-primary">Create New Section</a></div>
      <div><a href="/course" class="btn btn-secondary">Back</a></div>
    </div>
    <div class="pb-3 pt-3">
      <h4>Sections in {{ $course_id->course_name }}</h4>
    </div>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Section Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sections as $section )
            <tr>
              <th scope="row">{{ $section->id }}</th>
              <td><a href="/student/{{$section->id}}">{{ $section->section_name }}</a></td>
              <td>
                <div class="d-flex">
                  <div class="pe-2">
                    <a href="/sections/{{$section->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                  </div>
                  <div>
                    <form action="/sections/{{$section->id}}/delete" method="post">
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
