@extends('master')

@section('content')

            <!-- banner-area -->
            @include('includes.home_banner')
            <!-- banner-area-end -->

            <!-- about-area -->
            @include('includes.home_about')
            <!-- about-area-end -->

            <!-- services-area -->
            @include('includes.home_services')
            <!-- services-area-end -->

            <!-- work-process-area -->
            @include('includes.home_workProcess')
            <!-- work-process-area-end -->

            <!-- portfolio-area -->
            @include('includes.home_portfolio')
            <!-- portfolio-area-end -->

            <!-- partner-area -->
            @include('includes.home_partner')
            <!-- partner-area-end -->

            <!-- testimonial-area -->
            @include('includes.home_testimonial')
            <!-- testimonial-area-end -->

            <!-- blog-area -->
            @include('includes.home_blog')
            <!-- blog-area-end -->

@endsection
