<!-- Vendor js -->
<script src="{{asset('backend')}}/assets/js/vendor.min.js"></script>

<!-- Datatables js -->
<script src="{{asset('backend')}}/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- Datatable Demo Aapp js -->
<script src="{{asset('backend')}}/assets/js/pages/demo.datatable-init.js"></script>

<!-- App js -->
<script src="{{asset('backend')}}/assets/js/app.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@stack('js')