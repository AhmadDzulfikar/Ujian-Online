<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app"
        style="background-image: url('assets/img/bgbg.png');background-size:cover; background-repeat: no-repeat;
    background-size: 100% 100%; background-attachment: fixed; opacity: 1; min-height: 101vh;">
        <section class="section">
            <div class="container ">
                <div style="display: flex; ">
                    <div style="max-width: 50%;">
                        <div class="login-brand"
                            style="display: flex; justify-content:start; align-items:center; gap: 20px; margin-top: 3rem;">
                            <img src="/assets/img/logo10.jpeg" alt="logo" width="100">
                            <div
                                style="text-align: start; font-family: Poppins, sans-serif; text-transform: capitalize;">
                                <div style="font-size: 30px; font-weight: 700;">SMKN 10 JAKARTA</div>
                                <div style="font-size: 26px; font-weight: 600;">
                                    <span style="color:#0EB752">Online</span>
                                    <span style="color:#F15754">Exams</span>
                                </div>
                            </div>
                        </div>
                        <img src="assets/img/img.png" width="70%" alt="">
                        <div style="position: fixed; left: 36px; bottom: 20px;">
                            &copy; TenizenCode 2023
                        </div>
                    </div>
                    <div style="display: flex; justify-content:center; width: 50%; height: 100vh; align-items:center;">
                        <div>
                            <div class="card card-shadow mb-0" style="border-radius: 5%;">
                                <div class="card-header justify-content-center" style="padding-top: 34px">
                                    <h2><span style="color: #6777EF">Log In</span></h2>
                                </div>

                                <div class="card-body" style="min-width: 312px;">
                                    <form method="POST" action="{{ route('login') }}" class="needs-validation"
                                        novalidate="">
                                        @csrf

                                        <div class="form-group">
                                            {{-- <label for="nis">Username</label> --}}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <input id="nis" type="text" class="form-control"
                                                    name="username" placeholder="Username" tabindex="1"
                                                    value="{{ old('username') }}" required autofocus>
                                            </div>
                                            <div class="invalid-feedback">
                                                Masukan Username
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="d-block">
                                                {{-- <label for="password" class="control-label">Password</label> --}}
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-lock"></i>
                                                    </div>
                                                </div>
                                                <input id="password" placeholder="Password" type="password"
                                                    class="form-control" name="password" tabindex="2" required>
                                            </div>
                                            <div class="invalid-feedback">
                                                Masukkan password
                                            </div>
                                            {{-- <div class="d-block">
                                                <div class="float-right">
                                                    <a href="auth-forgot-password.html" class="text-small">
                                                        Forgot Password?
                                                    </a>
                                                </div>
                                            </div> --}}
                                        </div>

                                        {{-- <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="remember" class="custom-control-input"
                                                        tabindex="3" id="remember-me">
                                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                                </div>
                                            </div> --}}

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"
                                                tabindex="4">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                    {{-- <div class="text-center mt-4 mb-3">
                                            <div class="text-job text-muted">Login With Social</div>
                                        </div>
                                        <div class="row sm-gutters">
                                            <div class="col-6">
                                                <a class="btn btn-block btn-social btn-facebook">
                                                    <span class="fab fa-facebook"></span> Facebook
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a class="btn btn-block btn-social btn-twitter">
                                                    <span class="fab fa-twitter"></span> Twitter
                                                </a>
                                            </div>
                                        </div> --}}

                                </div>
                            </div>
                            {{-- <div class="mt-5 text-muted text-center">
                                    <a href="/login">Login Admin</a>
                                </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="/assets/modules/jquery.min.js"></script>
    <script src="/assets/modules/popper.js"></script>
    <script src="/assets/modules/tooltip.js"></script>
    <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assets/modules/moment.min.js"></script>
    <script src="/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>

</html>
