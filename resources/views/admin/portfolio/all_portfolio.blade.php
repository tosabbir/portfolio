@php

@endphp


@extends('admin.admin_master')
@section('content')


<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">All</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Portfolio</a></li>
    </ol>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Portfolio </h4>
                <p class="card-title-desc">All Portfolio is here those will be show in home page and portfolio page</p>

                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Sl:</th>
                                <th>Portfolio Name</th>
                                <th>Portfolio Category</th>
                                <th>Portfolio Image</th>
                                <th>Portfolio Video Url</th>
                                <th>Portfolio Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($portfolios as $key=> $portfolio)

                            <tr>
                                <td scope="row">{{ $key+1 }}</td>
                                <td>{{ $portfolio->portfolio_name }}</td>
                                <td>{{ $portfolio->portfolio_category }}</td>
                                <td>
                                    <img src="{{ asset('/frontend/assets/img/portfolio/'.$portfolio->portfolio_image) }}" alt="portfolio image" height="100px" width="150px">

                                </td>
                                <td>
                                    <video width="150" height="100" controls>
                                        <source src="{{ $portfolio->portfolio_video_url }}" type="video/mp4">
                                      </video>

                                </td>
                                <td>{{ $portfolio->portfolio_link }}</td>
                                <td>
                                    <a href="{{ Route('edit.portfolio',$portfolio->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-pen"></i></a>

                                    <a href="{{ Route('edit.portfolio',$portfolio->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i></a>

                                    <a href="{{ Route('delete.portfolio',$portfolio->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
                <br>
                <a href="{{route('add.portfolio')}}" class="btn btn-success" type="button">Add New</a>
            </div>
        </div>
    </div>
</div>



@endsection

