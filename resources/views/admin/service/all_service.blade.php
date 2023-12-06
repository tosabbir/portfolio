@extends('admin.admin_master')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Service</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Add Service</h2>
                <form action="{{ route('store.service') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="service_category" class="col-sm-2 col-form-label">Service Category: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="service_category" value="{{ old('service_category')}}" id="service_category">

                            @error('service_category')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="service_title" class="col-sm-2 col-form-label">Service Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="service_title" value="{{ old('service_title')}}" id="service_title">

                            @error('service_title')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="service_short_details" class="col-sm-2 col-form-label">Service Short Details: </label>
                        <div class="col-sm-10">
                            <textarea id="default" name="service_short_details">{{ old('service_short_details') }}</textarea>
                        </div>

                        @error('service_short_details')
                            <span>{{$message}}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="service_details" class="col-sm-2 col-form-label">Service Details: </label>
                        <div class="col-sm-10">
                            <textarea id="default" name="service_details">{{ old('service_details') }}</textarea>
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
                            <img id="IconView" src="{{asset('backend/assets/images/home/banner_img.png')}}" alt="" style="width: 15%">
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
                            <img id="imageView" src="{{asset('backend/assets/images/home/banner_img.png')}}" alt="" style="width: 15%">
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Add Service</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Testimonial </h4>
                <p class="card-title-desc">All Testimonial is here those will be show in testimonial page </p>

                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Sl:</th>
                                <th>Service Category</th>
                                <th>Service Title</th>
                                <th>Service Icon</th>
                                <th>Service Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($services as $key=> $service)

                            <tr>
                                <td scope="row">{{ $key+1 }}</td>
                                <td>{{ $service->service_category }}</td>
                                <td>{{ $service->service_title }}</td>

                                <td>
                                    <img src="{{ asset('/frontend/assets/img/service/icon/'.$service->service_icon) }}" alt="service icon" height="100px" width="150px">

                                </td>
                                <td>
                                    <img src="{{ asset('/frontend/assets/img/service/'.$service->service_image) }}" alt="service image" height="100px" width="150px">

                                </td>
                                <td>
                                    <a href="{{ Route('edit.service',$service->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-pen"></i></a>

                                    <a href="{{ Route('edit.service',$service->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i></a>

                                    <a href="{{ Route('delete.service',$service->id) }}" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
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


