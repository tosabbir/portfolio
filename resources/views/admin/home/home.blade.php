@extends('admin.admin_master')
@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">banner</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Edit Home Banner</h2>
                <form action="{{ route('update.home') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" value="{{ $homeSlideData->title }}" id="title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_title" class="col-sm-2 col-form-label">Short description: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="short_title" name="short_title" value="{{ $homeSlideData->short_title }}" id="short_title">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="video_url" class="col-sm-2 col-form-label">Video Url: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="video_url" id="video_url" value="{{ $homeSlideData->video_url }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="home_slide" class="col-sm-2 col-form-label">Home Image: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="home_slide" id="home_slide">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="imageView" src="{{ !empty($homeSlideData->home_slide)? asset('backend/assets/images/home/'.$homeSlideData->home_slide) : asset('backend/assets/images/home/banner_img.png')}}" alt="" style="width: 15%">
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Update Home</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>


<script>
    $(document).ready(function () {
        $('#home_slide').change(function (e) {
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

