@php
    use App\Models\PartnerMultiImage;
    use App\Models\HomePartner;

    $partner_multi_image = PartnerMultiImage::all();

    $allData = HomePartner::all()->first();
    $id = $allData->id;
    $partner = HomePartner::find($id);


@endphp



<section class="partner">
    <div class="container">
        <div class="row align-items-center">


            <div class="col-lg-6">
                <ul class="partner__logo__wrap">

                    @foreach ($partner_multi_image as $single_image)

                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/partner/multiImage/'.$single_image->images) }}" alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/partner/multiImage/'.$single_image->images) }}" alt="">
                    </li>

                    @endforeach


                </ul>
            </div>


            <div class="col-lg-6">
                <div class="partner__content">
                    <div class="section__title">
                        <span class="sub-title">01 - My  Partner</span>
                        <h2 class="title">{{$partner->title}}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ asset('frontend') }}/assets/img/icons/about_icon.png" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{$partner->short_title}}</p>
                        </div>
                    </div>
                    <p>{!! $partner->short_description !!}</p>
                    <a href="contact.html" class="btn">Start a conversation</a>
                </div>
            </div>
        </div>
    </div>
</section>
