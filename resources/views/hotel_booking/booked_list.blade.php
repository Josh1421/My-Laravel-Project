@extends('layouts.sidebar.sidebar')

@section('content')

<!-- check In Modal -->
<div class="modal fade" id="checkinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check In</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/store_book" method="POST">
          @csrf
          <input type="hidden" id="book_id" name="book_id">
          <input type="hidden" id="hotel_room_id" name="hotel_room_id">
          <input type="hidden" id="room_price" name="room_price">
          <div class="row">
            <div class="col-6">
              <div class="mb-3">
                <label for="guest_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="guest_name" name="guest_name">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="guest_contact" class="form-label">Contact #</label>
                <input type="text" class="form-control" id="guest_contact" name="guest_contact">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="mb-3">
                <label for="checkin_date" class="form-label">Check-in Date</label>
                <input type="date" class="form-control" id="checkin_date" name="checkin_date">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="days" class="form-label">Days of Stay</label>
                <input type="text" class="form-control" id="days" name="days" onchange="numberOfDays()">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="mb-3">
                <label for="guest_checkout_date" class="form-label">Check-out Date</label>
                <input type="date" class="form-control" id="guest_checkout_date" name="guest_checkout_date">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="sub_total" class="form-label"><b>Sub Total</b></label>
                <input type="text" class="form-control" id="sub_total" name="sub_total">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="mb-3">
                <label for="down_payment" class="form-label">Down Payment</label>
                <input type="text" class="form-control" id="down_payment" name="down_payment" onchange="downPayment()">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="total_balance" class="form-label">Total Balance</label>
                <input type="text" class="form-control" id="total_balance" name="total_balance">
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Check In</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-9">
      <div class="bg-white p-2 rounded">
        <div class="d-flex justify-content-center"><h4>Reserve Request</h4></div>
        <table class="table table-hover table-bordered bg-white">
          <thead>
            <tr>
              <th scope="col"><div class="d-flex justify-content-center">Name</div></th>
              <th scope="col"><div class="d-flex justify-content-center">Contact</div></th>
              <th scope="col" ><div class="d-flex justify-content-center">Room Number</div></th>
              <th scope="col" ><div class="d-flex justify-content-center">Category</div></th>
              <th scope="col"><div class="d-flex justify-content-center">Action</div></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bookRequest_lists as $list)
              <tr>
                <td class=""><div class="d-flex justify-content-center">{{ $list->guest_name }}</div></td>
                <td class=""><div class="d-flex justify-content-center">{{ $list->guest_contact }}</div></td>
                <td class=""><div class="d-flex justify-content-center">{{ $list->room_number }}</div></td>
                <td class=""><div class="d-flex justify-content-center">{{ $list->category }}</div></td>
                <td>
                  <div class="d-flex justify-content-center">
                    <button type="button" value="{{ $list->id }}" class="btn btn-sm btn-primary me-1 checkInBtn">Check-in</button>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script type="application/javascript">
  $(document).ready(function () {
    $('.table').DataTable();
  });
  $(document).ready(function () {
    $(document).on('click', '.checkInBtn', function () {
      var bookRequest_id = $(this).val();
      // alert(room_id);
      $('#checkinModal').modal('show');

      $.ajax({
        type: "GET",
        url: "/checkin_request/"+bookRequest_id,
        success: function (response) {
          console.log(response);
          $('#hotel_room_id').val(response.book_request.id);
          $('#guest_name').val(response.book_request.guest_name);
          $('#guest_contact').val(response.book_request.guest_contact);
          $('#checkin_date').val(response.book_request.checkin_date);
          $('#guest_checkout_date').val(response.book_request.checkout_date);
          $('#days').val(response.book_request.days);
          $('#room_price').val(response.room.price);
          $('#book_id').val(bookRequest_id);
          
          var days = $("#days").val();
          var room_price = $("#room_price").val();
          var sub_total = days * room_price;
          $('#sub_total').val(sub_total);
        }

      });
    });
  });

  function downPayment(){
    var down_payment = $("#down_payment").val();
    var sub_total = $("#sub_total").val();
    var total_balance = sub_total - down_payment;
    $("#total_balance").val(total_balance);
  }
</script>

@endsection
