@php

    use App\Models\Service;

    $services = Service::latest()->limit(4)->get();

@endphp


<section class="services">
    <div class="container">
        <div class="services__title__wrap">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section__title">
                        <span class="sub-title">02 - my Services</span>
                        <h2 class="title">Creates amazing digital experiences</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-4">
                    <div class="services__arrow"></div>
                </div>
            </div>
        </div>
        <div class="row gx-0 services__active">

            @foreach ($services as $service)

            <div class="col-xl-3">
                <div class="services__item">
                    <div class="services__thumb">
                        <a href="services-details.html"><img src="{{ asset('frontend/assets/img/service/'.$service->service_image) }}" alt=""></a>
                    </div>
                    <div class="services__content">
                        <div class="services__icon">
                            <img class="light" src=" {{ asset('frontend/assets/img/service/icon/'.$service->service_icon) }} " alt="">
                            <img class="dark" src="{{ asset('frontend/assets/img/service/icon/'.$service->service_icon) }}" alt="">
                        </div>
                        <h3 class="title"><a href="services-details.html">{{$service->service_category}}</a></h3>
                        <p>{!! substr($service->service_short_details, 0,  500)!!}</p>

                        <a href="{{ route('details.service',$service->id) }}" class="btn border-btn">Read more</a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>
