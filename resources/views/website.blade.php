@extends('layouts.frontend_master')

@section('content')

<!-- header-section - start================================================== -->
<header id="header-section" class="header-section not-stuck clearfix">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 p-0 position-relative">
                <!-- header-bottom - start -->
                <div class="header-bottom position-absolute px-2 py-3" style="left: 25px;top: 5px;z-index: 999;">
                    <div class="site-logo-wrapper">
                        <a href="{{url('/')}}" class="logo">
                            <img src="{{asset('frontend')}}/assets/images/logo.png" style="width: 100px;" alt="logo_not_found">
                        </a>
                    </div>
                </div>
                <!-- header-bottom - end -->

                <!-- slide-section - start ================================================== -->
                <section id="slide-section" class="slide-section clearfix">
                    <div id="main-carousel1" class="main-carousel1 owl-carousel owl-theme">

                        <div class="item" style="background-image: url({{asset('frontend')}}/assets/images/slider/slider-bg1.jpg);">

                            <div class="container">
                                <div class="slider-item-content">
                                    <h1 class="big-text">Banglalink Youth Fest - {{date('Y')}}</h1>
                                    <small class="small-text">every event sould be perfect</small>

                                    <div class="link-groups">
                                        <a href="about.html" class="about-btn custom-btn">about us</a>
                                        <a href="#!" class="start-btn">get started!</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="item" style="background-image: url({{asset('frontend')}}/assets/images/slider/slider-bg2.jpg);">

                            <div class="container">
                                <div class="slider-item-content">
                                    <h1 class="big-text">AIUB Youth Fest - {{date('Y')}}</h1>
                                    <small class="small-text">every event sould be perfect</small>

                                    <div class="link-groups">
                                        <a href="about.html" class="about-btn custom-btn">about us</a>
                                        <a href="#!" class="start-btn">get started!</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="item" style="background-image: url({{asset('frontend')}}/assets/images/slider/slider-bg3.jpg);">

                            <div class="container">
                                <div class="slider-item-content">
                                    <h1 class="big-text">NSU Youth Fest - {{date('Y')}}</h1>
                                    <small class="small-text">every event sould be perfect</small>

                                    <div class="link-groups">
                                        <a href="about.html" class="about-btn custom-btn">about us</a>
                                        <a href="#!" class="start-btn">get started!</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- slide-section - end ================================================== -->
            </div>
            <div class="col-md-3 headerevent-section overlay-black p-0">
                <div class="tab-wrapper">
                    <div class="tab-menu">
                        <ul class="nav tab-nav mb-25">
                            <li class="nav-item">
                                <a class="nav-link" id="nav-one-tab" data-toggle="tab" href="#nav-one" aria-expanded="true">
                                    <span class="image">
                                        <img src="{{asset('frontend')}}/assets/images/conference/RCJAKPP_00016_coddddnversion.jpg" alt="Image_not_found">
                                    </span>
                                    <small class="sub-title d-block text-center">AIUB 24<sup>th</sup> July</small>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-two-tab" data-toggle="tab" href="#nav-two" aria-expanded="false">
                                    <span class="image">
                                        <img src="{{asset('frontend')}}/assets/images/conference/fresh-conference-room-microphones-decoration-ideas-collection-gallery-to-conference-room-microphones-home-ideas.jpg" alt="Image_not_found">
                                    </span>
                                    <small class="sub-title d-block text-center">NSU 26<sup>th</sup> July</small>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-three-tab" data-toggle="tab" href="#nav-three" aria-expanded="false">
                                    <span class="image">
                                        <img src="{{asset('frontend')}}/assets/images/conference/RCTORON_00047ss.jpg" alt="Image_not_found">
                                    </span>
                                    <small class="sub-title d-block text-center">UIU 27<sup>th</sup> July</small>
                                </a>
                            </li>
                        </ul>
                        <div class="text-center mt-5">
                            <a href="#!" class="custom-btn">
                                <strong class="text-white">VIEW ALL</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-section - end ================================================== -->

