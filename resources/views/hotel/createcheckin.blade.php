@extends('layouts.hotel')
@section('content')
<div class="container">
  <?php
  use Carbon\Carbon;
?>

    <h1 class="mb-3" style="border-bottom: 2px solid black;">Check In Form</h1>
    <div class="row">
      <div class="col-3" style="border-right: 2px solid black;">
        <form action="/hotel/newcheckin/selected" method="POST" name="formid">
          @csrf
          <div class="">
            <div class="">
              <label for="guest_name" class="form-label">Guest Name</label>
            </div>
            <div class="mb-3">
              <select name="guest_name" id="guest_name" class="form-control @error('guest_name') is-invalid @enderror" onchange="guest_id()">
                  <option selected="true" disabled>--Select Guest Name--</option>
                @foreach ($guests as $guest)
                  <option value="{{$guest->id}}" id="guest_id">{{$guest->first_name}} {{$guest->middle_name}} {{$guest->last_name}}</option>
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
              <select name="room_number" id="room_number" class="form-control @error('room_number') is-invalid @enderror" onchange="room_id()">
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
        </form>
      </div>
      <div class="col-9">
        <form action="#" method="post">
          @csrf
          <div class="row">
            <div class="col-6">
              <div class="form-group mb-2">
                <label for="guest_fullname" class="form-label">Guest Name</label>
                <input type="text" class="form-control  @error('guest_fullname') is-invalid @enderror" name="guest_fullname" id="guest_fullname" value="{{ old('guest_fullname') }}" autocomplete="on" autofocus>

                @error('guest_fullname')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group mb-2">
                <label for="guest_room_no" class="form-label">Room Number</label>
                <input type="text" class="form-control  @error('guest_room_no') is-invalid @enderror" name="guest_room_no" id="guest_room_no" value="{{ old('guest_room_no') }}" autocomplete="guest_room_no" autofocus>

                @error('guest_room_no')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group mb-2">
                <label for="room_type" class="form-label">Room Type</label>
                <input type="text" class="form-control  @error('room_type') is-invalid @enderror" name="room_type" id="room_type" value="{{ old('room_type') }}" autocomplete="room_type" autofocus>

                @error('room_type')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group mb-2">
                <label for="room_rate" class="form-label">Room Rate</label>
                <input type="text" class="form-control  @error('room_rate') is-invalid @enderror" name="room_rate" id="room_rate" value="{{ old('room_rate') }}" autocomplete="room_rate" autofocus>

                @error('room_rate')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="form-group mb-3">
                    <label for="checkin_date" class="form-label">Check In Date</label>
                    <input type="date" class="form-control  @error('checkin_date') is-invalid @enderror" name="checkin_date" id="checkin_date" value="{{ old('checkin_date', Carbon::now()->format('Y-m-d'))}}" autocomplete="checkin_date" autofocus>

                    @error('checkin_date')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group mb-3">
                    <label for="checkout_date" class="form-label">Check Out Date</label>
                    <input type="date" class="form-control  @error('checkout_date') is-invalid @enderror" name="checkout_date" id="checkout_date" value="">

                    @error('checkout_date')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group mb-3">
                    <label for="number_days" class="form-label">No. Of Days</label>
                    <input type="text" class="form-control  @error('number_days') is-invalid @enderror" name="number_days" id="number_days" value="{{ old('number_days') }}" onchange="changeDate()">

                    @error('number_days')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-6">
                  <div class="form-group mb-2">
                    <label for="adults" class="form-label">No. Of Adults</label>
                    <input type="number" class="form-control  @error('adults') is-invalid @enderror" name="adults" id="adults" value="{{ old('adults') }}" autocomplete="adults" autofocus>

                    @error('adults')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group mb-2">
                    <label for="children" class="form-label">No. Of Children</label>
                    <input type="number" class="form-control  @error('children') is-invalid @enderror" name="children" id="children" value="{{ old('children') }}">

                    @error('children')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="">
                <div class="">
                  <label for="discount" class="form-label">Discount Type</label>
                </div>
                <div class="mb-2">
                  <select name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" onchange="discountType()">
                      <option selected="true" disabled>--Select Discount Type--</option>
                    @foreach ($discounts as $discount )
                      <option value="{{$discount->id}}">{{$discount->discount_type}} | {{$discount->discount_rate}}</option>
                    @endforeach
                  </select>
                  @error('discount')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="">
                <div class="">
                  <label for="subtotal" class="form-label">Sub Total</label>
                </div>
                <div class="mb-2">
                  <input type="number" class="form-control  @error('subtotal') is-invalid @enderror" name="subtotal" id="subtotal" value="{{ old('subtotal') }}">

                  @error('subtotal')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="">
                <div class="">
                  <label for="advPayment" class="form-label">Advance Payment</label>
                </div>
                <div class="mb-2">
                  <input type="number" class="form-control  @error('advPayment') is-invalid @enderror" name="advPayment" id="advPayment" value="{{ old('advPayment') }}" onchange="advancePayment()">

                  @error('advPayment')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="">
                <div class="">
                  <label for="totalBalance" class="form-label">Total Balance</label>
                </div>
                <div class="mb-2">
                  <input type="number" class="form-control  @error('totalBalance') is-invalid @enderror" name="totalBalance" id="totalBalance" value="{{ old('totalBalance') }}">

                  @error('totalBalance')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Check In</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
