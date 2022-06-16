@extends('layouts.studentlayout')

@section('content')
<div class="container">

  <div class="col-8 offset-2">
    <form action="/sections/create/store" method="POST">
      @csrf
      <h1 class="mb-3">Create New Section</h1>
      <div class="form-group mb-3">
        <label for="section_name" class="form-label">Section Name</label>
        <input type="text" class="form-control  @error('section_name') is-invalid @enderror" name="section_name" id="section_name" value="{{ old('section_name') }}" autocomplete="section_name" autofocus>

        @error('section_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
       <input type="hidden" id="course_id" name="course_id" value="{{ $course_id->id }}">
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
    
</div>
@endsection