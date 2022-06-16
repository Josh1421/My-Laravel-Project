@extends('layouts.studentlayout')

@section('content')
<div class="container">

  <div class="col-8 offset-2">
    <form action="/student/create/store" method="POST">
      @csrf
      <h1 class="mb-3">Create New Student</h1>
      <div class="row">
        <div class="col-6 form-group mb-3">
          <label for="student_name" class="form-label">Student Name</label>
          <input type="text" class="form-control  @error('student_name') is-invalid @enderror" name="student_name" id="student_name" value="{{ old('student_name') }}" autocomplete="student_name" autofocus>

          @error('student_name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="col-6 form-group mb-3">
          <label for="campus" class="form-label">Campus</label>
          <select name="campus" id="campus" class="form-control @error('campus') is-invalid @enderror">
            <option value="Manila">Manila</option>
            <option value="Taguig">Taguig</option>
            <option value="Cavite">Cavite</option>
            <option value="Visayas">Visayas</option>
          </select>

          @error('campus')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-6 form-group mb-3">
          <label for="course" class="form-label">Course</label>
          <input type="text" class="form-control  @error('course') is-invalid @enderror" name="course" id="course" value="{{ old('course') ?? $course_id->course_name }}" autocomplete="course" autofocus>

          @error('course')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="col-6 form-group mb-3">
          <label for="section" class="form-label">Section</label>
          <input type="text" class="form-control  @error('section') is-invalid @enderror" name="section" id="section" value="{{ old('section') ?? $section_id->section_name}}" autocomplete="section" autofocus>

          @error('section')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-6 form-group mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" autocomplete="email" autofocus>

          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="col-6 form-group mb-3">
          <label for="number" class="form-label">Cellphone Number</label>
          <input type="text" class="form-control  @error('number') is-invalid @enderror" name="number" id="number" value="{{ old('number') }}" autocomplete="number" autofocus>

          @error('number')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-4 form-group mb-3">
          <label for="birth_date" class="form-label">Birth Date</label>
          <input type="date" class="form-control  @error('birth_date') is-invalid @enderror" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" autocomplete="birth_date" autofocus>

          @error('birth_date')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="col-4 form-group mb-3">
          <label for="gender" class="form-label">Gender</label>
          <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>

          @error('gender')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="col-4 form-group mb-3">
          <label for="age" class="form-label">Age</label>
          <input type="text" class="form-control  @error('age') is-invalid @enderror" name="age" id="age" value="{{ old('age') }}" autocomplete="age" autofocus>

          @error('age')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="form-group mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}" autocomplete="address" autofocus>

        @error('address')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <input type="hidden" id="course_id" name="course_id" value="{{$section_id->course_id}}">
      <input type="hidden" id="section_id" name="section_id" value="{{$section_id->id}}">

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
    
</div>
@endsection