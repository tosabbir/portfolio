@php

@endphp


@extends('admin.admin_master')
@section('content')


<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Portfolio</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card-title">Add Portfolio Category</h2>

                <form action="{{ route('store.portfolio.category') }}" method="post" >
                @csrf

                    <div class="row mb-3">
                        <label for="category_name" class="col-sm-2 col-form-label">Category Name: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="category_name" id="category_name">

                            @error('category_name')
                                <span>{{$message}}</span>
                            @enderror

                            @error('category_slug')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info m-auto">Add Category</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Portfolio Categories</h4>
                <p class="card-title-desc">This Portfolio Categories will use to make slug for portfolio</p>

                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Sl:</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($portfolio_categories as $key=> $portfolio_category)

                                <tr>
                                    <td scope="row">{{ $key+1 }}</td>
                                    <td>{{ $portfolio_category->category_name }}</td>
                                    <td>{{ $portfolio_category->category_slug }}</td>
                                    <td>
                                        <a href="{{ route('portfolio.category.edit',$portfolio_category->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-pen"></i></a>
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

