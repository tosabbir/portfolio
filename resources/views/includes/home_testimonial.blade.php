
@php
    use App\Models\MultiImage\ClientMultiImage;
    use App\Models\Testimonial;

    $client_multi_image = ClientMultiImage::all();
    $testimonials = Testimonial::all();

@endphp

<section class="testimonial">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-xl-5 col-lg-6">
                <div class="testimonial__wrap">
                    <div class="section__title">
                        <span class="sub-title">06 - Client Feedback</span>
                        <h2 class="title">Happy clients feedback</h2>
                    </div>
                    <div class="testimonial__active">


                        @foreach ($testimonials as $testimonial)

                        <div class="testimonial__item">
                            <div class="testimonial__icon">
                                <img src="{{asset('frontend/assets/img/client/'.$testimonial->client_image)}}" alt="" style="border-radius: 50%">
                            </div>
                            <div class="testimonial__avatar">
                                <span>{{$testimonial->client_name}}</span>
                            </div>
                            <br>
                            <div class="testimonial__content">
                                <p>{!! $testimonial->testimonial !!}</p>
                            </div>
                        </div>

                        @endforeach

                    </div>
                    <div class="testimonial__arrow"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <ul class="partner__logo__wrap">

                    @foreach ($client_multi_image as $single_image)

                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/client/multiImage/'.$single_image->images) }}" alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/client/multiImage/'.$single_image->images) }}" alt="">
                    </li>

                    @endforeach


                </ul>
            </div>

        </div>
    </div>
    <br><br>
</section>
