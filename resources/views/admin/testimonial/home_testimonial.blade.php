@extends('admin.admin_master')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Testimonial</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Add Testimonial</h2>
                <form action="{{ route('store.testimonial') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="client_name" class="col-sm-2 col-form-label">Client Name: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="client_name" value="{{ old('client_name')}}" id="client_name">

                            @error('client_name')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="testimonial" class="col-sm-2 col-form-label">Testimonial: </label>
                        <div class="col-sm-10">
                            <textarea id="default" name="testimonial">{{ old('testimonial') }}</textarea>
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
                            <img id="imageView" src="{{asset('backend/assets/images/home/banner_img.png')}}" alt="" style="width: 15%">
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Add Testimonial</button>
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
                                <th>Client Name</th>
                                <th>Testimonial</th>
                                <th>Client Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($testimonials as $key=> $testimonial)

                            <tr>
                                <td scope="row">{{ $key+1 }}</td>
                                <td>{{ $testimonial->client_name }}</td>
                                <td>{!! $testimonial->testimonial  !!}</td>
                                <td>
                                    <img src="{{ asset('/frontend/assets/img/client/'.$testimonial->client_image) }}" alt="client image" height="100px" width="150px">

                                </td>
                                <td>
                                    <a href="{{ Route('edit.testimonial',$testimonial->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-pen"></i></a>

                                    <a href="{{ Route('delete.testimonial',$testimonial->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-trash"></i></a>
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


