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
    @include('admin.layouts.css')
</head>

<body>
    <!-- Wrapper -->
    <div class="hk-wrapper" data-layout="vertical" data-layout-style="default" data-menu="light" data-footer="simple">
        <!-- Top Navbar -->
        @include('admin.layouts.top-bar')
        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        @include('admin.layouts.vertical-nav')
        <!-- /Vertical Nav -->

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
                            <div class="pg-header-action-wrap">
                                @yield('add-button')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Page Body -->
                <div class="hk-pg-body">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
                <!-- /Page Body -->
            </div>
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /Wrapper -->

    @include('admin.layouts.scripts')
    <script>
        let route = document.getElementById('route');
        if (route) {
            route = route.textContent
        }
        const role = 'admin';
    </script>
</body>

</html>
