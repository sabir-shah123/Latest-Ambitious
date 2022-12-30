<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('frontend.layouts.head')
</head>

<body class="js">
    <div class="loading " style="display: none">Loading&#8230;</div>
    <div class="sticky-left-container">
        <ul class="sticky-left">
            @php
                $socials = ['facebook_link', 'twitter_link', 'instagram_link', 'linkedin_link', 'youtube_link'];
            @endphp

            @foreach ($socials as $social)
                @php $social_icon = str_replace('_link', '', $social); @endphp
                <li>
                    <a href="{{ setting($social) ?? '' }}" target="_blank">
                        <img width="32" height="32" title="" alt=""
                            src="https://img.icons8.com/color/48/null/{{ $social_icon }}.png">
                        <p>{{ ucfirst(str_replace('_', ' ', $social)) }}</p>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>



    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    @include('frontend.layouts.notification')
    <!-- Header -->
    @include('frontend.layouts.header')
    <!--/ End Header -->
    @yield('main-content')

    @include('frontend.layouts.footer')

</body>

</html>
