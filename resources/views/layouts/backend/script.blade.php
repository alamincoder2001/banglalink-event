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
<script src="{{asset('backend')}}/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- JavaScript -->
<!-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="{{asset('backend')}}/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

<script src="{{asset('backend')}}/assets/js/pages/demo.datatable-init.js"></script>

<script>
    $(document).ready(function() {
        $('#customTable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'print',
                    text: 'Print',
                    className: 'btn btn-info btn-sm',
                },
                {
                    extend: 'csv',
                    text: 'CSV',
                    className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    },
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    },
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    },
                }
            ],
        });
    });
</script>

<!-- Datatable Demo Aapp js -->
<script src="{{asset('backend')}}/assets/js/pages/demo.datatable-init.js"></script>

<script src="{{asset('js/notify.js')}}"></script>

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