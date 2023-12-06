@extends('admin.admin_master')
@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Client</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">MultiImage</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card-title">Edit Photo</h2>
                @php
                    $id = $singleImage->id;
                @endphp
                <form action="{{ route('update.client.multi.image',$id) }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Images: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="imageView" src="{{ asset('frontend/assets/img/client/multiImage/'.$singleImage->images)}}" alt="" style="width: 15%">
                        </div>
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Update Photo</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script>
    $(document).ready(function () {
        $('#image').change(function (e) {
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

