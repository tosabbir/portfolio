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
                        <h2 class="title">Service Details</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Service Details</li>
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
                        <video width="100%" controls>
                            <source src="{{$service->service_video_url}}" type="video/mp4">
                        </video>
                    </div>
                    <div class="services__details__content">
                        <h2 class="title">{{$service->service_title}}</h2>
                        <p>{!! $service->service_details !!}</p>

                        <div class="services__details__img">
                            <div class="row">
                                <div class="col-sm-6">
                                    <img src="{{asset('frontend/assets/img/service/'.$service->service_image)}}" alt="portfolio Image">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="services__sidebar">


                        <div class="widget">
                            <h5 class="title">Get in Touch</h5>
                            <form action="{{ route('store.comment.service',$service->id) }}" method="post" class="sidebar__contact">
                                @csrf
                                <input type="text" placeholder="Enter your name*" name="user_name" value="{{ old('user_name') }}" required>
                                    @error('user_name')
                                        <span>{{$message}}</span>
                                    @enderror
                                    <div class="col-md-6">
                                        <input type="email" placeholder="Enter your mail*" name="user_email" value="{{ old('user_email') }}" required>
                                        @error('user_email')
                                            <span>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="phone" placeholder="Enter your number*" name="user_phone" value="{{ old('user_phone') }}" required>
                                        @error('user_phone')
                                            <span>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <textarea name="message" id="message" placeholder="Enter your Massage*">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span>{{$message}}</span>
                                    @enderror
                                <button type="submit" class="btn">send massage</button>
                            </form>
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
