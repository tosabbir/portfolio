
@extends('admin.admin_master')
@section('content')


<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Blog</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Blog</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card-title">Add Blog </h2>

                <form action="{{ route('store.blog') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row mb-3">
                        <label for="blog_title" class="col-sm-2 col-form-label">Blog Title: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="blog_title" id="blog_title" value="{{old('blog_title')}}" required>

                            @error('blog_title')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="blog_short_description" class="col-sm-2 col-form-label">Blog Short Description: </label>
                        <div class="col-sm-10">
                           <textarea name="blog_short_description" id="default">{{old('blog_short_description')}}</textarea>

                           @error('blog_short_description')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="blog_description" class="col-sm-2 col-form-label">Blog Description: </label>
                        <div class="col-sm-10">
                           <textarea name="blog_description" id="default">{{old('blog_description')}}</textarea>

                           @error('blog_description')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="blog_tag" class="col-sm-2 col-form-label">Blog tag: </label>
                        <div class="col-sm-10">
                            <input data-role="tagsinput" class="form-control" type="text" name="blog_tag" id="blog_tag" value="{{old('blog_tag')}}"  >

                            @error('blog_tag')
                                <span>{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="blog_category" class="col-sm-2 col-form-label">Blog Category: </label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="blog_category" id="blog_category" value="{{old('blog_category')}}" >
                                <option selected="" value="0">Select Blog Category</option>
                                @foreach ($blog_categories as $blog_category)

                                <option value="{{ $blog_category->id }}">{{ $blog_category->category_name }}</option>

                                @endforeach

                            </select>
                            @error('blog_category')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="blog_image" class="col-sm-2 col-form-label">Blog Image: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="blog_image" id="blog_image" value="{{old('blog_image')}}"  >

                            @error('blog_image')
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


<style type="text/css">
    .bootstrap-tagsinput .tag{
        width: 100%;
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

<script>
    $(document).ready(function () {
        $('#blog_image').change(function (e) {
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

