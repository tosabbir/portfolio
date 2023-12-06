@php

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
                        <h2 class="title">Portfolio Details</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Portfolio Details</li>
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

     <!-- portfolio-details-area -->
     <section class="services__details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="services__details__thumb">
                       <img src="{{asset('frontend/assets/img/portfolio/'.$portfolio->portfolio_image)}}" alt="">
                    </div>
                    <div class="services__details__content">
                        <h2 class="title">{{$portfolio->portfolio_name}}</h2>
                        <p>{{$portfolio->portfolio_description}}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="services__sidebar">
                        <div class="widget">
                            <h5 class="title">Get in Touch</h5>
                            <form action="#" class="sidebar__contact">
                                <input type="text" placeholder="Enter name*">
                                <input type="email" placeholder="Enter your mail*">
                                <textarea name="message" id="message" placeholder="Massage*"></textarea>
                                <button type="submit" class="btn">send massage</button>
                            </form>
                        </div>
                        <div class="widget">
                            <h5 class="title">Project Information</h5>
                            <ul class="sidebar__contact__info">
                                <li><span>Date :</span> {{$portfolio->portfolio_date}}</li>
                                <li><span>Location :</span> {{$portfolio->portfolio_location}}</li>
                                <li><span>Client :</span> {{$portfolio->portfolio_client}}</li>
                                <li class="cagegory"><span>Category :</span>
                                    <a href="portfolio.html">{{$portfolio->portfolio_category}}</a>
                                    <a href="portfolio.html">{{$portfolio->portfolio_slug}}</a>
                                </li>
                                <li><span>Project Link :</span> <a href="portfolio-details.html">{{$portfolio->portfolio_link}}</a></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="title">Contact Information</h5>
                            <ul class="sidebar__contact__info">
                                <li><span>Address :</span> 8638 Amarica Stranfod, <br> Mailbon Star</li>
                                <li><span>Mail :</span> yourmail@gmail.com</li>
                                <li><span>Phone :</span> +7464 0187 3535 645</li>
                                <li><span>Fax id :</span> +9 659459 49594</li>
                            </ul>
                            <ul class="sidebar__contact__social">
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br>
    <!-- portfolio-details-area-end -->

@endsection
