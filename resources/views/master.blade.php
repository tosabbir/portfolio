@include('includes.head')
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        @include('includes.header')
        <!-- header-area-end -->

        <!-- main-area -->
        <main>

            @yield('content')

        </main>
        <!-- main-area-end -->

        {{-- contact area include here  --}}

        @include('includes.home_contact')

        {{-- contact area include start here  --}}

        <!-- Footer-area -->
        @include('includes.footer')
        <!-- Footer-area-end -->

		<!-- JS here -->
        @include('includes.js')
    </body>
</html>
