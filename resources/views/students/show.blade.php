@extends('layouts.studentlayout')

@section('content')
<div class="container">

  <div class="col-8 offset-2">
    <form action="/create" method="POST">
      @csrf
      <h1 class="mb-3">Create New Student</h1>
      <div class="form-group mb-3">
        <label for="name" class="form-label">Student Full Name</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
      </div>
      <div class="form-group mb-3">
        <label for="course" class="form-label">Student Course</label>
        <input type="text" name="course" class="form-control" id="course" aria-describedby="emailHelp">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
      </div>
      <div class="form-group mb-3">
        <label for="year" class="form-label">Student Year</label>
        <input type="text" name="year" class="form-control" id="year" aria-describedby="emailHelp">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
      </div>
      <div class="form-group mb-3">
        <label for="subject" class="form-label">Student Subject</label>
        <input type="text" name="subject" class="form-control" id="subject" aria-describedby="emailHelp">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
      </div>
      <!-- <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div> -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
    
</div>
@endsection