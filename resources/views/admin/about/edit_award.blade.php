@extends('admin.admin_master')
@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">About Edit Award</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Edit Award</h2>
                <form action="{{ route('update.award',$awards->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="award_title" class="col-sm-2 col-form-label">Award Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="award_title" value="{{$awards->award_title}}" id="award_title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="your_designation" class="col-sm-2 col-form-label">Your Designation: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="your_designation" value="{{$awards->your_designation}}" id="your_designation">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_description" class="col-sm-2 col-form-label">Short Description: </label>
                        <div class="col-sm-10">
                            <textarea name="short_description">{{$awards->short_description}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="award_image" class="col-sm-2 col-form-label">Award Image: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="award_image" id="award_image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="imageView" src="{{ asset('frontend/assets/img/images/about/award/'.$awards->award_image)}}" alt="" style="width: 15%">
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Update Award</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script>
    $(document).ready(function () {
        $('#award_image').change(function (e) {
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

