@php


    use App\Models\Service;


    $services = Service::latest()->get();


@endphp

<section class="services__style__two">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="section__title text-center">
                    <span class="sub-title">02 - my Services</span>
                    <h2 class="title">Provide awesome service</h2>
                </div>
            </div>
        </div>
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
