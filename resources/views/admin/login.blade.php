

<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/upcube/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 16:22:01 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Login | Upcube - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href=" {{ asset('backend') }}/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href=" {{ asset('backend') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href=" {{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href=" {{ asset('backend') }}/assets/css/Untitled-1.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index-2.html" class="auth-logo">
                                    <img src=" {{ asset('backend') }}/assets/images/logo-dark.png" height="30" class="logo-dark mx-auto" alt="">
                                    <img src=" {{ asset('backend') }}/assets/images/logo-light.png" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>

                        <h4 class="text-muted text-center font-size-18"><b> Admin Login</b></h4>

                        <div class="p-3">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <label for="email">Your Email</label>
                                        <input class="form-control" id="email" type="email" name="email" required autofocus placeholder="example@gmail.com" autocomplete="email">
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <label for="password">Your Password</label>
                                        <input class="form-control" id="password"  type="password" name="password" required autocomplete="current-password" placeholder="*******">
                                    </div>
                                </div>
                                {{-- Remamber Me  --}}
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                            <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>

                                <div class="form-group mb-0 row mt-2">
                                    <div class="col-sm-7 mt-3">
                                        <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src=" {{ asset('backend') }}/assets/libs/jquery/jquery.min.js"></script>
        <script src=" {{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src=" {{ asset('backend') }}/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src=" {{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
        <script src=" {{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>

        <script src=" {{ asset('backend') }}/assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesdesign.in/upcube/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 16:22:01 GMT -->
</html>
