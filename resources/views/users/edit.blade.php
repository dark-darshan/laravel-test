@extends('layouts.master')
@section('content')
<div class="container">
    <div class="pagetitle">
        <h1>Edit User</h1>
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
                        <form method="post" action="{{route('users.update', $user->id)}}">
                            <div class="pt-6 pb-2"></div>
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="first_name" class="col-md-6 col-form-label text-md-start">{{ __('First Name') }}<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$user->first_name}}"  autocomplete="first_name" autofocus>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="last_name" class="col-md-6 col-form-label text-md-start">{{ __('Last Name') }}<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$user->last_name}}"  autocomplete="last_name" autofocus>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-6 col-form-label text-md-srart">{{ __('E-Mail') }}<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}"  autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-8">
                                <label for="status">Status<span class="text-danger"></span></label>
                                <select class="form-select" id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="Active" @if($user->status == 'active') selected="selected" @endif>Active</option>
                                <option value="Inactive" @if($user->status == 'inactive') selected="selected" @endif>Inactive</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-90" type="submit">{{ __('UPDATE') }}</button>
                                <a class="btn btn-primary" href="{{ url('users') }}">Back</a> 
                            </div>             
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection