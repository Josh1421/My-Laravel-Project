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
      height: 410px;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Room Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/update_room_category" method="POST" enctype="multipart/form-data">
          @csrf

          <input type="hidden" id="category_id" name="category_id">
          <div class="mb-3">
            <label for="category_name" class="form-label">Category</label>
            <input type="text" class="form-control" id="category_name" name="category_name">
          </div>
          <div class="mb-3">
            <label for="category_price" class="form-label">Price</label>
            <input type="text" class="form-control" id="category_price" name="category_price">
          </div>
          <div class="mb-3">
            <label for="category_image" class="form-label">Image</label><br>
            <input type="file" class="form-control-file" id="category_image" name="category_image">

            @error('image')
              <strong>{{ $message }}</strong>
            @enderror
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
            <form action="/store_room_categories" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form_header"><h5 class="m-0">Room Category Form</h5></div>
                <div class="form_input">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category">

                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price">

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
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
                            <th scope="col"><div class="d-flex justify-content-center">Image</div></th>
                            <th scope="col"><div class="d-flex justify-content-center">Room</div></th>
                            <th scope="col"><div class="d-flex justify-content-center">Action</div></th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($room_categories as $room_category )
                          <tr>
                            <th scope="row">
                              <div class="d-flex justify-content-center mt-3">
                                {{ $room_category->id }}
                              </div>
                            </th>
                            <td class="d-flex justify-content-center"><img src="{{ asset('img/' . $room_category->image) }}" alt="img" width="100px;" height="80px;"></td>
                            <td class="pb-3">
                              Name: <b>{{ $room_category->category }}</b><br>
                              Price: <b>${{ $room_category->price }}.00</b>
                            </td>
                            <td>
                              <div class="d-flex justify-content-center mt-3">
                                <button type="button" value="{{ $room_category->id }}" class="btn btn-sm btn-primary me-1 editbtn">Edit</button>
                                <form action="/delete_room_category/{{ $room_category->id }}" method="get">
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
        url: "/edit_room/"+room_id,
        success: function (response) {
          // console.log(response.category.category);
          $('#category_id').val(response.category.id);
          $('#category_name').val(response.category.category);
          $('#category_price').val(response.category.price);
        }

      });
    });
  });
</script>
@endsection
