<!-- fraimwork - jquery include -->
<script src="{{asset('frontend')}}/assets/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/popper.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>

<!-- carousel jquery include -->
<script src="{{asset('frontend')}}/assets/js/slick.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/owl.carousel.min.js"></script>

<!-- map jquery include -->
<script src="{{asset('frontend')}}/assets/js/gmap3.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>

<!-- calendar jquery include -->
<script src="{{asset('frontend')}}/assets/js/atc.min.js"></script>

<!-- others jquery include -->
<script src="{{asset('frontend')}}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/isotope.pkgd.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/jarallax.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- gallery img loaded - jqury include -->
<script src="{{asset('frontend')}}/assets/js/imagesloaded.pkgd.min.js"></script>

<!-- multy count down - jqury include -->
<script src="{{asset('frontend')}}/assets/js/jquery.countdown.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- custom jquery include -->
<script src="{{asset('frontend')}}/assets/js/custom.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@stack('webjs')