@extends('layouts.frontend_master')

@section('content')

<!-- header-section - start================================================== -->
<header id="header-section" class="header-section sticky-header-section not-stuck clearfix" style="background:orange;">
    <div class="header-bottom">
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col-md-3 col-3">
                    <div class="site-logo-wrapper">
                        <a href="{{route('website')}}" class="logo">
                            <img src="{{asset('frontend')}}/assets/images/logo.png" style="width: 80px;" alt="logo_not_found">
                        </a>
                    </div>
                </div>
                <div class="col-md-9 col-9">
                    <div class="mainmenu-wrapper">
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
</header>
<!-- header-section - end ================================================== -->

<section style="padding: 110px 0;">
    <div class="container">
        <div class="row d-flex justify-content-center py-3">
            <div class="col-md-1 text-right pr-0">
                <a class="text-white" style="background: #ffb100;padding: 8px 15px;border: 1px solid #bbbbbb;border-radius: 5px;" onclick="printWindow(event)"><i class="fa fa-print"></i></a>
            </div>
            <div class="col-md-5 text-center" id="content">
                <div class="ticket">
                    <h1 style="font-size: 30px;font-weight: 700;">Banglalink Youth Fest - 2023</h1>
                    <div class="ticket-details">
                        <div class="ticket-info">
                            <span class="label">Venue Name:</span>
                            <span class="value">{{$data->university}}</span>
                        </div>
                        <div class="ticket-info">
                            <span class="label">Date:</span>
                            <span class="value">{{$data->created_at}}</span>
                        </div>
                        <div class="ticket-info">
                            <span class="label">Name:</span>
                            <span class="value">{{$data->name}}</span>
                        </div>
                        <div class="ticket-info">
                            <span class="label">Phone:</span>
                            <span class="value">{{$data->phone}}</span>
                        </div>
                        <div class="ticket-info">
                            <span class="label">Email:</span>
                            <span class="value">{{$data->email}}</span>
                        </div>
                        <div class="ticket-info">
                            <span class="label">Location:</span>
                            <span class="value">{{$data->address}}</span>
                        </div>
                    </div>
                    <div class="ticket-barcode">
                        <div id="qrcode" class="text-center"></div>
                    </div>
                </div>
                <div class="d-flex justify-content-between m-0 mt-5">
                    <a style="width:48%;background: #ff9900;padding: 7px 5px;font-style:italic;border-radius: 5px;" class="text-white link" href="{{url('/')}}"><i style="color:red;font-weight:900;" class="fas fa-long-arrow-alt-left"></i></i> <span>Return To Youthfest</span></a>
                    <a title="ennovators.banglalink.net" target="_blank" style="width:48%;background: #ff9900;padding: 7px 5px;font-style:italic;border-radius: 5px;" class="text-white link" href="https://ennovators.banglalink.net/"><i style="color:red;font-weight:900;" class="fas fa-long-arrow-alt-right"></i></i> <span>Go To Ennovators</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@push('webjs')

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    function generate() {
        let barText = "{{$data->registrationID}}";
        var qrcode = new QRCode(document.querySelector("#qrcode"), {
            text: barText,
            width: 150, //default 128
            height: 150,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    }
    generate();

    async function printWindow(event) {
        event.preventDefault();

        var myWindow = window.open('', '', `width=${window.screen.width},height=${window.screen.height}`);

        myWindow.document.write(`
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Event Ticket</title>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
                        <link href="${location.origin}/frontend/assets/css/custom.css" rel="stylesheet" />
                        <style>                            
                            .link{
                                display:none !important;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container-fluid">
                            <div class="row d-flex justify-content-center py-3">
                                <div class="col-6">
                                    ${document.getElementById('content').innerHTML}
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>
        
        `)

        myWindow.focus();
        await new Promise(resolve => setTimeout(resolve, 500));
        myWindow.print();
        myWindow.close();
    }
</script>
@endpush