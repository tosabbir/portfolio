@php
    use App\Models\HomeAbout;
    use App\Models\MultiImage\AboutMultiImage;


    $allAbouteMultiIMage = AboutMultiImage::all();

@endphp


@extends('master')
@section('content')

    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">My Portfolio</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                @foreach ( $allAbouteMultiIMage as $singleImage)
                    <li><img src="{{ ('frontend/assets/img/images/about/multiImage/'.$singleImage->images) }}" alt=""></li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- portfolio-area -->
    <section class="portfolio__inner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio__inner__nav">
                        <button class="active" data-filter="*">all</button>

                        @foreach ($portfolio_categories as $portfolio_category)

                            <button data-filter=".{{$portfolio_category->category_slug}}">{{$portfolio_category->category_name}}</button>

                        @endforeach


                    </div>
                </div>
            </div>
            <div class="portfolio__inner__active">
                @foreach ($portfolios as $portfolio)

                    <div class="portfolio__inner__item grid-item {{$portfolio->portfolio_slug}}">
                        <div class="row gx-0 align-items-center">
                            <div class="col-lg-6 col-md-10">
                                <div class="portfolio__inner__thumb">
                                    <a href="{{route('portfolio.details',$portfolio->id)}}">
                                       <img src="{{asset('frontend/assets/img/portfolio/'.$portfolio->portfolio_image)}}" height="450px" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-10">
                                <div class="portfolio__inner__content">
                                    <h2 class="title"><a href="portfolio-details.html">{{$portfolio->portfolio_title}}</a></h2>

                                    <p>{{$portfolio->portfolio_short_description}}</p>

                                    <a href="{{ route('portfolio.details',$portfolio->id) }}" class="link">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
        <div class="pagination-wrap">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-right"></i></a></li>
                </ul>
            </nav>
        </div>
        <br><br><br><br><br><br>
    </section>
    <!-- portfolio-area-end -->


@endsection
