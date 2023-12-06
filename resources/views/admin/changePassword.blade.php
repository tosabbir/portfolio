@extends('admin.admin_master')
@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Change Password</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card-title">Change Password</h2>
                <form action="{{ route('admin.update.password') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row mb-3">
                        <label for="oldPassword" class="col-sm-2 col-form-label">Old Password: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="oldPassword"  id="oldPassword" >
                            @error('oldPassword')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="newPassword" class="col-sm-2 col-form-label">New Password: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="newPassword"  id="newPassword">
                            @error('newPassword')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="confirmPassword"  id="confirmPassword">
                            @error('confirmPassword')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Update Password</button>
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

