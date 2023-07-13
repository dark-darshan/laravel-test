@extends('layouts.master')
@section('content')
<div class="container">
    <div class="pagetitle">
        <h1>Edit Post</h1>
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
                        <form method="post" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
                            <div class="pt-6 pb-2"></div>
                            @csrf
                            @method('PUT')
                            <div class="col-8">
                                <label for="yourName" class="form-label">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name',$post->name) }}" class="form-control @error('name') is-invalid @enderror" id="yourName" placeholder="Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-8">
                                <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                <input type="text" name="description" value="{{ old('description',$post->description) }}" class="form-control @error('description') is-invalid @enderror" id="yourName" placeholder="Description">
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @foreach ($post->images as $image)
                                <div>
                                    <img src="{{ asset('image/post/'.$image)}}" style="width: 60px; height:60px;" alt="Image">
                                    <input type="checkbox" id="myCheckbox" name="delete_images[]" data-post-id="{{ $post->id }}" value="{{ $image }}" class="delete-image"> Delete
                                </div>
                            @endforeach
                            <div class="col-8">
                                <label for="images" class="form-label">Images<span class="text-danger">*</span></label>
                                <input type="file" name="images[]" value="{{ old('images') }}" class="form-control @error('images') is-invalid @enderror" id="images" placeholder="Images">
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
                                <option value="Active" @if($post->status == 'active') selected="selected" @endif>Active</option>
                                <option value="Inactive" @if($post->status == 'inactive') selected="selected" @endif>Inactive</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-90" type="submit">{{ __('UPDATE') }}</button>
                                <a class="btn btn-primary" href="{{ url('posts') }}">Back</a> 
                            </div>             
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-image').change(function() {
            if ($(this).is(':checked')) {
                var image = $(this).val();
                var postId = $(this).data('post-id');
                var deleteUrl = "{{ route('images.delete', ['image' => ':image', 'post' => '']) }}";
                deleteUrl = deleteUrl.replace(':image', encodeURIComponent(image)) + postId;

                $.ajax({
                    url: deleteUrl,
                    data: {
                        post: postId,
                        image: image
                    },
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response.message);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
        $('#myCheckbox').change(function() {
            if (this.checked) {
                location.reload();
            }
        });
    });
</script>
@endsection