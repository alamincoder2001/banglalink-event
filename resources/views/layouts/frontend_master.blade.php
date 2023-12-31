<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Banglalink Youth Fest- {{date('Y')}}</title>

    @include('layouts.frontend.style')
    <style>
        #qrcode img {
            display: inline-block !important;
        }

        .modal-content {
            background-color: #ffaf00;
        }
    </style>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K85KPQBX');
    </script>
    <!-- End Google Tag Manager -->
</head>


<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K85KPQBX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @yield('content')

    <!-- footer-section2 - start================================================== -->
    <footer id="footer-section" class="footer-section footer-section2 clearfix">
        <!-- footer-top - start -->
        <div class="footer-top sec-ptb-100 clearfix" style="padding: 30px 0px;padding-bottom: 0;">
            <div class="container">
                <div class="row">
                    <!-- about-wrapper - start -->
                    <div class="col-md-12">
                        <div class="about-wrapper text-center">
                            <!-- site-logo-wrapper - start -->
                            <div class="site-logo-wrapper mb-30">
                                <a href="index-1.html" class="logo">
                                    <img style="width: 100px;" src="{{asset('frontend')}}/assets/images/logo.png" alt="logo_not_found">
                                </a>
                            </div>
                            <!-- site-logo-wrapper - end -->

                            <!-- basic-info - start -->
                            <div class="basic-info ul-li-block mb-50">
                                <ul>
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        pr@banglalink.net Tigers' Den, House 4 (SW), Bir Uttam Mir Shawkat Sharak Gulshan 1, Dhaka 1212, Bangladesh
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <a href="#!">info@banglalink.net</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-phone"></i>
                                        <a href="#!">+8801911304121</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- basic-info - end -->

                        </div>
                    </div>
                    <!-- about-wrapper - end -->
                </div>
            </div>
        </div>
        <!-- footer-top - end -->
        <div class="footer-bottom" style="padding:5px 0px;">
            <div class="container">
                <div class="row">
                    <!-- copyright-text - start -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="copyright-text text-center">
                            <p class="m-0 text-white">© 2023 - Banglalink Digital Communications Ltd. - All rights reserved</p>
                        </div>
                    </div>
                    <!-- copyright-text - end -->
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-section2 - end ================================================== -->

    @include('layouts.frontend.script')

</body>

</html>