<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-206521710-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-206521710-1');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="p:domain_verify" content="8ed33929088c1c904d8fa9b1220f495c"/>
    <title>Vcourse</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">

    {{-- owl carosul --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    {{-- Classic Editor --}}
    {{-- <script src="https://cdn.ckeditor.com/4.17.2/basic/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>


    @yield('headScript')


</head>
{{-- <body onload="loader()">
    <div class="loader">
        <span class="loader-spinner">Loading...</span>
    </div> --}}

<body>

    @include('frontend.inc.header')


    @yield('content')


    @include('frontend.inc.footer')


    @include('frontend.inc.script')


    @yield('script')


    <script>
        $(document).ready(function() {

            // mobile menu
            var menuIcon = $("#menu-icon");
            var navBarMobile = $("#navbar-mobile");
            var navMobileCross = $("#nav-mobile-cross");
            menuIcon.click(function() {
                menuIcon.toggleClass("transformed");
                navBarMobile.toggleClass("show");
            });
            navMobileCross.click(function() {
                navBarMobile.toggleClass("show");
                menuIcon.toggleClass("transformed");
            });


        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/61e2c1b5b84f7301d32b29f8/1fpes9c3r';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
