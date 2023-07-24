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

<section id="contact-section" class="contact-section sec-ptb-100 clearfix" style="padding: 120px 0;">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <h2 class="big-title text-center" style="font-size: 40px;font-weight: 900;">Register Your Booking</h2>
                <div class="contact-form form-wrapper">
                    <form onsubmit="Register(event)">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-item">
                                    <input type="text" name="name" placeholder="Your Name" autocomplete="off">
                                    <span class="text-danger error-name d-none"></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-item">
                                    <input type="phone" name="phone" placeholder="Phone Number" autocomplete="off">
                                    <span class="text-danger error-phone d-none"></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-item">
                                    <input type="email" name="email" placeholder="Email Address" autocomplete="off">
                                    <span class="text-danger error-email d-none"></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-item">
                                    <select name="university" id="event-category-select">
                                        <option value="">Choose University</option>
                                        @foreach($universities as $key => $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-university d-none"></span>
                                </div>
                            </div>

                            <div class="col-sm-12 text-right">
                                <div class="form-item mb-0 text-left">
                                    <textarea name="address" placeholder="Your Address"></textarea>
                                    <span class="text-danger error-address d-none"></span>
                                </div>
                                <button type="submit" class="custom-btn">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-5">
                <div style="width: 100%;height:5px;background:orange"></div>
                <h2 class="big-title text-center pt-3" style="font-size: 48px;font-weight: 900;">Re Print Ticket</h2>
                <div class="contact-form form-wrapper" style="height: 150px;padding:5px; box-shadow:0px 0px 1px 1px #cf32001f;">
                    <form class="reprint" onsubmit="ReprintSubmit(event)">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-item">
                                    <input type="phone" name="phone" placeholder="Phone Number" autocomplete="off">
                                    <span class="text-danger phone"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="custom-btn">Reprint</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('webjs')
<script>
    function Register(event) {
        event.preventDefault();
        let formdata = new FormData(event.target)
        $.ajax({
            url: "/register",
            method: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            beforeSend: () => {
                $("#contact-section").find('form .text-danger').text('').addClass('d-none');
            },
            success: res => {
                if (res.msg_type) {
                    location.href = "/register-complete/" + res.slug
                } else {
                    $.each(res.message, (index, value) => {
                        $("#contact-section").find('form .error-' + index).text(value).removeClass('d-none');
                    })
                }
            }
        })
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
                $(".reprint").find('.phone').text("").addClass('d-none');
            },
            success: res => {
                if (res.msg_type) {
                    if (res.slug == '') {
                        $(".reprint").find('.phone').text("Data not match").removeClass('d-none');
                    } else {
                        location.href = "/register-complete/" + res.slug
                    }
                } else {
                    $(".reprint").find('.phone').text(res.message.phone).removeClass('d-none');
                }
            }
        })

    }
</script>
@endpush