<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Website News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="12345678-gbgin9h7q69rpjehq1cd2441b4nosnid.apps.googleusercontent.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    @yield('css')
    <link rel="stylesheet" href="{{ asset('frontend/style/header.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fullpage/fullpage.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/font-awesome-4.7.0/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/wowjs/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fancybox-master/dist/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/style/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/post.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/category/css/style.css') }}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</head>

<body class="body">
    @include('includes.frontend.header')
    @yield('content')

    @include('includes.frontend.footer')
    <script src="{{ asset('frontend/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/fullpage/fullpage.js') }}"></script>
    <script src="{{ asset('frontend/vendor/fancybox-master/dist/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/vendor/slick/slick.js') }}"></script>
    <script src="{{ asset('frontend/vendor/wowjs/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/javascript/app.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        if ($(window).width() > 1200) {
            $('.main-wrapper .section-contact').bind('mousewheel', (event) => {
                $('.section-footer').addClass('active');
                $('.main-wrapper .section-contact .container-master').addClass('active');
            })
        }
    </script>
</body>

</html>