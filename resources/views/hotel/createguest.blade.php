@extends('layouts.hotel')

@section('content')
<div class="container">

  <div class="col-8 offset-2">
    <div class="d-flex mb-3">
      <div class="pe-2"><a href="/hotel/newguest" class="btn btn-light" style="border-bottom: 1px solid black;">New Guest</a></div>
      <div><a href="/hotel/guestlist" class="btn btn-light" style="border-bottom: 1px solid black;">Guest List</a></div>
    </div>
    <form action="/hotel/newguest/store" method="POST">
      @csrf
      <h1 class="mb-3" style="border-bottom: 2px solid black;">New Guest Form</h1>
      <div class="row  form-group d-flex align-items-center mb-2">
        <div class="col-2">
          <label for="first_name" class="form-label">First Name</label>
        </div>
        <div class="col-10">
          <input type="text" class="form-control  @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>
          @error('first_name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="row form-group d-flex align-items-center mb-2">
        <div class="col-2">
          <label for="last_name" class="form-label">Last Name</label>
        </div>
        <div class="col-10">
          <input type="text" class="form-control  @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
          
          @error('last_name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="row form-group d-flex align-items-center mb-2">
        <div class="col-2">
          <label for="middle_name" class="form-label">Middle Name</label>
        </div>
        <div class="col-10">
          <input type="text" class="form-control  @error('middle_name') is-invalid @enderror" name="middle_name" id="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name" autofocus>
          @error('middle_name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="row form-group d-flex align-items-center mb-2">
        <div class="col-2">
          <label for="address" class="form-label">Address</label>
        </div>
        <div class="col-10">
          <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}" autocomplete="address" autofocus>
          @error('address')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="row form-group d-flex align-items-center mb-2">
        <div class="col-2 pe-0">
          <label for="contact_number" class="form-label">Contact Number</label>
        </div>
        <div class="col-10">
          <input type="text" class="form-control  @error('contact_number') is-invalid @enderror" name="contact_number" id="contact_number" value="{{ old('contact_number') }}" autocomplete="contact_number" autofocus>
          @error('contact_number')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="row form-group d-flex align-items-center mb-2">
        <div class="col-2">
          <label for="gender" class="form-label">Gender</label>
        </div>
        <div class="col-10">
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
      </div>
      <div class="row form-group d-flex align-items-center mb-2">
        <div class="col-2">
          <label for="email" class="form-label">Email Address</label>
        </div>
        <div class="col-10">
          <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" autocomplete="email" autofocus>
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <input type="hidden" id="status" name="status" value="Active">
      <div class="mt-4">
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </form>
  </div>
    
</div>
@endsection