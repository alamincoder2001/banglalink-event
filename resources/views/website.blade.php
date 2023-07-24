@extends('layouts.frontend_master')

@section('content')

<!-- header-section - start================================================== -->
<header id="header-section" class="header-section sticky-header-section not-stuck clearfix">
    <div class="header-bottom">
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col-md-3">
                    <div class="site-logo-wrapper">
                        <a href="{{route('website')}}" class="logo">
                            <img src="{{asset('frontend')}}/assets/images/logo.png" style="width: 80px;" alt="logo_not_found">
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="mainmenu-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="menu-item-list ul-li clearfix">
                                    <ul>
                                        <li class="menu-item-has-children {{Route::is('website') ? 'active' : ''}}">
                                            <a href="{{route('website')}}">home</a>
                                        </li>
                                        <li class="menu-item-has-children {{Route::is('example.registershow') ? 'active' : ''}}">
                                            <a href="{{route('example.registershow')}}">Register</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#!">Gallery</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-section - end ================================================== -->

<!-- slide-section - start ================================================== -->
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($sliders as $key => $item)
        <li data-target="#carouselExampleCaptions" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($sliders as $key => $item)
        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
            <img src="{{asset($item->image)}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-white">
                <h4>{{$item->title}}</h4>
                <p>{{$item->description}}</p>
                <a href="" class="about-btn custom-btn">About Us</a>
                <a href="" class="start-btn">Get Started</a>
            </div>
        </div>
        @endforeach
        <!-- <div class="carousel-item">
            <img src="{{asset('frontend')}}/assets/images/slider/slider-bg2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-white">
                <h4>AIUB Youth Fest - 2023</h4>
                <p>every event sould be perfect</p>
                <a href="" class="about-btn custom-btn">About Us</a>
                <a href="" class="start-btn">Get Started</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{asset('frontend')}}/assets/images/slider/slider-bg3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-white">
                <h4>AIUB Youth Fest - 2023</h4>
                <p>every event sould be perfect</p>
                <a href="" class="about-btn custom-btn">About Us</a>
                <a href="" class="start-btn">Get Started</a>
            </div>
        </div> -->
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>

<!-- slide-section - end -->


<!-- event-section - start -->
<section id="event-section" class="event-section pt-2 sec-ptb-100 bg-gray-light clearfix">
    <div class="section-title text-left mb-25">
        <h2 style="background: #ff7b17;padding: 15px 0px;" class="text-white big-title text-center"><strong>Upcoming Events</strong></h2>
    </div>
    <div class="container">
        <div class="tab-content">
            <div id="conference-event" class="tab-pane fade active show">
                <div class="row">
                    @foreach($events as $key => $item)
                    <div class="col-md-12">
                        <div class="row event-item d-flex align-items-center">
                            <div class="col-md-1">
                                <img style="width: 75px;height:65px;margin-right:15px;" src="{{asset($item->logo)}}" alt="Image_not_found">
                            </div>
                            <div class="title col-md-2 p-md-0">
                                <span>{{\Carbon\Carbon::parse($item->eventDate)->format('D')}} {{ date("d/m/Y", strtotime($item->eventDate))}}</span>
                            </div>
                            <div class="title col-md-5 p-md-0">
                                <span>{{$item->venue}}</span>
                            </div>
                            <div class="title col-md-2 p-md-0 text-uppercase">
                                <span>{{date("h:i a", strtotime($item->From))}} - {{date("h:i a", strtotime($item->To))}}</span>
                            </div>
                            <div class="title col-md-2 text-right">
                                <a href="{{ route('event.details') }}" class="custom-btn">
                                    details
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row event-item d-flex align-items-center">
                            <div class="col-md-1">
                                <img style="width: 75px;height:65px;margin-right:15px;" src="{{asset('frontend')}}/assets/images/event/nsu.png" alt="Image_not_found">
                            </div>
                            <div class="title col-md-2">
                                <span>Sun 18/06/2023</span>
                            </div>
                            <div class="title col-md-5">
                                <span>American International University-Bangladesh</span>
                            </div>
                            <div class="title col-md-2">
                                <span>1:00 PM - 5:00 PM</span>
                                <a href="{{ route('event.details') }}" class="custom-btn">
                                    details
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row event-item d-flex align-items-center">
                            <div class="col-md-1">
                                <img style="width: 75px;height:65px;margin-right:15px;" src="{{asset('frontend')}}/assets/images/event/nsu.png" alt="Image_not_found">
                            </div>
                            <div class="title col-md-2">
                                <span>Sun 18/06/2023</span>
                            </div>
                            <div class="title col-md-5">
                                <span>North South University</span>
                            </div>
                            <div class="title col-md-2">
                                <span>1:00 PM - 5:00 PM</span>
                                <a href="{{ route('event.details') }}" class="custom-btn">
                                    details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- event-section - end ================================================== -->

<!-- gallery-section - start ================================================== -->
<section id="event-gallery-section" style="padding-bottom:50px;" class="event-gallery-section sec-ptb-100 clearfix">
    <div class="section-title text-center mb-50">
        <h2 class="big-title text-center"><strong>gallery</strong></h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband.jpg" class="card-img-top" alt="Participants Bands 1">
                            <div class="card-body">
                                <a href="#" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband2.jpg" class="card-img-top" alt="Participants Bands 1">
                            <div class="card-body">
                                <a href="#" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband2.jpg" class="card-img-top" alt="Participants Bands 1">
                            <div class="card-body">
                                <a href="#" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband.jpg" class="card-img-top" alt="Participants Bands 1">
                            <div class="card-body">
                                <a href="#" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- event-gallery-section - end ================================================== -->

<!-- participating-section - start ================================================== -->
<section id="event-gallery-section" style="background: #F26624;padding-bottom:50px;" class="event-gallery-section sec-ptb-100 clearfix">
    <div class="section-title text-center mb-50">
        <h2 class="big-title text-center text-white"><strong>participating bands</strong></h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband.jpg" class="card-img-top" alt="Participants Bands 1">
                            <div class="card-body">
                                <a href="#" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband2.jpg" class="card-img-top" alt="Participants Bands 1">
                            <div class="card-body">
                                <a href="#" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband.jpg" class="card-img-top" alt="Participants Bands 1">
                            <div class="card-body">
                                <a href="#" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- event-gallery-section - end ================================================== -->

@endsection

@push('webjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
</script>
@endpush