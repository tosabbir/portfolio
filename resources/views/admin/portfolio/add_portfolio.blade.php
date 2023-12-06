
@extends('admin.admin_master')
@section('content')


<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Portfolio</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card-title">Add Portfolio </h2>

                <form action="{{ route('store.portfolio') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="portfolio_name" class="col-sm-2 col-form-label">Portfolio Name: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="portfolio_name" id="portfolio_name" value="{{old('portfolio_name')}}" required>

                            @error('portfolio_name')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="portfolio_title" class="col-sm-2 col-form-label">Portfolio Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="portfolio_title" id="portfolio_title" value="{{old('portfolio_title')}}" required >

                            @error('portfolio_title')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="default" class="col-sm-2 col-form-label">Portfolio Short Description: </label>
                        <div class="col-sm-10">
                           <textarea name="portfolio_short_description" id="default" cols="30" rows="10" required>{{old('portfolio_short_description')}}</textarea>

                           @error('portfolio_short_description')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="portfolio_description" class="col-sm-2 col-form-label">Portfolio Description: </label>
                        <div class="col-sm-10">
                           <textarea name="portfolio_description" id="default" cols="30" rows="10" required>{{old('portfolio_description')}}</textarea>

                           @error('portfolio_description')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="portfolio_date" class="col-sm-2 col-form-label">Portfolio Date: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="datetime-local" name="portfolio_date" id="portfolio_date" value="{{old('portfolio_date')}}" required>

                            @error('portfolio_date')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="portfolio_location" class="col-sm-2 col-form-label">Portfolio Location: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="portfolio_location" id="portfolio_location" value="{{old('portfolio_location')}}" required >

                            @error('portfolio_location')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="portfolio_client" class="col-sm-2 col-form-label">Portfolio Client: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="portfolio_client" id="portfolio_client" value="{{old('portfolio_client')}}" required >

                            @error('portfolio_client')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="portfolio_link" class="col-sm-2 col-form-label">Portfolio Link: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="portfolio_link" id="portfolio_link" value="{{old('portfolio_link')}}" required >

                            @error('portfolio_link')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="portfolio_video_url" class="col-sm-2 col-form-label">Portfolio Video Url: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="portfolio_video_url" id="portfolio_video_url" value="{{old('portfolio_video_url')}}" required >

                            @error('portfolio_video_url')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="portfolio_category" class="col-sm-2 col-form-label">Portfolio Category: </label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="portfolio_category" id="portfolio_category" value="{{old('portfolio_category')}}" required>

                                @foreach ($portfolio_categories as $portfolio_category)

                                <option value="{{ $portfolio_category->id }}">{{ $portfolio_category->category_name }}</option>

                                @endforeach

                            </select>
                            @error('portfolio_category')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="portfolio_image" class="col-sm-2 col-form-label">Portfolio Image: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="portfolio_image" id="portfolio_image" value="{{old('portfolio_image')}}" required >

                            @error('portfolio_image')
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

                    <button type="submit" class="btn btn-info m-auto">Add Item</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>




<script>
    $(document).ready(function () {
        $('#portfolio_image').change(function (e) {
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

