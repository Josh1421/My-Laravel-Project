@extends('layouts.app')

@section('content')
<div class="container">

  <form action="/p" method="post" enctype="multipart/form-data">

    @csrf
    <div class="col-8 offset-2">
      <div class="row">
        <h1>Add New Post</h1>
      </div>
      
      <div class="mb-3">
        <label for="caption" class="form-label">Post Caption</label>
        <input type="text" class="form-control  @error('caption') is-invalid @enderror" name="caption" id="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

        @error('caption')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>
        <input type="file" name="image" id="image" class="form-control-file"><br/>
        
        @error('image')
          <strong>{{ $message }}</strong>
        @enderror
      </div>
    
      <button type="submit" class="btn btn-primary">Add New Post</button>
    </div>
  </form>   

</div>
@endsection
