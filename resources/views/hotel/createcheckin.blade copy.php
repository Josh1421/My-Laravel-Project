@extends('layouts.hotel')
@section('content')
<div class="container">

    <h1 class="mb-3" style="border-bottom: 2px solid black;">Check In Form</h1>
    <div class="row">
      <div class="col-12">
        <form action="#" method="post">
          @csrf
          <div class="row">
            <div class="col-6">
              <div class="row">
                <div class="col-3">
                  <div class="form-group mb-2">
                    <label for="guest_id" class="form-label">Guest ID</label>
                    <input type="text" class="form-control  @error('guest_id') is-invalid @enderror" name="guest_id" id="guest_id" value="{{ old('guest_id') }}" autocomplete="on" autofocus>

                    @error('guest_id')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-9">
                  <div class="form-group mb-2">
                    <label for="guest_fullname" class="form-label">Guest Name</label>
                    <input type="text" class="form-control  @error('guest_fullname') is-invalid @enderror" name="guest_fullname" id="guest_fullname" value="{{ old('guest_fullname') }}" autocomplete="on" autofocus>

                    @error('guest_fullname')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
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
                    <input type="date" class="form-control  @error('checkin_date') is-invalid @enderror" name="checkin_date" id="checkin_date" value="{{ old('checkin_date', Carbon::now())}}" autocomplete="checkin_date" autofocus>

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
                    <input type="date" class="form-control  @error('checkout_date') is-invalid @enderror" name="checkout_date" id="checkout_date" value="{{ old('checkout_date')}}" autocomplete="checkout_date" autofocus>

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
                    <input type="text" class="form-control  @error('number_days') is-invalid @enderror" name="number_days" id="number_days" value="{{ old('number_days') }}" autocomplete="number_days" autofocus>

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
                    <input type="text" class="form-control  @error('adults') is-invalid @enderror" name="adults" id="adults" value="{{ old('adults') }}" autocomplete="adults" autofocus>

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
                    <input type="text" class="form-control  @error('children') is-invalid @enderror" name="children" id="children" value="{{ old('children') }}">

                    @error('children')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
<script type="application/javascript">
  $(document).ready(function(){
    $("#guest_id").autocomplete({
      source: function(data, cb){
        console.log(data);
        $.ajax({
          url: '/hotel/newcheckin/'+data.term,
          method: 'GET',
          dataType: 'json',
          data: {
            name: data.term,
            fieldName: "AutoComplete"
          },
          success: function(res){
            var result;
            result = [
              {
                label: "There is no matching record found for "+data.term,
                value: ""
              }
            ];

            if (res.length){
              result = $.map(res, function(obj){
                return {
                  label: obj.first_name + " " + obj.middle_name + " " + obj.last_name,
                  value: obj.id,
                  data: obj
                };
              });
            }
            cb(result);
          }
        });
      },
      select:function(event, selectedData){
          
        if (selectedData && selectedData.item && selectedData.item.data){
          console.log(selectedData);
          var data;
          data = selectedData.item.data;
          $("#guest_fullname").val(data.first_name + " " + data.middle_name + " " + data.last_name);
        }
      }
    })
  });
</script>
@endsection