<!-- special-offer-section - start ================================================== -->
<section id="special-offer-section" class="special-offer-section clearfix" style="background-image: url({{asset('frontend')}}/assets/images/special-offer-bg.jpg);">
    <div class="container">
        <div class="row">

            <!-- special-offer-content - start -->
            <div class="col-md-8">
                <div class="special-offer-content">
                    <h2><strong>Banglalink Youth Fest-{{date('Y')}}</strong></h2>
                </div>
            </div>
            <!-- special-offer-content - end -->

            <!-- event-makeing-btn - start -->
            <div class="col-md-4 p-md-0">
                <div class="event-makeing-btn" style="display:flex;justify-content: space-between;">
                    <a href="#" onclick="RegisterShow(event)">register</a>
                    <a href="#" onclick="Reprint(event)">re-print</a>
                </div>
            </div>
            <!-- event-makeing-btn - end -->

        </div>
    </div>
</section>
<!-- special-offer-section - end ================================================== -->

<!-- register-section - start ================================================== -->
<section id="contact-section" style="padding: 45px 0;background:#ff590a;" class="contact-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">

                <h2 class="big-title text-center" style="font-size: 48px;font-weight: 900;color: white;">Register</h2>
                <!-- contact-form - start -->
                <div class="contact-form form-wrapper">
                    <form onsubmit="Register(event)">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-item">
                                    <input type="text" name="name" placeholder="Your Name" autocomplete="off">
                                    <span class="text-white error-name d-none"></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-item">
                                    <input type="phone" name="phone" placeholder="Phone Number" autocomplete="off">
                                    <span class="text-white error-phone d-none"></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-item">
                                    <input type="email" name="email" placeholder="Email Address" autocomplete="off">
                                    <span class="text-white error-email d-none"></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-item">
                                    <select name="university" id="event-category-select">
                                        <option value="">Choose University</option>
                                        <option value="AIUB">AIUB</option>
                                        <option value="NSU">NSU</option>
                                    </select>
                                    <span class="text-white error-university d-none"></span>
                                </div>
                            </div>

                            <div class="col-sm-12 text-right">
                                <div class="form-item mb-0 text-left">
                                    <textarea name="address" placeholder="Your Address"></textarea>
                                    <span class="text-white error-address d-none"></span>
                                </div>
                                <button type="submit" class="custom-btn">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- contact-form - end -->

            </div>
        </div>

    </div>
</section>
<!-- register-section - end ================================================== -->


<!-- event-section - start ================================================== -->
<section id="event-section" class="event-section sec-ptb-100 bg-gray-light clearfix">
    <div class="container">
        <div class="mb-25">
            <div class="row">

                <!-- section-title - start -->
                <div class="col-md-12">
                    <div class="section-title text-left">
                        <h2 class="big-title"><strong>Youth Fest event</strong> listing</h2>
                    </div>
                </div>
                <!-- section-title - end -->

            </div>
        </div>

        <!-- tab-content - start -->
        <div class="tab-content">
            <!-- conference-event - start -->
            <div id="conference-event" class="tab-pane fade active show">
                <div class="row">
                    <!-- event-item - start -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <div class="post-date">
                                    <span class="date">24</span>
                                    <small class="month">July</small>
                                </div>
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <div class="event-title mb-15">
                                    <h3 class="title">
                                        AIUB Campus - 24<sup>th</sup> July 2023
                                    </h3>
                                </div>
                                <div class="event-post-meta ul-li-block mb-30">
                                    <ul>
                                        <li>
                                            <span class="icon">
                                                <i class="far fa-clock"></i>
                                            </span>
                                            Start 20:00pm - 22:00pm
                                        </li>
                                        <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            AIUB Campus, Dhaka
                                        </li>
                                    </ul>
                                </div>
                                <a href="#!" class="tickets-details-btn">
                                    tickets & details
                                </a>
                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <div class="post-date">
                                    <span class="date">24</span>
                                    <small class="month">July</small>
                                </div>
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <div class="event-title mb-15">
                                    <h3 class="title">
                                        AIUB Campus - 24<sup>th</sup> July 2023
                                    </h3>
                                </div>
                                <div class="event-post-meta ul-li-block mb-30">
                                    <ul>
                                        <li>
                                            <span class="icon">
                                                <i class="far fa-clock"></i>
                                            </span>
                                            Start 20:00pm - 22:00pm
                                        </li>
                                        <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            AIUB Campus, Dhaka
                                        </li>
                                    </ul>
                                </div>
                                <a href="#!" class="tickets-details-btn">
                                    tickets & details
                                </a>
                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <div class="post-date">
                                    <span class="date">24</span>
                                    <small class="month">July</small>
                                </div>
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <div class="event-title mb-15">
                                    <h3 class="title">
                                        AIUB Campus - 24<sup>th</sup> July 2023
                                    </h3>
                                </div>
                                <div class="event-post-meta ul-li-block mb-30">
                                    <ul>
                                        <li>
                                            <span class="icon">
                                                <i class="far fa-clock"></i>
                                            </span>
                                            Start 20:00pm - 22:00pm
                                        </li>
                                        <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            AIUB Campus, Dhaka
                                        </li>
                                    </ul>
                                </div>
                                <a href="#!" class="tickets-details-btn">
                                    tickets & details
                                </a>
                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <div class="post-date">
                                    <span class="date">24</span>
                                    <small class="month">July</small>
                                </div>
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <div class="event-title mb-15">
                                    <h3 class="title">
                                        AIUB Campus - 24<sup>th</sup> July 2023
                                    </h3>
                                </div>
                                <div class="event-post-meta ul-li-block mb-30">
                                    <ul>
                                        <li>
                                            <span class="icon">
                                                <i class="far fa-clock"></i>
                                            </span>
                                            Start 20:00pm - 22:00pm
                                        </li>
                                        <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            AIUB Campus, Dhaka
                                        </li>
                                    </ul>
                                </div>
                                <a href="#!" class="tickets-details-btn">
                                    tickets & details
                                </a>
                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <!-- event-item - end -->

                </div>
            </div>
            <!-- conference-event - end -->
        </div>
        <!-- tab-content - end -->

    </div>
</section>
<!-- event-section - end ================================================== -->






<!-- event-gallery-section - start ================================================== -->
<section id="event-gallery-section" class="event-gallery-section sec-ptb-100 clearfix">
    <!-- section-title - start -->
    <div class="section-title text-center mb-50">
        <h2 class="big-title">Gallery</strong></h2>
    </div>
    <!-- section-title - end -->

    <div class="button-group filters-button-group mb-30">
        <button class="button is-checked" data-filter="*">
            <i class="fas fa-star"></i>
            <strong>all</strong> gallery
        </button>
        <button class="button" data-filter=".video-gallery">
            <i class="fas fa-play-circle"></i>
            <strong>video</strong> gallery
        </button>
        <button class="button" data-filter=".photo-gallery">
            <i class="far fa-image"></i>
            <strong>photo</strong> gallery
        </button>
    </div>

    <div class="grid zoom-gallery clearfix mb-80" data-isotope="{ &quot;masonry&quot;: { &quot;columnWidth&quot;: 0 } }">
        <div class="grid-item grid-item--height2 photo-gallery " data-category="photo-gallery">
            <a class="popup-link" href="{{asset('frontend')}}/assets/images/gallery/1.image.jpg">
                <img src="{{asset('frontend')}}/assets/images/gallery/1.image.jpg" alt="Image_not_found">
            </a>
            <div class="item-content">
                <h3>John Doe Wedding day</h3>
                <span>Wedding Party, 24 June 2016</span>
            </div>
        </div>
        <div class="grid-item grid-item--width2 video-gallery " data-category="video-gallery">
            <a class="popup-youtube" href="https://youtu.be/-haiaZ011OM">
                <img src="{{asset('frontend')}}/assets/images/gallery/2.image.jpg" alt="Image_not_found">
            </a>
            <div class="item-content">
                <h3>Business Conference in Dubai</h3>
                <span>Food Festival, 24 June 2016</span>
            </div>
        </div>
        <div class="grid-item photo-gallery " data-category="photo-gallery">
            <a class="popup-link" href="{{asset('frontend')}}/assets/images/gallery/3.image.jpg">
                <img src="{{asset('frontend')}}/assets/images/gallery/3.image.jpg" alt="Image_not_found">
            </a>
            <div class="item-content">
                <h3>Envato Author Fun Hiking</h3>
                <span>Food Festival, 24 June 2016</span>
            </div>
        </div>

        <div class="grid-item photo-gallery " data-category="photo-gallery">
            <a class="popup-link" href="{{asset('frontend')}}/assets/images/gallery/4.image.jpg">
                <img src="{{asset('frontend')}}/assets/images/gallery/4.image.jpg" alt="Image_not_found">
            </a>
            <div class="item-content">
                <h3>John Doe Wedding day</h3>
                <span>Wedding Party, 24 June 2016</span>
            </div>
        </div>
        <div class="grid-item grid-item--width2 video-gallery " data-category="video-gallery">
            <a class="popup-youtube" href="https://youtu.be/-haiaZ011OM">
                <img src="{{asset('frontend')}}/assets/images/gallery/5.image.jpg" alt="Image_not_found">
            </a>
            <div class="item-content">
                <h3>New Year Celebration</h3>
                <span>Food Festival, 24 June 2016</span>
            </div>
        </div>

        <div class="grid-item grid-item--width2 photo-gallery " data-category="photo-gallery">
            <a class="popup-link" href="{{asset('frontend')}}/assets/images/gallery/6.image.jpg">
                <img src="{{asset('frontend')}}/assets/images/gallery/6.image.jpg" alt="Image_not_found">
            </a>
            <div class="item-content">
                <h3>John Doe Wedding day</h3>
                <span>Wedding Party, 24 June 2016</span>
            </div>
        </div>
        <div class="grid-item video-gallery " data-category="video-gallery">
            <a class="popup-youtube" href="https://youtu.be/-haiaZ011OM">
                <img src="{{asset('frontend')}}/assets/images/gallery/7.image.jpg" alt="Image_not_found">
            </a>
            <div class="item-content">
                <h3>New Year Celebration</h3>
                <span>Food Festival, 24 June 2016</span>
            </div>
        </div>
        <div class="grid-item photo-gallery " data-category="photo-gallery">
            <a class="popup-link" href="{{asset('frontend')}}/assets/images/gallery/8.image.jpg">
                <img src="{{asset('frontend')}}/assets/images/gallery/8.image.jpg" alt="Image_not_found">
            </a>
            <div class="item-content">
                <h3>Envato Author Fun Hiking</h3>
                <span>Food Festival, 24 June 2016</span>
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="#!" class="custom-btn">view all gallery</a>
    </div>


</section>
<!-- event-gallery-section - end ================================================== -->

