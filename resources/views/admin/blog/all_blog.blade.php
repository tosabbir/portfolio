@php

@endphp


@extends('admin.admin_master')
@section('content')


<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">All</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Blog</a></li>
    </ol>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Blog </h4>
                <p class="card-title-desc">All Blog is here those will be show in home page and Blog page</p>

                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Sl:</th>
                                <th>Blog Title</th>
                                <th>Blog Category</th>
                                <th>Blog Img</th>
                                <th>Posted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($blogs as $key=> $blog)

                            <tr>
                                <td scope="row">{{ $key+1 }}</td>
                                <td>{{ $blog->blog_title }}</td>
                                <td>{{ $blog->blog_category }}</td>
                                <td>
                                    <img src="{{ asset('/frontend/assets/img/blog/'.$blog->blog_image) }}" alt="blog image" height="100px" width="150px">

                                </td>
                                <td>{{ $blog->created_at }}</td>
                                <td>
                                    <a href="{{ Route('edit.blog',$blog->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-pen"></i></a>

                                    <a href="{{ Route('edit.blog',$blog->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i></a>

                                    <a href="{{ Route('delete.blog',$blog->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
                <br>
                <a href="{{route('add.blog')}}" class="btn btn-success" type="button">Add New</a>
            </div>
        </div>
    </div>
</div>



@endsection

