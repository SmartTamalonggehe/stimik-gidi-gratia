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
    <title>@yield('title')</title>
    <meta name="description" content="WEBSITE GIDI GRATIA" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- CSS -->
    @include('diaken.layouts.css')
</head>

<body>
    <!-- Wrapper -->
    <div class="hk-wrapper" data-layout="navbar" data-layout-style="default" data-menu="light" data-footer="simple">
        <!-- Top Navbar -->
        @include('diaken.layouts.top-bar')
        <!-- /Top Navbar -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <div class="container-xxl">
                <!-- Page Header -->
                <div class="hk-pg-header pg-header-wth-tab pt-7">
                    <div class="d-flex">
                        <div class="d-flex flex-wrap justify-content-between flex-1">
                            <div class="mb-lg-0 mb-2 me-8">
                                <h1 class="pg-title text-capitalize">@yield('judul')</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Page Body -->
                <div class="hk-pg-body">
                    <div class="tab-content">
                        @yield('content')
                    </div>
                </div>
                <!-- /Page Body -->
            </div>

        </div>
        <!-- /Main Content -->
    </div>
    <!-- /Wrapper -->

    @include('diaken.layouts.scripts')
</body>

</html>