<!-- event-section - start ================================================== -->
<section id="entertainment-section" style="background:#000000 !important;" class="event-section sec-ptb-100 bg-gray-light clearfix">
    <div class="container">

        <div class="mb-25">
            <div class="row">

                <!-- section-title - start -->
                <div class="col-md-12">
                    <div class="section-title text-left">
                        <h2 class="big-title text-white"><strong>Games and Entertainment</strong></h2>
                    </div>
                </div>
                <!-- section-title - end -->

            </div>
        </div>

        <!-- tab-content - start -->
        <div class="tab-content">
            <!-- conference-event - start -->
            <div id="conference-event" class="tab-pane fade active show">
                <div class="row">
                    <!-- event-item - start -->
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <h3 class="title text-center">
                                    AIUB Campus - 24<sup>th</sup> July 2023
                                </h3>
                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <h3 class="title text-center">
                                    AIUB Campus - 24<sup>th</sup> July 2023
                                </h3>

                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <h3 class="title text-center">
                                    AIUB Campus - 24<sup>th</sup> July 2023
                                </h3>
                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <h3 class="title text-center">
                                    AIUB Campus - 24<sup>th</sup> July 2023
                                </h3>
                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 mt-4">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <h3 class="title text-center">
                                    AIUB Campus - 24<sup>th</sup> July 2023
                                </h3>
                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 mt-4">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <h3 class="title text-center">
                                    AIUB Campus - 24<sup>th</sup> July 2023
                                </h3>

                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 mt-4">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <h3 class="title text-center">
                                    AIUB Campus - 24<sup>th</sup> July 2023
                                </h3>
                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 mt-4">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="{{asset('frontend')}}/assets/images/event/event-1.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <h3 class="title text-center">
                                    AIUB Campus - 24<sup>th</sup> July 2023
                                </h3>
                            </div>
                            <!-- event-content - end -->

                        </div>
                    </div>
                    <!-- event-item - end -->

                </div>
            </div>
            <!-- conference-event - end -->
        </div>
        <!-- tab-content - end -->
    </div>
</section>
<!-- entertainment-section - end ================================================== -->


<!-- event-section - start ================================================== -->
<section id="playing-section" style="background: #F26624;" class="event-section sec-ptb-100 bg-gray-light clearfix">
    <div class="container">
        <div class="mb-25">
            <div class="row">
                <!-- section-title - start -->
                <div class="col-md-12">
                    <div class="section-title text-left">
                        <h2 class="big-title"><strong>participating bands</strong></h2>
                    </div>
                </div>
                <!-- section-title - end -->

            </div>
        </div>

        <!-- tab-content - start -->
        <div class="tab-content">
            <!-- conference-event - start -->
            <div id="conference-event" class="tab-pane fade active show">
                <div class="row">
                    <!-- event-item - start -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="event-item clearfix">
                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="{{asset('frontend')}}/assets/images/event/participantsband.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="event-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="{{asset('frontend')}}/assets/images/event/participantsband2.jpg" alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->
                        </div>
                    </div>
                    <!-- event-item - end -->

                </div>
            </div>
            <!-- conference-event - end -->
        </div>
        <!-- tab-content - end -->

    </div>
</section>
<!-- event-section - end ================================================== -->
@endsection

@push('webjs')
<script>
    function RegisterShow(event) {
        event.preventDefault();
        $("#contact-section").slideDown('slow');
    }

    function Register(event) {
        event.preventDefault();
        let formdata = new FormData(event.target)
        $.ajax({
            url: "/example-register",
            method: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            beforeSend: () => {
                $("#contact-section").find('form .text-white').text('').addClass('d-none');
            },
            success: res => {
                if (res.msg_type) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setTimeout(() => {
                        location.href = "/register-complete/" + res.slug
                    }, 1000)
                } else {
                    $.each(res.message, (index, value) => {
                        $("#contact-section").find('form .error-' + index).text(value).removeClass('d-none');
                    })
                }
            }
        })
    }

    function Reprint(event) {
        event.preventDefault();
        $("#exampleModalCenter").modal("show");
    }

    function ReprintSubmit(event) {
        event.preventDefault();
        let formdata = new FormData(event.target)
        $.ajax({
            url: "/re-print",
            method: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            beforeSend: () => {
                $("#exampleModalCenter").find('form .phone').text('');
            },
            success: res => {
                if (res.msg_type) {
                    setTimeout(() => {
                        location.href = "/register-complete/" + res.slug
                    }, 1000)
                } else {
                    $("#exampleModalCenter").find('form .phone').text(res.message.phone);
                }
            }
        })

    }
</script>
@endpush