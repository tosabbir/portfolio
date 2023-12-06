
@php

    use App\Models\MultiImage\AboutMultiImage;
    use App\Models\Service;



    $services = Service::all();
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
                                <h2 class="title">My Service</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">My Service</li>
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


            <section class="services__style__two">
                <div class="container">
                    <div class="services__style__two__wrap">

                        <div class="row gx-0">

                            @foreach ($services as $service)

                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="services__style__two__item">
                                    <div class="services__style__two__icon">
                                        <img src=" {{ asset('frontend/assets/img/service/icon/'.$service->service_icon) }} " alt="">
                                    </div>
                                    <div class="services__style__two__content">
                                        <h3 class="title"><a href="services-details.html">{{$service->service_category}}</a></h3>
                                        <p>{!! substr($service->service_short_details, 0,  100) !!}</p>
                                        <a href="{{ route('details.service',$service->id) }}" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>


                    </div>
                </div>
            </section>

            @include('includes.home_testimonial');
            <br><br><br><br><br><br><br><br><br><br><br>
@endsection
