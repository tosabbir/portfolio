@extends('admin.admin_master')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Service </a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Edit Service</h2>
                <form action="{{ route('update.service',$service->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="service_category" class="col-sm-2 col-form-label">Service Category: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="service_category" value="{{ $service->service_category }}" id="service_category">

                            @error('service_category')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="service_title" class="col-sm-2 col-form-label">Service Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="service_title" value="{{ $service->service_title }}" id="service_title">

                            @error('service_title')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="service_short_details" class="col-sm-2 col-form-label">Service Short Details: </label>
                        <div class="col-sm-10">
                            <textarea id="default" name="service_short_details">{{ $service->service_short_details }}</textarea>
                        </div>

                        @error('service_short_details')
                            <span>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="service_details" class="col-sm-2 col-form-label">Service Details: </label>
                        <div class="col-sm-10">
                            <textarea id="default" name="service_details">{{ $service->service_details }}</textarea>
                        </div>

                        @error('service_details')
                            <span>{{$message}}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="service_icon" class="col-sm-2 col-form-label">Service Icon: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="service_icon" id="service_icon">

                            @error('service_icon')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="IconView" src="{{asset('frontend/assets/img/service/icon/'.$service->service_icon)}}" alt="" style="width: 15%">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="service_image" class="col-sm-2 col-form-label">Service Image: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="service_image" id="service_image">

                            @error('service_image')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="imageView" src="{{asset('frontend/assets/img/service/'.$service->service_image)}}" alt="" style="width: 15%">
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Update Service</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>



<script>
    $(document).ready(function () {
        $('#service_icon').change(function (e) {
            e.preventDefault();
            var reader = new FileReader;
            reader.onload = function(){
                $('#IconView').attr('src', reader.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

    $(document).ready(function () {
        $('#service_image').change(function (e) {
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


