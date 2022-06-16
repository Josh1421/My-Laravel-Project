@extends('layouts.hotel_home')

@section('content')

<style>
  #Rooms {
    border-bottom: 2px solid white;
  }
</style>

<!-- check In Modal -->
<div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/store_book_request" method="POST">
          @csrf
          <input type="hidden" id="hotel_room_id" name="hotel_room_id">
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="guest_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="guest_name" name="guest_name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="mb-3">
                <label for="guest_contact" class="form-label">Contact #</label>
                <input type="text" class="form-control" id="guest_contact" name="guest_contact">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="checkin_date" class="form-label">Check-in Date</label>
                <input type="date" class="form-control" id="checkin_date" name="checkin_date">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="mb-3">
                <label for="days" class="form-label">Days of Stay</label>
                <input type="text" class="form-control" id="days" name="days" onchange="numberOfDays()">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="checkout_date" class="form-label">Check-out Date</label>
                <input type="date" class="form-control" id="checkout_date" name="checkout_date">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="mb-3">
                <label for="child" class="form-label">Child</label>
                <input type="text" class="form-control" id="child" name="child">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="adult" class="form-label">Adult</label>
                <input type="text" class="form-control" id="adult" name="adult">
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div style="margin-top: 100px;" class="d-flex inline">
    <div class="me-3"><img src="{{ asset('img/' . $rooms[0]->image) }}" alt="" class="img-thumbnail" style="width: 500px;"></div>
    <div class="m-3">
      <div class="d-flex justify-content-center mb-3">
        <h3><b>{{ $rooms[0]->category }} | ${{ $rooms[0]->price }}.00</b></h3>
      </div>
      <div class="p-2" style="background-color: #bfbfbf; border-radius: 10px;">
        <table class="table table-hover table-bordered" style="width: 550px; background-color: #cccccc; border: 1px solid black;">
          <thead>
            <tr>
              <th scope="col"><div class="d-flex justify-content-center">Room Number</div></th>
              <th scope="col"><div class="d-flex justify-content-center">Availability</div></th>
              <th scope="col"><div></div></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rooms as $room)
              <tr>
                <td class=""><div class="d-flex justify-content-center">{{ $room->room_number }}</div></td>
                <td class="text-center"><div class="bg-success text-white rounded" style="width:100px; margin: auto;">{{ $room->availability }}</div></td>
                <td>
                  <div class="d-flex justify-content-center">
                    <button type="button" value="{{ $room->id }}" class="btn btn-sm btn-primary me-1 bookbtn">Book Now</button>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="application/javascript">
  $(document).ready(function () {
    $(document).on('click', '.bookbtn', function () {
      var room_id = $(this).val();
      $('#bookModal').modal('show');
      $('#hotel_room_id').val(room_id);
    });
  });

  function numberOfDays(){
    var days = $("#days").val();
    var date_picked = $("#checkin_date").val();
    var checkout_date = new Date();
    var checkin_date = new Date(date_picked);
    checkout_date.setDate(checkin_date.getDate() + Number(days));
    var newDate = checkout_date.getFullYear()+'-'+('0'+(checkout_date.getMonth()+1)).slice(-2)+'-'+('0'+(checkout_date.getDate())).slice(-2);
    $("#checkout_date").val(newDate);
    console.log(newDate);
  }
</script>

@endsection
