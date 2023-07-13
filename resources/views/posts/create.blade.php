@extends('layouts.master')
@section('content')
<div class="pagetitle">
  <h1>Add Post</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href={{ url('home') }}>Home</a></li>
      <li class="breadcrumb-item"><a href={{ url('posts') }}>Post</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<div class="row justify-content-center">
  <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
    <div class="col-md-12">
      <div class="card mb-3">
        <div class="card-body">
          <div class="pt-6 pb-2"></div>
            <form method = "post" action = "{{ route('posts.store') }}" enctype="multipart/form-data" class="row g-3" novalidate>
              @csrf  
              <div class="col-8">
                <label for="yourName" class="form-label">Name<span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="yourName" placeholder="Name">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-8">
                <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                <input type="text" name="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror" id="yourName" placeholder="Description">
                @error('description')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-8">
                <label for="images" class="form-label">Images<span class="text-danger">*</span></label>
                <input type="file" name="images[]" value="{{ old('images') }}" multiple class="form-control @error('images') is-invalid @enderror" id="images" placeholder="Images">
                @error('images')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror                      
              </div>
              <div class="col-8">
                <label for="status">Status<span class="text-danger"></span></label>
                <select class="form-select" id="status" name="status">
                  <option value="">Select Status</option>
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                </select>
              </div>
              <div class="col-8">
                <button class="btn btn-primary w-10" type="submit">SAVE</button>  
                <a class="btn btn-primary" href="{{ url('posts') }}">Back</a>
              </div>     
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection