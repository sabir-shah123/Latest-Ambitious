<!-- Meta Tag -->
@yield('meta')
<!-- Title Tag  -->
<title>  {{ dbsetting('company_name') }} | @yield('title')</title>
<!-- Favicon -->
<link rel="icon" type="image/png" href="images/favicon.png">
<!-- Web Font -->
<link
    href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
    rel="stylesheet">

<!-- StyleSheet -->
<link rel="manifest" href="/manifest.json">
<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.min.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}">
<!-- Fancybox -->
<link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">
<!-- Themify Icons -->
<link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/niceselect.css') }}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
<!-- Flex Slider CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/flex-slider.min.css') }}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{ asset('frontend/css/owl-carousel.css') }}">
<!-- Slicknav -->
<link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}">
<!-- Jquery Ui -->
<link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">

<!-- Eshop StyleSheet -->
<link rel="stylesheet" href="{{ asset('frontend/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


{{-- social icons --}}
<style>
    /*Right Side Buttons Start*/
    .sticky-left-container .sticky-container {
        padding: 0px;
        margin: 0px;
        position: fixed;
        right: -119px;
        top: 130px;
        width: 200px;
    }

    .sticky-left-container .sticky li {
        list-style-type: none;
        background-color: #333;
        color: #efefef;
        height: 43px;
        padding: 0px;
        margin: 0px 0px 1px 0px;
        -webkit-transition: all 0.25s ease-in-out;
        -moz-transition: all 0.25s ease-in-out;
        -o-transition: all 0.25s ease-in-out;
        transition: all 0.25s ease-in-out;
        cursor: pointer;
        filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale");
        filter: gray;
        -webkit-filter: grayscale(100%);
    }

    .sticky-left-container.sticky li:hover {
        margin-left: -115px;
        filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
        -webkit-filter: grayscale(0%);
    }

    .sticky-left-container .sticky li img {
        float: left;
        margin: 5px 5px;
        margin-right: 10px;
    }

    .sticky-left-container .sticky li p {
        float: left;
        padding: 0px;
        margin: 0px;
        text-transform: uppercase;
        line-height: 43px;
    }

    /*Right Side Buttons End*/

    /*Left Side Buttons Start*/
    .sticky-left-container {
        padding: 0px;
        margin: 0px;
        position: fixed;
        left: -158px;
        top: 40%;
        width: 200px;
        z-index: 2;
    }

    .sticky-left-container .sticky-left li {
        list-style-type: none;
        background-color: none;
        color: #efefef;
        height: 43px;
        padding: 0px;
        margin: 0px 0px 1px 0px;
        -webkit-transition: all 0.25s ease-in-out;
        -moz-transition: all 0.25s ease-in-out;
        -o-transition: all 0.25s ease-in-out;
        transition: all 0.25s ease-in-out;
        cursor: pointer;
    }

    .sticky-left-container .sticky-left li:hover {
        margin-right: -150px;
        background: #333;
        border-radius: 25px 25px 25px 0;
    }

    .sticky-left-container .sticky-left li img {
        float: right;
        border-radius: 50%;
        margin: 5px 5px;
        margin-left: 10px;
    }

    .sticky-left-container .sticky-left li p {
        padding: 0px;
        float: right;
        margin: 0px;
        text-transform: uppercase;
        line-height: 43px;
    }

    /*Left Side Buttons End*/
</style>


<style>
    /* Multilevel dropdown */
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>a:after {
        content: "\f0da";
        float: right;
        border: none;
        font-family: 'FontAwesome';
    }

    .single-footer .logo {
        height: 100px;
        width: 100px;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: 0px;
        margin-left: 0px;
    }

    .header.shop .logo {
        height: 80px;
        width: 80px;
        margin: 0;
    }

    #Gslider .carousel-inner .carousel-caption {
        top: 50px;
        bottom: auto !important;
    }

    /* .shop-home-list .single-list img{
      height : 165px !important;
    } */

    .single-product img {
        height: 260px;
    }

    /*
</style>
<style>
    /* Absolute Center Spinner */

    .loading {
        position: fixed;
        z-index: 99999999999999999;
        height: 2em;
        width: 2em;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }

    /* .hide{
            display: none;
        } */

    /* Transparent Overlay */
    .loading:before {
        content: '';
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));

        background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
    }

    /* :not(:required) hides these rules from IE9 and below */
    .loading:not(:required) {
        /* hide "loading..." text */
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
    }

    .loading:not(:required):after {
        content: '';
        display: block;
        font-size: 10px;
        width: 1em;
        height: 1em;
        margin-top: -0.5em;
        -webkit-animation: spinner 150ms infinite linear;
        -moz-animation: spinner 150ms infinite linear;
        -ms-animation: spinner 150ms infinite linear;
        -o-animation: spinner 150ms infinite linear;
        animation: spinner 150ms infinite linear;
        border-radius: 0.5em;
        -webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
        box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
    }

    /* Animation */

    @-webkit-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-moz-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-o-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
</style>
@stack('styles')