<script type="application/javascript">
  var room_result;
  var subtotal;
  var subtotall;
  function guest_id(){
    var getid = formid.guest_name[formid.guest_name.selectedIndex].value;
    console.log(getid);
    $.ajax({
      url: '/hotel/newcheckin/'+getid,
      method: 'GET',
      dataType: 'json',
       data: {
        name: getid,
        fieldName: "AutoComplete"
      },
      success: function(res){
        var guest_result;
        result = [
          {
            label: "There is no matching record found for "+getid,
            value: ""
          }
        ];

        if (res.length){
          guest_result = $.map(res, function(obj){
            return {
              label: obj.id,
              value: obj.id,
              data: obj
            };
          });
        }
        console.log(guest_result);
        var data = guest_result[0].data;
        $("#guest_fullname").val(data.first_name + " " + data.middle_name + " " + data.last_name);
      }
    });
  }
  function room_id(){
    var getid = formid.room_number[formid.room_number.selectedIndex].value;
    console.log(getid);
    $.ajax({
      url: '/hotel/newcheckin_room/'+getid,
      method: 'GET',
      dataType: 'json',
       data: {
        name: getid,
        fieldName: "AutoComplete"
      },
      success: function(res){
        room_result = [
          {
            label: "There is no matching record found for "+getid,
            value: ""
          }
        ];

        if (res.length){
          room_result = $.map(res, function(obj){
            return {
              label: obj.id,
              value: obj.id,
              data: obj
            };
          });
        }
        console.log(room_result);
        var data = room_result[0].data;
        $("#guest_room_no").val(data.room_number);
        $("#room_type").val(data.room_type);
        $("#room_rate").val(data.room_rate);
        $("#adults").val(data.number_occupancy);
        $("#number_days").val(1);
        var numberOfDays = number_days.value;
        console.log(numberOfDays);
        var today = new Date($("#checkin_date").val());
        var newDate = today.getFullYear()+'-'+('0'+(today.getMonth()+1)).slice(-2)+'-'+('0'+(today.getDate()+Number(numberOfDays))).slice(-2);
        console.log(newDate);
        $("#checkout_date").val(newDate);
        $("#subtotal").val(data.room_rate);
        subtotal = $("#subtotal").val();
        console.log(subtotal);
      }
    });
  }
  function changeDate(){
      $("#number_days").val();
      var numberOfDays = number_days.value;
      console.log(numberOfDays);
      var today = new Date($("#checkin_date").val());
      var newDate = today.getFullYear()+'-'+('0'+(today.getMonth()+1)).slice(-2)+'-'+('0'+(today.getDate()+Number(numberOfDays))).slice(-2);
      console.log(newDate);
      $("#checkout_date").val(newDate);
      console.log(room_result[0].data.room_rate);
      $("#room_rate").val(room_result[0].data.room_rate * numberOfDays);
      $("#subtotal").val(room_result[0].data.room_rate * numberOfDays);
      subtotal = $("#subtotal").val();
  }

  function discountType(){
    var getid = discount[discount.selectedIndex].value;
    console.log(getid);
    $.ajax({
      url: '/hotel/newcheckin_discountType/'+getid,
      method: 'GET',
      dataType: 'json',
       data: {
        name: getid,
        fieldName: "AutoComplete"
      },
      success: function(res){
        var discount_result;
        discount_result = [
          {
            label: "There is no matching record found for "+getid,
            value: ""
          }
        ];

        if (res.length){
          discount_result = $.map(res, function(obj){
            return {
              label: obj.id,
              value: obj.id,
              data: obj
            };
          });
        }
        console.log(discount_result);
        var data = discount_result[0].data;
        subtotall = subtotal - (subtotal * data.discount_rate);
        $("#subtotal").val(subtotall);
      }
    });
  }

  function advancePayment(){
    var advancePayment = $("#advPayment").val();
    var totalbalance = subtotall - advancePayment;
    console.log(totalbalance);
    $("#totalBalance").val(totalbalance);
  }
</script>
@endsection
