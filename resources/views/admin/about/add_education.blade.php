@extends('admin.admin_master')
@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">About Education</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Add Education</h2>
                <form action="{{ route('store.education') }}" method="post">
                @csrf

                    <div class="row mb-3">
                        <label for="education_title" class="col-sm-2 col-form-label">Education Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="education_title" value="{{ old('education_title') }}" id="education_title">

                            @error('education_title')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cgpa" class="col-sm-2 col-form-label">Your GPA: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="cgpa" value="{{ old('cgpa') }}" id="cgpa">

                            @error('cgpa')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="out_of" class="col-sm-2 col-form-label">Out Of GPA: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="out_of" value="{{ old('out_of') }}" id="out_of">

                            @error('out_of')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="year" class="col-sm-2 col-form-label">Year: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="year" value="{{ old('year') }}" id="year">

                            @error('year')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="short_description" class="col-sm-2 col-form-label">Short Description: </label>
                        <div class="col-sm-10">
                            <textarea  name="short_description">{{ old('short_description') }}</textarea>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Add Education</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All educations </h4>
                <p class="card-title-desc">All educations is here those will be show in about page education secion</p>

                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Sl:</th>
                                <th>Education Title</th>
                                <th>CGPA</th>
                                <th>Out Of</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($educations as $key=> $education)

                            <tr>
                                <td scope="row">{{ $key+1 }}</td>
                                <td>{{ $education->education_title }}</td>
                                <td>{{ $education->cgpa }}</td>
                                <td>{{ $education->out_of }}</td>
                                <td>{{ $education->year }}</td>

                                <td>
                                    <a href="{{ Route('edit.education',$education->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-pen"></i></a>

                                    <a href="{{ Route('edit.education',$education->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i></a>

                                    <a href="{{ Route('delete.education',$education->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-trash"></i></a>
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


@endsection

