@extends('admin.admin_master')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">About</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Edit Home About Section</h2>
                <form action="{{ route('update.home.about') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" value="{{ $aboutData->title }}" id="title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_title" class="col-sm-2 col-form-label">Short Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="short_title" value="{{ $aboutData->short_title }}" id="short_title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_description" class="col-sm-2 col-form-label">Short Description: </label>
                        <div class="col-sm-10">
                            <textarea id="default" name="short_description">{{ $aboutData->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="long_description" class="col-sm-2 col-form-label">Long Description: </label>
                        <div class="col-sm-10">
                            <textarea id="default" name="long_description">{{ $aboutData->long_description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="about_image" class="col-sm-2 col-form-label">About Image: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="about_image" id="about_image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="imageView" src="{{ !empty($aboutData->about_image)? asset('backend/assets/images/home/'.$aboutData->about_image) : asset('backend/assets/images/home/banner_img.png')}}" alt="" style="width: 15%">
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Update About</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script>
    $(document).ready(function () {
        $('#about_image').change(function (e) {
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


