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
        .modal-content{
            background-color: #ffaf00;
        }
    </style>
</head>


<body>
    <!-- preloader - start -->
    <!-- <div id="preloader"></div> -->
    <!-- preloader - end -->

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
                                    <img style="width: 100px;background: white;" src="{{asset('frontend')}}/assets/images/logo.png" alt="logo_not_found">
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i>Re Print Register</i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form onsubmit="ReprintSubmit(event)">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="phone" placeholder="Enter Phone Number" class="form-control shadow-none" autocomplete="off"/>
                                <span class="text-white phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.frontend.script')
</body>

</html>