@extends('layouts.hotel')

@section('content')
<div class="container">

    <h1 class="mb-3">SelectCheck In Form</h1>
    <div class="row">
      <div class="col-6">
        <form action="/hotel/newcheckin/selected" method="POST">
          @csrf
          <div class="">
            <div class="">
              <label for="room_type" class="form-label">Guest Name</label>
            </div>
            <div class="mb-3">
              <select name="guest_name" id="guest_name" class="form-control @error('guest_name') is-invalid @enderror">
                  <option selected="true" disabled>--Select Guest Name--</option>
                @foreach ($guests as $guest)
                  <option value="{{$guest->id}}">{{$guest->first_name}} {{$guest->middle_name}} {{$guest->last_name}}</option>
                @endforeach
              </select>
              @error('guest_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="">
            <div class="">
              <label for="room_number" class="form-label">Room Number | Type</label>
            </div>
            <div class="mb-3">
              <select name="room_number" id="room_number" class="form-control @error('room_number') is-invalid @enderror">
                  <option selected="true" disabled>--Select Room Number--</option>
                @foreach ($rooms as $room )
                  <option value="{{$room->id}}">{{$room->room_number}} | {{$room->room_type}}</option>
                @endforeach
              </select>
              @error('room_number')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-success">Select</button>
          </div>
        </form>
      </div>
      <div class="col-6">
        <form action="#" method="post">
          @csrf
          <div class="col-4">
            <label for="selected_guest" class="form-label">Guest Name</label>
          </div>
          <div class="col-7">
            <input type="text" class="form-control  @error('selected_guest') is-invalid @enderror" name="selected_guest" id="selected_guest" value="{{$guest_id->first_name}} {{$guest_id->middle_name}} {{$guest_id->last_name}}" autocomplete="selected_guest" autofocus>
            @error('selected_guest')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </form>
      </div>
    </div>
    
</div>
@endsection