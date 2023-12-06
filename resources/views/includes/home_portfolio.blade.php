@php
    use App\Models\PortfolioCategory;
    use App\Models\Portfolio;

    $portfolio_categories = PortfolioCategory::latest()->get();

@endphp



<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">04 - Portfolio</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                            role="tab" aria-controls="all" aria-selected="true">All</button>
                    </li>

                    @foreach ($portfolio_categories as $portfolio_category)

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="{{$portfolio_category->category_slug}}-tab" data-bs-toggle="tab" data-bs-target="#{{$portfolio_category->category_slug}}" type="button"
                            role="tab" aria-controls="{{$portfolio_category->category_slug}}" aria-selected="false">{{$portfolio_category->category_name}}</button>
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content" id="portfolioTabContent">

        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">

                        <div class="portfolio__active">

                            @php
                                $portfolios = Portfolio::all();
                            @endphp

                            @foreach ($portfolios as $portfolio)

                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset('/frontend/assets/img/portfolio/'.$portfolio->portfolio_image)}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{$portfolio->portfolio_name}}</span>
                                    <h4 class="title"><a href="{{ route('portfolio.details',$portfolio->id) }}">{{$portfolio->portfolio_title}}</a></h4>
                                    <a href="{{ route('portfolio.details',$portfolio->id) }}" class="link">View Details</a>
                                </div>
                            </div>

                           @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="tab-pane active" id="web-design" role="tabpanel" aria-labelledby="web-design-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @php
                                $portfolios = Portfolio::where('portfolio_slug','web-design')->get();
                            @endphp

                            @foreach ($portfolios as $portfolio)

                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset('/frontend/assets/img/portfolio/'.$portfolio->portfolio_image)}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{$portfolio->portfolio_name}}</span>
                                    <h4 class="title"><a href="portfolio-details.html">{{$portfolio->portfolio_title}}</a></h4>
                                    <a href="portfolio-details.html" class="link">View Details</a>
                                </div>
                            </div>

                           @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="graphics-design" role="tabpanel" aria-labelledby="graphics-design-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @php
                                $portfolios = Portfolio::where('portfolio_slug','graphics-design')->get();
                            @endphp

                            @foreach ($portfolios as $portfolio)

                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset('/frontend/assets/img/portfolio/'.$portfolio->portfolio_image)}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{$portfolio->portfolio_name}}</span>
                                    <h4 class="title"><a href="portfolio-details.html">{{$portfolio->portfolio_title}}</a></h4>
                                    <a href="portfolio-details.html" class="link">View Details</a>
                                </div>
                            </div>

                           @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="landing-page" role="tabpanel" aria-labelledby="landing-page-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @php
                                $portfolios = Portfolio::where('portfolio_slug','landing-page')->get();
                            @endphp

                            @foreach ($portfolios as $portfolio)

                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset('/frontend/assets/img/portfolio/'.$portfolio->portfolio_image)}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{$portfolio->portfolio_name}}</span>
                                    <h4 class="title"><a href="portfolio-details.html">{{$portfolio->portfolio_title}}</a></h4>
                                    <a href="portfolio-details.html" class="link">View Details</a>
                                </div>
                            </div>

                           @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @php
                                $portfolios = Portfolio::where('portfolio_slug','dashboard')->get();
                            @endphp

                            @foreach ($portfolios as $portfolio)

                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset('/frontend/assets/img/portfolio/'.$portfolio->portfolio_image)}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{$portfolio->portfolio_name}}</span>
                                    <h4 class="title"><a href="portfolio-details.html">{{$portfolio->portfolio_title}}</a></h4>
                                    <a href="portfolio-details.html" class="link">View Details</a>
                                </div>
                            </div>

                           @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="mobile-app" role="tabpanel" aria-labelledby="mobile-app-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @php
                              $portfolios = Portfolio::where('portfolio_slug','mobile-app')->get();
                            @endphp

                            @foreach ($portfolios as $portfolio)

                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset('/frontend/assets/img/portfolio/'.$portfolio->portfolio_image)}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{$portfolio->portfolio_name}}</span>
                                    <h4 class="title"><a href="portfolio-details.html">{{$portfolio->portfolio_title}}</a></h4>
                                    <a href="portfolio-details.html" class="link">View Details</a>
                                </div>
                            </div>

                           @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="ecommerce-website" role="tabpanel" aria-labelledby="ecommerce-website-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @php
                                $portfolios = Portfolio::where('portfolio_slug','ecommerce-website')->get();
                            @endphp

                            @foreach ($portfolios as $portfolio)

                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset('/frontend/assets/img/portfolio/'.$portfolio->portfolio_image)}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{$portfolio->portfolio_name}}</span>
                                    <h4 class="title"><a href="portfolio-details.html">{{$portfolio->portfolio_title}}</a></h4>
                                    <a href="portfolio-details.html" class="link">View Details</a>
                                </div>
                            </div>

                           @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


        @foreach ($portfolio_categories as $portfolio_category )

        <div class="tab-pane" id="{{$portfolio_category->category_slug}}" role="tabpanel" aria-labelledby="{{$portfolio_category->category_slug}}-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @php
                                $portfolios = Portfolio::where('portfolio_slug', $portfolio_category->category_slug)->get();

                                // $portfolios = Portfolio::where('portfolio_slug', $portfolio_category->category_slug);
                            @endphp

                            @foreach ($portfolios as $portfolio)

                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset('/frontend/assets/img/portfolio/'.$portfolio->portfolio_image)}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{$portfolio->portfolio_name}}</span>
                                    <h4 class="title"><a href="portfolio-details.html">{{$portfolio->portfolio_title}}</a></h4>
                                    <a href="portfolio-details.html" class="link">View Details</a>
                                </div>
                            </div>

                           @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</section>
