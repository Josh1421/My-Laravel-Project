@extends('layouts.studentlayout')

@section('content')
<div class="container">

  <div class="col-8 offset-2">
    <form action="/update/{{ $student->id }}" method="POST">
      @csrf
      @method('PATCH')

      <h1 class="mb-3">Edit Student</h1>
      <div class="form-group mb-3">
        <label for="name" class="form-label">Student Full Name</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') ?? $student->name }}" autocomplete="name" autofocus>
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="course" class="form-label">Student Course</label>
        <input type="text" class="form-control  @error('course') is-invalid @enderror" name="course" id="course" value="{{ old('course') ?? $student->course }}" autocomplete="course" autofocus>
        @error('course')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="year" class="form-label">Student Year</label>
        <input type="text" class="form-control  @error('year') is-invalid @enderror" name="year" id="year" value="{{ old('year') ?? $student->year }}" autocomplete="year" autofocus>
        @error('year')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="subject" class="form-label">Student Subject</label>
        <input type="text" class="form-control  @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('subject') ?? $student->subject }}" autocomplete="subject" autofocus>
        @error('subject')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
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