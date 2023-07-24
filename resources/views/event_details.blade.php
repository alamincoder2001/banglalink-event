@extends('layouts.frontend_master')

@section('content')

<!-- header-section - start================================================== -->
<header id="header-section" class="header-section sticky-header-section not-stuck clearfix" style="background:orange;">
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


<section class="event_detail" style="padding: 110px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <img src="{{asset($event->logo)}}" class="w-100" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$event->venue}}</h5>
                        <h5 class="date">{{\Carbon\Carbon::parse($event->eventDate)->format('D')}} {{ date("d/m/Y", strtotime($event->eventDate))}}</h5>
                        <h5 class="time">{{date("h:i a", strtotime($event->From))}} - {{date("h:i a", strtotime($event->To))}}</h5>

                        <p>{{$event->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('webjs')

@endpush