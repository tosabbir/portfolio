@extends('admin.admin_master')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Partner</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Edit Home Partner Section</h2>
                <form action="{{ route('update.home.partner',$partnerData->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" value="{{ $partnerData->title }}" id="title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_title" class="col-sm-2 col-form-label">Short Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="short_title" value="{{ $partnerData->short_title }}" id="short_title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_description" class="col-sm-2 col-form-label">Short Description: </label>
                        <div class="col-sm-10">
                            <textarea id="default" name="short_description">{{ $partnerData->short_description }}</textarea>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info m-auto">Update Partner Section</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection


