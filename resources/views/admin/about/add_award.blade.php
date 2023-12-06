@extends('admin.admin_master')
@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">About Award</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Add Award</h2>
                <form action="{{ route('store.award') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="award_title" class="col-sm-2 col-form-label">Award Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="award_title" value="{{ old('award_title') }}" id="award_title" required>

                            @error('award_title')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="your_designation" class="col-sm-2 col-form-label">Your Designation: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="your_designation" value="{{ old('your_designation') }}" id="your_designation" required>

                            @error('your_designation')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_description" class="col-sm-2 col-form-label">Short Description: </label>
                        <div class="col-sm-10">
                            <textarea name="short_description">{{ old('short_description') }}</textarea>

                            @error('short_description')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="award_image" class="col-sm-2 col-form-label">Award Image: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="award_image" id="award_image">

                            @error('award_image')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="imageView" src="asset('backend/assets/images/home/banner_img.png')" alt="" style="width: 15%">
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Add Award</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Awards </h4>
                <p class="card-title-desc">All awards is here those will be show in about page award secion</p>

                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Sl:</th>
                                <th>Award Title</th>
                                <th>Your Designaion</th>
                                <th>Award Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($awards as $key=> $award)

                            <tr>
                                <td scope="row">{{ $key+1 }}</td>
                                <td>{{ $award->award_title }}</td>
                                <td>{{ $award->your_designation }}</td>
                                <td>
                                    <img src="{{ asset('/frontend/assets/img/images/about/award/'.$award->award_image) }}" alt="award image" height="150px" width="150px">

                                </td>

                                <td>
                                    <a href="{{ Route('edit.award',$award->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-pen"></i></a>

                                    <a href="{{ Route('edit.award',$award->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i></a>

                                    <a href="{{ Route('delete.award',$award->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-trash"></i></a>
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

