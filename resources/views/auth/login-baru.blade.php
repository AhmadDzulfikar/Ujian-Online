<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>

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
    <style>
        html {
            font-size: 62.5%;
        }

        .noscroll {
            overflow: hidden
        }

        body {
            font-size: 1.5em;
            line-height: 1.6;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
            color: #555555;
            overflow-x: hidden;
        }

        img {
            height: auto;
        }

        .hpanel {
            position: absolute;
            top: 0;
            bottom: 0;
            height: 100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            color: #fff
        }

        .leftpan {
            left: -4%;
            width: 60%;
            -webkit-transform: skew(8deg);
            -moz-transform: skew(8deg);
            -o-transform: skew(8deg);
        }

        .leftpan .background-img {
            background-color: #;
        }

        .rightpan {
            right: -4%;
            width: 59%;
            -webkit-transform: skew(-8deg);
            -moz-transform: skew(-8deg);
            -o-transform: skew(-8deg);
        }

        .rightpan .background-img {
            background-color: #6777EF;
        }

        .background-img {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;

        }

        .leftpan .content-area {
            -webkit-transform: skew(-8deg);
            -moz-transform: skew(-8deg);
            -o-transform: skew(-8deg);

        }

        .rightpan .content-area {
            -webkit-transform: skew(8deg);
            -moz-transform: skew(8deg);
            -o-transform: skew(8deg);
        }

        .content-area {
            text-align: left;
            margin: 5vh auto;
            width: 350px;
        }

        .content-area h2 {
            font-size: 2.8rem;
            margin-bottom: 50px;
            color: #000;
        }

        .content-area h1 {
            color: #6777EF;
        }

        .btn-area {
            margin-top: 50px
        }

        .btn-area a {
            padding: 13px 0;
            width: 70%;
            text-align: center;
            background-color: #fff;
            border-radius: 50px;
            display: inline-block;
            font-size: 18px;
            font-weight: 500;
            text-decoration: none;
            color: #000;
            letter-spacing: 1px;
        }
    </style>
    <!-- /END GA -->
</head>

<body>
    <div class="app">
        <div class="section hpanel leftpan">
            <div class="background-img">
                <div class="content-area">
                    <h2>
                        <img src="assets/img/logo10.jpeg" width="25%" alt="">SMKN 10 JAKARTA
                    </h2>
                    <img src="assets/img/img.png" width="100%" alt="">
                </div>
            </div>
        </div>
        <div class="section hpanel rightpan" style="align-items: center;">
            <div class="background-img" >
                <div class="content-area" >
                    <section class="section d-flex justify-content-center " >
                        <div class="container mt-5">
                            <div class="row">
                                <div class="card shadow" style="border-radius: 5%;">
                                    <div class="card-header justify-content-center ">
                                        <h1>Log In</h1>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}" class="needs-validation"
                                            novalidate="">
                                            @csrf

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    <input id="nis" type="text" class="form-control"
                                                        name="username" tabindex="1" value="{{ old('username') }}"
                                                        required autofocus placeholder="username">
                                                </div>
                                                <div class="invalid-feedback">
                                                    Login
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    <input id="password" type="password" class="form-control"
                                                        name="password" tabindex="2" required placeholder="password">
                                                </div>
                                                <div class="invalid-feedback">
                                                    Masukkan password
                                                </div>
                                                <div class="d-block">
                                                    <div class="float-right">
                                                        <a href="auth-forgot-password.html" class="text-small">
                                                            Forgot Password?
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block"
                                                    tabindex="4">
                                                    Login
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
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
