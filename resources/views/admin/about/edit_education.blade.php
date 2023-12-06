@extends('admin.admin_master')
@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">About Edit Education</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Edit Education</h2>
                <form action="{{ route('update.education',$education->id) }}" method="post">
                @csrf

                    <div class="row mb-3">
                        <label for="education_title" class="col-sm-2 col-form-label">education Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="education_title" value="{{$education->education_title}}" id="education_title">

                            @error('education_title')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cgpa" class="col-sm-2 col-form-label">Your GPA: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="cgpa" value="{{ $education->cgpa}}" id="cgpa">

                            @error('cgpa')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="out_of" class="col-sm-2 col-form-label">Out Of GPA: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="out_of" value="{{ $education->out_of }}" id="out_of">

                            @error('out_of')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="year" class="col-sm-2 col-form-label">Year: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="year" value="{{ $education->year }}" id="year">

                            @error('year')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="short_description" class="col-sm-2 col-form-label">Short Description: </label>
                        <div class="col-sm-10">
                            <textarea name="short_description">{{ $education->short_description }}</textarea>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Update education</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>


@endsection

