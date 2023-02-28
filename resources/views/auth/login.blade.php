<!DOCTYPE html>
<!--
Jampack
Author: Hencework
Contact: contact@hencework.com
-->
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="description" content="Login" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- CSS -->
    @include('admin.layouts.css')
</head>

<body>
    <!-- Wrapper -->
    <div class="hk-wrapper hk-pg-auth" data-footer="simple">
        <!-- Main Content -->
        <div class="hk-pg-wrapper pt-0 pb-xl-0 pb-5">
            <div class="hk-pg-body pt-0 pb-xl-0">
                <!-- Container -->
                <div class="container-xxl">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-sm-10 position-relative mx-auto">
                            <div class="auth-content py-8">
                                <form class="w-100" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-5 col-md-7 col-sm-10 mx-auto">
                                            <div class="text-center mb-7">
                                                <a class="navbar-brand me-0" href="">
                                                    <img class="brand-img d-inline-block"
                                                        src="{{ asset('images/logo-gidi.png') }}" width="100px"
                                                        alt="brand">
                                                </a>
                                            </div>
                                            <div class="card card-lg card-border">
                                                <div class="card-body">
                                                    <h4 class="mb-4 text-center">Silahkan login untuk akses selanjutnya
                                                    </h4>
                                                    <div class="row gx-3">
                                                        <div class="form-group col-lg-12">
                                                            <div class="form-label-group">
                                                                <label>Email</label>
                                                            </div>
                                                            <input class="form-control" placeholder="Masukan email"
                                                                value="" type="text" name="email">
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            <div class="form-label-group">
                                                                <label>Password</label>
                                                            </div>
                                                            <div class="input-group password-check">
                                                                <span class="input-affix-wrapper">
                                                                    <input class="form-control"
                                                                        placeholder="Masukan password" value=""
                                                                        type="password" name="password">
                                                                    <a href="#" class="input-suffix text-muted">
                                                                        <span class="feather-icon"><i class="form-icon"
                                                                                data-feather="eye"></i></span>
                                                                        <span class="feather-icon d-none"><i
                                                                                class="form-icon"
                                                                                data-feather="eye-off"></i></span>
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-uppercase btn-block">Login</button>

                                                    <div class="col-12 mt-4">
                                                        <p class="text-center"><a href="/"
                                                                class="">Kembali</a></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /Container -->
            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /Wrapper -->

    @include('admin.layouts.scripts')
</body>

</html>
