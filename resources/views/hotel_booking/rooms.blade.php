@extends('layouts.sidebar.sidebar')

@section('content')

<style>
    .form_header {
        padding: 20px;
        border-bottom: 1px solid #e0e4e8;
    }
    .form_input {
        border-bottom: 1px solid #e0e4e8;
        padding: 20px 20px 30px 20px;
    }
    .btn_save {
        padding: 10px 0px;
    }

    .save {
        margin-right:5px;
        padding: 0px 13px;
    }
    .form_column {
        border: 1px solid #e0e4e8;
        border-radius: 5px;
    }
    .col-5 {
      height: 440px;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Room</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/update_room" method="POST">
          @csrf
          <input type="hidden" id="hotel_room_id" name="hotel_room_id">
          <div class="mb-3">
            <label for="room_number" class="form-label">Room</label>
            <input type="text" class="form-control" id="room_number" name="room_number">
          </div>
          <div class="mb-3">
            <label for="category_name" class="form-label">Category</label>
            <select class="form-select @error('category_name') is-invalid @enderror" id="category_name" name="category_name">
              @foreach ($room_categories as $room_category)
                <option value="{{$room_category->id}}" id="$room_category->id">{{$room_category->category}}</option>
               @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="edit_availability" class="form-label">Availability</label>
            <select class="form-select @error('availability') is-invalid @enderror" id="edit_availability" name="edit_availability">
              <option value="Available" id="available">Available</option>
              <option value="Unavailable" id="unavailable">Unavailable</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-5 bg-white p-0 form_column">
      <form action="/store_room" method="post">
        @csrf
        <div class="form_header"><h5 class="m-0">Room Form</h5></div>
        <div class="form_input">
          <div class="mb-3">
              <label for="room_number" class="form-label">Room</label>
              <input type="text" class="form-control @error('room_number') is-invalid @enderror" id="room_number" name="room_number">

              @error('room_number')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
          <div class="mb-3">
              <label for="room_category" class="form-label">Category</label>
              <select class="form-select @error('room_category') is-invalid @enderror" id="room_category" name="room_category">
                @foreach ($room_categories as $room_category)
                  <option value="{{$room_category->id}}" id="$room_category->id">{{$room_category->category}}</option>
                @endforeach
              </select>

              @error('room_category')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
          <div class="mb-3">
              <label for="availability" class="form-label">Availability</label>
              <select class="form-select @error('availability') is-invalid @enderror" id="availability" name="availability">
                  <option value="Available" id="available">Available</option>
                  <option value="Unavailable" id="unavailable">Unavailable</option>
              </select>

              @error('availability')
              <strong>{{ $message }}</strong>
              @enderror
          </div>
        </div>
        <div class="btn_save d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-sm save">Save</button>
            <button type="cancel" class="btn btn-danger btn-sm">cancel</button>
        </div>
      </form>
    </div>

    <div class="col-7 p-0">
      <div class="ms-3 bg-white form_column p-3">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col"><div class="d-flex justify-content-center">#</div></th>
              <th scope="col"><div class="d-flex justify-content-center">Category</div></th>
              <th scope="col"><div class="d-flex justify-content-center">Room</div></th>
              <th scope="col"><div class="d-flex justify-content-center">Status</div></th>
              <th scope="col"><div class="d-flex justify-content-center">Action</div></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rooms as $room )
                <tr>
                  <th scope="row">
                    <div class="d-flex justify-content-center">
                      {{ $room->id }}
                    </div>
                  </th>
                  <td class="">{{ $room->category }}</td>
                  <td class="">{{ $room->room_number }}</td>
                  @if ($room->availability == "Available")
                    <td class=""><div class="d-flex justify-content-center bg-success text-white rounded">{{ $room->availability }}</div></td>
                  @else
                    <td class=""><div class="d-flex justify-content-center bg-danger text-white rounded">{{ $room->availability }}</div></td>
                  @endif
                  <td>
                    <div class="d-flex justify-content-center">
                      <button type="button" value="{{ $room->id }}" class="btn btn-sm btn-primary me-1 editbtn">Edit</button>
                      <form action="/delete_room/{{ $room->id }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
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
    $(document).on('click', '.editbtn', function () {
      var room_id = $(this).val();
      // alert(room_id);
      $('#editModal').modal('show');

      $.ajax({
        type: "GET",
        url: "/edit_room_availability/"+room_id,
        success: function (response) {
          // console.log(response.category.category);
          $('#room_id').val(response.category.id);
          $('#room_number').val(response.category.room_number);
          $('#category_name').val(response.category.category_id);
          $('#edit_availability').val(response.category.availability);
          $('#hotel_room_id').val(response.category.id);
        }
      });
    });
  });
</script>
@endsection
