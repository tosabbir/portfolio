@php
    use App\Models\HomeAbout;
    use App\Models\MultiImage\AboutMultiImage;
    use App\Models\Skill;
    use App\Models\Award;
    use App\Models\Education;

    $allData = HomeAbout::all()->first();
    $id = $allData->id;
    $homeAboutData = HomeAbout::find($id);


    $allAbouteMultiIMage = AboutMultiImage::all();

    $skills = Skill::all();

    $awards = Award::all();

    $educations = Education::all();
@endphp



@extends('master')
@section('content')


            <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">About me</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About Me</li>
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

            <!-- about-area -->
            <section class="about about__style__two">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about__image">
                                <img src="{{ !empty($homeAboutData->about_image)? asset('backend/assets/images/home/'.$homeAboutData->about_image) : asset('backend/assets/images/home/banner_img.png')}}" alt="">
                            </div>
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
                                        <p><span>{{ $homeAboutData->short_title}}</p>
                                    </div>
                                </div>
                                <p class="desc">{{ $homeAboutData->short_description}}</p>
                                <a href="about.html" class="btn">Download my resume</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="about__info__wrap">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button"
                                            role="tab" aria-controls="about" aria-selected="true">About</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button"
                                            role="tab" aria-controls="skills" aria-selected="false">Skills</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="awards-tab" data-bs-toggle="tab" data-bs-target="#awards" type="button"
                                            role="tab" aria-controls="awards" aria-selected="false">awards</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button"
                                            role="tab" aria-controls="education" aria-selected="false">education</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                                        <p class="desc">

                                            {!! $homeAboutData->long_description !!}
                                        </p>
                                    </div>

                                    <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                                        <div class="about__skill__wrap">
                                            <div class="row">

                                                @foreach ($skills as $skill)

                                                <div class="col-md-6">
                                                    <div class="about__skill__item">
                                                        <h5 class="title">{{$skill->skill_name}}</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: {{$skill->skill_percentage}}%;" aria-valuenow=" {{$skill->skill_percentage}}" aria-valuemin="0" aria-valuemax="100"><span class="percentage">{{$skill->skill_percentage}}%</span></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="awards" role="tabpanel" aria-labelledby="awards-tab">
                                        <div class="about__award__wrap">
                                            <div class="row justify-content-center">

                                                @foreach ($awards as $award)

                                                <div class="col-md-6 col-sm-9">
                                                    <div class="about__award__item">
                                                        <div class="award__logo">
                                                            <img src="{{ asset('/frontend/assets/img/images/about/award/'.$award->award_image) }}" alt="">
                                                        </div>
                                                        <div class="award__content">
                                                            <h5 class="title">{{$award->award_title}}</h5>
                                                            <h5 style="font-family:monospace;" class="text-warning text-lg">{{$award->your_designation}}</h5>
                                                            <p>{{$award->short_description}}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                                        <div class="about__education__wrap">
                                            <div class="row">

                                                @foreach ($educations as $education)

                                                <div class="col-md-6">
                                                    <div class="about__education__item">
                                                        <h2 class="title">{{$education->education_title}}</h2>
                                                        <h5 style="font-family:monospace;" class="text-dark text-lg">CGPA: {{ $education->cgpa }} Out Of {{ $education->out_of }}</h5>
                                                        <span class="date">{{ $education->year }}</span>
                                                        <p>{{$education->short_description}}</p>
                                                    </div>
                                                </div>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- services-area -->
            @include('includes.service')
            <!-- services-area-end -->

            <!-- testimonial-area -->
            @include('includes.home_testimonial')
            <!-- testimonial-area-end -->

            <!-- blog-area -->
            @include('includes.home_blog')
            <!-- blog-area-end -->

@endsection
