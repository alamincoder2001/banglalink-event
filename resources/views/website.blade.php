@extends('layouts.frontend_master')

@section('content')

<!-- header-section - start================================================== -->
<header id="header-section" class="header-section sticky-header-section not-stuck clearfix">
    <div class="header-bottom">
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col-md-3 col-sm-3 col-3">
                    <div class="site-logo-wrapper">
                        <a href="{{route('website')}}" class="logo">
                            <img src="{{asset('frontend')}}/assets/images/logo.png" style="width: 80px;" alt="logo_not_found">
                        </a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-9">
                    <div class="mainmenu-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="menu-item-list ul-li clearfix">
                                    <ul>
                                        <li class="menu-item-has-children {{ Route::is('website') ? 'active' : '' }}">
                                            <a href="{{ route('website') }}">home</a>
                                        </li>
                                        <li class="menu-item-has-children {{ Route::is('example.registershow') ? 'active' : '' }}">
                                            <a href="{{ route('example.registershow') }}">Register</a>
                                        </li>
                                        <li class="menu-item-has-children {{ Route::is('gallery.page') ? 'active' : '' }}">
                                            <a href="{{ route('gallery.page') }}">Gallery</a>
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
            <!-- <div class="carousel-caption d-none d-md-block text-white"> -->
            <div class="carousel-caption text-white">
                @if($item->status == 1)
                <h4>{{$item->title}}</h4>
                <p>{{$item->description}}</p>
                @endif
                <!-- <a href="{{route('gallery.page')}}" class="about-btn custom-btn">About Us</a>
                <a href="{{route('example.register')}}" class="start-btn">Get Started</a> -->
                <a style="justify-content: center;margin:0 auto;background: white;color: black;border: 3px solid orange;" href="{{route('example.registershow')}}" class="custom-btnnew">Register Now</a>
            </div>
        </div>
        @endforeach
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
                    @if($item->eventDate >= date('Y-m-d'))
                    <div class="col-md-12">
                        <div class="row event-item d-flex align-items-center">
                            <div class="col-md-6 text-md-left text-center p-0">
                                <img class="eventImg" src="{{asset($item->logo != null ? $item->logo : '/noimage.jpg')}}" alt="Image_not_found">
                            </div>
                            <div class="col-md-4">
                                <div class="title">
                                    <span>{{$item->venue}}</span>
                                </div>
                                <div class="title">
                                    <span>{{\Carbon\Carbon::parse($item->eventDate)->format('D')}} {{ date("d/m/Y", strtotime($item->eventDate))}}</span>
                                </div>
                                <div class="title text-uppercase">
                                    <span>{{date("h:i a", strtotime($item->From))}} - {{date("h:i a", strtotime($item->To))}}</span>
                                </div>
                            </div>
                            <div class="col-md-2 title mt-md-0 mt-2 p-md-0">
                                <!-- <a href="{{ route('event.details', $item->id) }}" class="custom-btn">
                                            details
                                        </a> -->
                                <a href="{{route('example.registershow', $item->venue)}}" class="custom-btn btn-block d-flex align-items-center justify-content-center">
                                    Register Now
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    @foreach($events as $key => $item)
                    @if($item->eventDate < date('Y-m-d')) 
                    <div class="col-md-12">
                        <div class="row event-item d-flex align-items-center">
                            <div class="col-md-6 text-md-left text-center p-0">
                                <img class="eventImg" src="{{asset($item->logo != null ? $item->logo : '/noimage.jpg')}}" alt="Image_not_found">
                            </div>
                            <div class="col-md-4">
                                <div class="title">
                                    <span>{{$item->venue}}</span>
                                </div>
                                <div class="title">
                                    <span>{{\Carbon\Carbon::parse($item->eventDate)->format('D')}} {{ date("d/m/Y", strtotime($item->eventDate))}}</span>
                                </div>
                                <div class="title text-uppercase">
                                    <span>{{date("h:i a", strtotime($item->From))}} - {{date("h:i a", strtotime($item->To))}}</span>
                                </div>
                            </div>
                            <div class="col-md-2 title mt-md-0 mt-2 p-md-0">
                                <!-- <a href="{{ route('event.details', $item->id) }}" class="custom-btn">
                                            details
                                        </a> -->
                                <a href="{{route('example.registershow', $item->venue)}}" class="custom-btn btn-block d-flex align-items-center justify-content-center">
                                    Register Now
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
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
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    @if(count($galleries) > 0)
                    @foreach($galleries as $key => $item)
                    <div class="item">
                        <div class="card">
                            <img src="{{asset($item->image)}}" width="50px;" alt="{{$item->title}}">
                            <div class="card-body">
                                <a href="{{route('gallery.page')}}" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband.jpg" class="card-img-top" alt="Gallery">
                            <div class="card-body">
                                <a href="{{route('gallery.page')}}" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband2.jpg" class="card-img-top" alt="Gallery">
                            <div class="card-body">
                                <a href="{{route('gallery.page')}}" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband2.jpg" class="card-img-top" alt="Gallery">
                            <div class="card-body">
                                <a href="{{route('gallery.page')}}" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband.jpg" class="card-img-top" alt="Gallery">
                            <div class="card-body">
                                <a href="{{route('gallery.page')}}" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    @endif
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
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    @if(count($participants) > 0)
                    @foreach($participants as $key => $item)
                    <div class="item">
                        <div class="card">
                            <img src="{{asset($item->image)}}" class="card-img-top" alt="{{$item->title}}">
                            <div class="card-body">
                                <a href="{{route('participant.page')}}" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband.jpg" class="card-img-top" alt="Participants Bands">
                            <div class="card-body">
                                <a href="{{route('participant.page')}}" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband2.jpg" class="card-img-top" alt="Participants Bands">
                            <div class="card-body">
                                <a href="{{route('participant.page')}}" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband.jpg" class="card-img-top" alt="Participants Bands">
                            <div class="card-body">
                                <a href="{{route('participant.page')}}" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('frontend')}}/assets/images/event/participantsband.jpg" class="card-img-top" alt="Participants Bands">
                            <div class="card-body">
                                <a href="{{route('participant.page')}}" class="btn custom-btn btn-block d-flex justify-content-center">Details</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</section>
<!-- event-gallery-section - end ================================================== -->

@endsection

@push('webjs')
<script>
    $(window).on("load", () => {
        $('.owl-carousel').owlCarousel({
            loop: true,
            responsiveClass: true,
            nav: false,
            autoplay: true,
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1,
                    nav: false,
                    dots: false,
                },

                678: {
                    items: 2,
                    center: true,
                    dots: false,
                },

                960: {
                    items: 3,
                    center: true
                },
                1200: {
                    items: 3,
                }
            }
        })
    })
</script>
@endpush