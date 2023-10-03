<!DOCTYPE html>
<html lang="jp" data-nav-layout="horizontal">
    <head>
        <!-- Meta Data -->
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>品保ポータルサイト</title>
        <meta name="Description" content="品保ポータルサイト">
        <meta name="Author" content="品保ポータルサイト">
        <meta name="keywords" content="品保ポータルサイト">
        @include('layouts.header_component')
        @php
            $lang = app()->getLocale();
        @endphp

        <script>
            var config = <?php echo json_encode(config('constants')) ?>;
            var translations = <?php echo file_get_contents(resource_path('lang/'.$lang.'.json')); ?>;
        </script>
    </head>

    <body>
        @include('layouts.header')
        <div class="page">
            <div class="main-content app-content">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.footer')
        <div class="scrollToTop">
            <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>
        @include('layouts.footer_component')
    </body>
</html>