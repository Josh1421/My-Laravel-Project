@extends('layouts.hotel')

@section('content')
<div class="container">

    <div class="row">
      <div class="col-6">
        <form action="/hotel/room/store" method="POST">
          @csrf
          <h1 class="mb-4" style="border-bottom: 2px solid black;">New Room</h1>
          <div class="row  form-group d-flex align-items-center mb-2">
            <div class="col-4">
              <label for="room_number" class="form-label">Room Number</label>
            </div>
            <div class="col-7">
              <input type="text" class="form-control  @error('room_number') is-invalid @enderror" name="room_number" id="room_number" value="{{ old('room_number') }}" autocomplete="room_number" autofocus>
              @error('room_number')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="row form-group d-flex align-items-center mb-2">
            <div class="col-4">
              <label for="room_type" class="form-label">Room Type</label>
            </div>
            <div class="col-7">
              <input type="text" class="form-control  @error('room_type') is-invalid @enderror" name="room_type" id="room_type" value="{{ old('room_type') }}" autocomplete="room_type" autofocus>
              @error('room_type')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="row form-group d-flex align-items-center mb-2">
            <div class="col-4">
              <label for="room_rate" class="form-label">Room Rate</label>
            </div>
            <div class="col-7">
              <input type="text" class="form-control  @error('room_rate') is-invalid @enderror" name="room_rate" id="room_rate" value="{{ old('room_rate') }}" autocomplete="room_rate" autofocus>
              @error('room_rate')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="row form-group d-flex align-items-center mb-2">
            <div class="col-4">
              <label for="number_occupancy" class="form-label">Number of Occupancy</label>
            </div>
            <div class="col-7">
              <input type="text" class="form-control  @error('number_occupancy') is-invalid @enderror" name="number_occupancy" id="number_occupancy" value="{{ old('number_occupancy') }}" autocomplete="number_occupancy" autofocus>
              @error('number_occupancy')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-success">Save</button>
          </div>
        </form>
      </div>
      <div class="col-6">
        <h1 class="mb-4" style="border-bottom: 2px solid black;">Room List</h1>
        <div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Room Number</th>
                <th scope="col">Room Type</th>
                <th scope="col">Room Rate</th>
                <th scope="col">No. Of Occupancy</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rooms as $room )
                <tr>
                  <th scope="row">{{ $room->id }}</th>
                  <td>{{ $room->room_number }}</td>
                  <td>{{ $room->room_type }}</td>
                  <td>{{ $room->room_rate }}</td>
                  <td>{{ $room->number_occupancy }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
</div>
@endsection