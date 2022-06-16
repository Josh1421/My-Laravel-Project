@extends('layouts.studentlayout')

@section('content')
<div class="container">

  <div class="col-8 offset-2">
    <form action="/course/{{ $course_id->id }}/update" method="POST">
      @csrf
      @method('PATCH')

      <h1 class="mb-3">Edit Course</h1>
      <div class="form-group mb-3">
        <label for="course_name" class="form-label">Course Name</label>
        <input type="text" class="form-control  @error('course_name') is-invalid @enderror" name="course_name" id="course_name" value="{{ old('course_name') ?? $course_id->course_name }}" autocomplete="course_name" autofocus>
        @error('course_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="course_initial" class="form-label">Course Initial</label>
        <input type="text" class="form-control  @error('course_initial') is-invalid @enderror" name="course_initial" id="course_initial" value="{{ old('course_initial') ?? $course_id->course_initial }}" autocomplete="course_initial" autofocus>
        @error('course_initial')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
    
</div>
@endsection