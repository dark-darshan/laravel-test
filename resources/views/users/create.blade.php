@extends('layouts.master')
@section('content')
<div class="pagetitle">
  <h1>Add User</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href={{ url('home') }}>Home</a></li>
      <li class="breadcrumb-item"><a href={{ url('users') }}>User</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<div class="row justify-content-center">
  <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
    <div class="col-md-12">
      <div class="card mb-3">
        <div class="card-body">
          <div class="pt-6 pb-2"></div>
            <form method = "post" action = "{{ route('users.store') }}" class="row g-3" novalidate>
              @csrf  
              <div class="col-8">
                <label for="yourName" class="form-label">First Name<span class="text-danger">*</span></label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" id="yourName" placeholder="First Name">
                @error('first_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-8">
                <label for="yourName" class="form-label">Last Name<span class="text-danger">*</span></label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" id="yourName" placeholder="Last Name">
                @error('last_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-8">
                <label for="yourEmail" class="form-label">Your Email<span class="text-danger">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="yourEmail" placeholder="email">
                @error('email')
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
                <label for="yourPassword" class="form-label">Password<span class="text-danger">*</span></label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="yourPassword" placeholder="password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror                      
              </div>
              <div class="col-8">
                <label for="yourPassword" class="form-label">Confirm Password<span class="text-danger">*</span></label>
                <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control @error('confirm_password') is-invalid @enderror" id="yourPassword" placeholder="confirm password">
                @error('confirm_password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror                      
              </div>
              <div class="col-8">
                <button class="btn btn-primary w-10" type="submit">SAVE</button>  
                <a class="btn btn-primary" href="{{ url('users') }}">Back</a>
              </div>     
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection