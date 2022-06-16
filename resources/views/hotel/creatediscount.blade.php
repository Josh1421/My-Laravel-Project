@extends('layouts.hotel')

@section('content')
<div class="container">

  <div class="col-8 offset-2">
    <div class="row">
      <div class="col-6">
        <form action="/hotel/discount/store" method="POST">
          @csrf
          <h1 class="mb-4" style="border-bottom: 2px solid black;">Discounts</h1>
          <div class="row  form-group d-flex align-items-center mb-2">
            <div class="col-4">
              <label for="discount_type" class="form-label">Discount Type</label>
            </div>
            <div class="col-7">
              <input type="text" class="form-control  @error('discount_type') is-invalid @enderror" name="discount_type" id="discount_type" value="{{ old('discount_type') }}" autocomplete="discount_type" autofocus>
              @error('discount_type')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="row form-group d-flex align-items-center mb-2">
            <div class="col-4">
              <label for="discount_rate" class="form-label">Discount Rate(%)</label>
            </div>
            <div class="col-7">
              <input type="text" class="form-control  @error('discount_rate') is-invalid @enderror" name="discount_rate" id="discount_rate" value="{{ old('discount_rate') }}" autocomplete="discount_rate" autofocus>
              @error('discount_rate')
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
        <h1 class="mb-3" style="border-bottom: 2px solid black;">Discount List</h1>
        <div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Type</th>
                <th scope="col">Rate</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($discounts as $discount )
                <tr>
                  <th scope="row">{{ $discount->id }}</th>
                  <td>{{ $discount->discount_type }}</td>
                  <td>{{ $discount->discount_rate }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
    
</div>
@endsection