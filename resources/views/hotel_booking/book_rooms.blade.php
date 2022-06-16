@extends('layouts.hotel_home')

@section('content')
<style>
  #Rooms {
    border-bottom: 2px solid white;
  }
</style>
<div><img src="/img/hotelBackground4.jpg" alt="" class="img-fluid mb-3"></div>
<div class="container">
  <!-- <div clas="row">
    <div class="d-flex justify-content-center"><h3>Book a Room</h3></div>
  </div> -->
  <div class="row">
    @foreach($categories as $category)
      <div class="col-4 py-3">
        <div>
          <div class="d-flex justify-content-center"><b>{{ $category->category }} | ${{ $category->price }}.00</b></div>
          <div><a href="/HotelBooking/book/room_category/{{ $category->category }}"><img src="{{ asset('img/' . $category->image) }}" class="w-100 img-thumbnail"></a></div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection
