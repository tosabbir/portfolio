@extends('admin.admin_master')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Testimonial</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Edit Testimonial</h2>
                <form action="{{ route('update.testimonial', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="client_name" class="col-sm-2 col-form-label">Client Name: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="client_name" value="{{ $testimonial->client_name }}" id="client_name">

                            @error('client_name')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="testimonial" class="col-sm-2 col-form-label">Testimonial: </label>
                        <div class="col-sm-10">
                            <textarea id="default" name="testimonial">{{ $testimonial->testimonial}}</textarea>
                        </div>

                        @error('testimonial')
                            <span>{{$message}}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="client_image" class="col-sm-2 col-form-label">Client Image: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="client_image" id="client_image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="imageView" src="{{ !empty($testimonial->client_image)? asset('frontend/assets/img/client/'.$testimonial->client_image) : asset('backend/assets/images/home/banner_img.png')}}" alt="" style="width: 15%">
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Update Testimonial</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>




<script>
    $(document).ready(function () {
        $('#client_image').change(function (e) {
            e.preventDefault();
            var reader = new FileReader;
            reader.onload = function(){
                $('#imageView').attr('src', reader.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection


