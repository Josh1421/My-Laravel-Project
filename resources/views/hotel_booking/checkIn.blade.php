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
        <form action="/store_checkIn" method="POST">
          @csrf
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

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Guest Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <div><b>Name:  </b><p id="guestName" class="d-inline"> </p></div>
          <div><b>Room Number:  </b><p id="roomNumber" class="d-inline"> </p></div>
          <div><b>Room Category:  </b><p id="roomCategory" class="d-inline"> </p></div>
          <div><b>Contact #:  </b><p id="contactNumber" class="d-inline"> </p></div>
          <div><b>Check-in Date:  </b><p id="checkinDate" class="d-inline"> </p></div>
          <div><b>Check-out Date:  </b><p id="checkoutDate" class="d-inline"> </p></div>
          <div><b>Days of Stay:  </b><p id="daysOfStay" class="d-inline"> </p></div>
          <div><b>Sub Total:  </b><p id="subTotal" class="d-inline"> </p></div>
          <div><b>Down Payment:  </b><p id="downPayment" class="d-inline"> </p></div>
          <div><b>Total Balance:  </b><p id="totalBalance" class="d-inline"> </p></div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Check Out Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check Out</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/checkout/guest" method="post">
          @csrf
          <div>
            <div><b>Name:  </b><p id="outguestName" class="d-inline"> </p></div>
            <div><b>Sub Total:  </b><p id="outsubTotal" class="d-inline"> </p></div>
            <div><b>Down Payment:  </b><p id="outdownPayment" class="d-inline"> </p></div>
            <div><b>Balance:  </b><p id="outBalance" class="d-inline"> </p></div>

            <input type="hidden" id="checkinList_id" name="checkinList_id">
            <div class="row">
              <div class="col-6">
                <div class="my-3">
                  <label for="outTotal" class="form-label"><b>Total</b></label>
                  <input type="text" class="form-control" id="outTotal" name="outTotal" onchange="Change()">
                </div>
              </div>
              <div class="col-6">
                <div class="my-3">
                  <label for="outchange" class="form-label"><b>Change</b></label>
                  <input type="text" class="form-control" id="outchange" name="outchange">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Check Out</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-6">
      <div class="bg-white p-2 rounded">
        <div class="d-flex justify-content-center"><h4>Available Rooms</h4></div>
        <table class="table table-hover table-bordered bg-white" id="available_room">
          <thead>
            <tr>  
              <th scope="col"><div class="d-flex justify-content-center">Category</div></th>
              <th scope="col"><div class="d-flex justify-content-center">Room</div></th>
              <th scope="col" ><div class="d-flex justify-content-center">Price</div></th>
              <th scope="col" ><div class="d-flex justify-content-center">Status</div></th>
              <th scope="col"><div class="d-flex justify-content-center">Action</div></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rooms as $room)
              <tr>
                <td class="">{{ $room->category }}</td>
                <td class="">{{ $room->room_number }}</td>
                <td class="">${{ $room->price }}.00</td>
                <td class="text-center" style=""><div class="bg-success text-white rounded">{{ $room->availability }}</div></td>
                <td>
                  <div class="d-flex justify-content-center">
                    <button type="button" value="{{ $room->id }}" roomprice="{{ $room->price }}" class="btn btn-sm btn-primary me-1 checkInBtn">Check-in</button>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-6">
      <div class="bg-white p-2 rounded">
        <div class="d-flex justify-content-center"><h4>Checked-in List</h4></div>
        <table class="table table-hover table-bordered bg-white" id="available_room">
          <thead>
            <tr>  
              <th scope="col"><div class="d-flex justify-content-center">Name</div></th>
              <th scope="col"><div class="d-flex justify-content-center">Room Number</div></th>
              <th scope="col"><div class="d-flex justify-content-center">Action</div></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($checked_in_lists as $list)
              <tr>
                <td class="">{{ $list->guest_name }}</td>
                <td class="">{{ $list->room_number }}</td>
                <td>
                  <div class="d-flex justify-content-center">
                    <button type="button" value="{{ $list->id }}" class="btn btn-sm btn-primary me-1 viewbtn">View</button>
                    <button type="button" value="{{ $list->id }}" class="btn btn-sm btn-danger me-1 checkoutbtn">Check-out</button>
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
      var room_id = $(this).val();
      var room_price = $(this).attr('roomprice');;
      // alert(room_id);
      $('#checkinModal').modal('show');
      $('#hotel_room_id').val(room_id);
      $('#room_price').val(room_price);
    });
  });

  function numberOfDays(){
    var days = $("#days").val();
    var room_price = $("#room_price").val();
    var sub_total = days * room_price;
    console.log(sub_total);
    $("#sub_total").val(sub_total);

    var date_picked = $("#checkin_date").val();
    var checkout_date = new Date();
    var checkin_date = new Date(date_picked);
    checkout_date.setDate(checkin_date.getDate() + Number(days));
    var newDate = checkout_date.getFullYear()+'-'+('0'+(checkout_date.getMonth()+1)).slice(-2)+'-'+('0'+(checkout_date.getDate())).slice(-2);
    $("#guest_checkout_date").val(newDate);
    console.log(newDate);
  }

  function downPayment(){
    var down_payment = $("#down_payment").val();
    var sub_total = $("#sub_total").val();
    var total_balance = sub_total - down_payment;
    $("#total_balance").val(total_balance);
  }

  $(document).ready(function () {
    $(document).on('click', '.viewbtn', function () {
      var list_id = $(this).val();
      // alert(room_id);
      $('#viewModal').modal('show');

      $.ajax({
        type: "GET",
        url: "/view_details/"+list_id,
        success: function (response) {
          console.log(response.list.guest_name);
          document.getElementById("guestName").innerHTML = response.list.guest_name;
          document.getElementById("roomNumber").innerHTML = response.room.room_number;
          document.getElementById("roomCategory").innerHTML = response.room.category;
          document.getElementById("contactNumber").innerHTML = response.list.guest_contact;
          document.getElementById("checkinDate").innerHTML = response.list.checkin_date;
          document.getElementById("checkoutDate").innerHTML = response.list.checkout_date;
          document.getElementById("daysOfStay").innerHTML = response.list.days;
          document.getElementById("subTotal").innerHTML = response.list.sub_total;
          document.getElementById("downPayment").innerHTML = response.list.down_payment;
          document.getElementById("totalBalance").innerHTML = response.list.total_balance;
        }
      });
    });
  });

  $(document).ready(function () {
    $(document).on('click', '.checkoutbtn', function () {
      var list_id = $(this).val();
      // alert(room_id);
      $('#checkoutModal').modal('show');

      $.ajax({
        type: "GET",
        url: "/checkout/"+list_id,
        success: function (response) {
          $("#checkinList_id").val(response.list.id);
          document.getElementById("outguestName").innerHTML = response.list.guest_name;
          document.getElementById("outsubTotal").innerHTML = response.list.sub_total;
          document.getElementById("outdownPayment").innerHTML = response.list.down_payment;
          document.getElementById("outBalance").innerHTML = response.list.total_balance;
          $('#outTotal').val(response.list.total_balance);
          var balance = response.list.total_balance;
          var total = $("#outTotal").val();
          var change = total - balance;
          $('#outchange').val(change);
        }
      });
    });
  });

  function Change(){
    var balance = document.getElementById("outBalance").innerHTML;
    var total = $("#outTotal").val();
    var change = total - balance;
    $('#outchange').val(change);
  }
</script>

@endsection
