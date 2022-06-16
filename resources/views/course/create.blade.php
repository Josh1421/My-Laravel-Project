@extends('layouts.studentlayout')

@section('content')
<div class="container">

  <div class="col-8 offset-2">
    <form action="/course/create/store#" method="POST">
      @csrf
      <h1 class="mb-3">Create New Course</h1>
      <div class="form-group mb-3">
        <label for="course_name" class="form-label">Course Name</label>
        <input type="text" name="course_name" class="form-control" id="course_name" aria-describedby="emailHelp" placeholder="Enter course name">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
      </div>
      <div class="form-group mb-3">
        <label for="course_initial" class="form-label">Course Initial</label>
        <input type="text" name="course_initial" class="form-control" id="course_initial" aria-describedby="emailHelp" placeholder="Enter course initial (eg. BSIS,BSCS,BSIT)">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
    
</div>
@endsection