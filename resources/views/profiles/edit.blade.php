@extends('layouts.app')

@section('content')
<div class="container">

  <form action="/profile/{{ $user->profile->id }}" method="post" enctype="multipart/form-data">

    @csrf
    @method('PATCH')
    <div class="col-8 offset-2">
      <div class="row">
        <h1>Edit Profile</h1>
      </div>
      
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

        @error('title')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control  @error('description') is-invalid @enderror" cols="30" rows="5" autocomplete="description" autofocus>{{ old('description') ?? $user->profile->description }}</textarea>

        @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="url" class="form-label">URL/Website</label>
        <input type="text" class="form-control  @error('url') is-invalid @enderror" name="url" id="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>

        @error('url')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Profile Image</label>
        <input type="file" name="image" id="image" class="form-control-file"><br/>
        
        @error('image')
          <strong>{{ $message }}</strong>
        @enderror
      </div>
    
      <button type="submit" class="btn btn-primary">Update Profile</button>
    </div>
  </form>   

</div>
@endsection
