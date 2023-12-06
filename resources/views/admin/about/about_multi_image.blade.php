@php
    use App\Models\MultiImage\AboutMultiImage;

    $multiImages = AboutMultiImage::all();
@endphp


@extends('admin.admin_master')
@section('content')


<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">About</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">MultiImage</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card-title">Add Photos</h2>
                <form action="{{ route('store.about.multi.image') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="images" class="col-sm-2 col-form-label">Images: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="images[]" id="images" multiple ="" >

                            @error('images')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info m-auto">Add Photos</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">About Multi Image</h4>
                <p class="card-title-desc">This image will upload on home page about section</p>

                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Sl:</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($multiImages as $key => $image)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td><img src="{{ asset('frontend/assets/img/images/about/multiImage/'.$image->images) }}" alt="" style="height: 100px" width="100px"></td>
                                    <td>
                                        <a href="{{ route('about.multi.image.edit', $image->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-pen"></i></a>
                                        <a href="{{ route('about.multi.image.delete', $image->id) }}" class="btn btn-info btn-sm" ></i><i class="fa fa-trash"></i></a>
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
