
@extends('admin.admin_master')
@section('content')


<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Blog</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card-title">Edit Blog Category</h2>
                @php
                    $id = $blog_categories->id;
                @endphp
                <form action="{{ route('update.blog.category',$id) }}" method="post" >
                @csrf

                    <div class="row mb-3">
                        <label for="category_name" class="col-sm-2 col-form-label">Category Name: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="category_name" id="category_name" value="{{ $blog_categories->category_name }}">

                            @error('category_name')
                                <span>{{$message}}</span>
                            @enderror

                            @error('category_slug')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info m-auto">Update Category</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection

