@extends('layouts.studentlayout')

@section('content')

<div class="container">

    <h1>Student CRUD</h1>
    <div class="d-flex">
      <div><a href="/students/create" class="btn btn-primary">Create New Student</a></div>
    </div>
    <br/>
    <div>
      <form action="/students" method="GET">
        <div class="input-group mb-3 w-25">
          <input type="text" name="name" class="form-control" placeholder="search student name" aria-label="search student name" aria-describedby="button-addon2" value="{{ request()->query('name') }}">
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
      </form>
    </div>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Student Name</th>
            <th scope="col">Course</th>
            <th scope="col">Year</th>
            <th scope="col">Subject</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student )
            <tr>
              <th scope="row">{{ $student->id }}</th>
              <td>{{ $student->name }}</td>
              <td>{{ $student->course }}</td>
              <td>{{ $student->year }}</td>
              <td>{{ $student->subject }}</td>
              <td>
                <div class="d-flex">
                  <div class="pe-2">
                    <a href="/students/{{ $student->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                  </div>
                  <div>
                    <form action="/delete/{{ $student->id }}" method="post">
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
      {{ $students->appends(['name' => request()->query('name')])->links() }}
    </div>
    
</div>
@endsection
