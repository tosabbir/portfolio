@php
    use App\Models\HomeAbout;
    use App\Models\MultiImage\AboutMultiImage;

    $allData = HomeAbout::all()->first();
    $id = $allData->id;
    $homeAboutData = HomeAbout::find($id);

    $allAbouteMultiIMage = AboutMultiImage::all();
@endphp



<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach ( $allAbouteMultiIMage as $singleImage)
                        <li>
                            <img class="light" src="{{ ('frontend/assets/img/images/about/multiImage/'.$singleImage->images) }}" alt="XD">
                            <img class="dark" src="{{ ('frontend/assets/img/images/about/multiImage/'.$singleImage->images) }}" alt="XD">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{ $homeAboutData->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ asset('frontend') }}/assets/img/icons/about_icon.png" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $homeAboutData->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc"> {!! $homeAboutData->short_description !!} </p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>
