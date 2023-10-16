@extends('layouts.backend_master')

@section('title', 'Register List')
@section('breadcrumbTitle', 'Register List')
@section('breadcrumbSubTitle', 'Register List')

@push('style')
<style>
    div.dataTables_processing {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100px;
        height: 30px;
        margin-left: -125px;
        margin-top: -15px;
        padding: 14px 0 2px 0;
        border: 1px solid #ddd;
        text-align: center;
        color: #999;
        font-size: 14px;
        background-color: white;
    }
</style>
@endpush

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="row justify-content-end">
                    <div class="col-4 col-md-2">
                        <div class="form-group">
                            <select style="padding: 3px 8px;" name="searchBy" id="searchBy" class="form-select">
                                <option value="">All</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="form-group">
                            <input style="padding: 3px 8px;" type="date" name="dateFrom" class="dateFrom form-control" value="{{date('Y-m-d')}}" />
                        </div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="form-group">
                            <input style="padding: 3px 8px;" type="date" name="dateTo" class="dateTo form-control" value="{{date('Y-m-d')}}" />
                        </div>
                    </div>
                    <div class="col-4 col-md-1">
                        <div class="form-group">
                            <button style="padding: 3px 9px;" type="button" onclick="SearchData()" class="btn btn-info btn-sm">Submit</button>
                        </div>
                    </div>
                </div>
                <table id="example" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>University Name</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Date Of Birth</th>
                            <th>Address</th>
                            <th>Student Id</th>
                            <th>Academic Year</th>
                            <th>Type Of Degree</th>
                            <th>Degree Level</th>
                            <th>About Ennovators</th>
                            <th>Facebook Follow</th>
                            <th>Instagram Follow</th>
                            <th>Linkedin Follow</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@push('js')
<script>
    function SearchData() {
        var dataTable = $('#example').DataTable();
        if ($.fn.DataTable.isDataTable('#example')) {
            dataTable.destroy();
        }

        dateFrom = $('.dateFrom').val();
        dateTo = $('.dateTo').val();

        $('#example').DataTable({
            ajax: {
                url: '/admin/search-register',
                method: 'POST',
                data: {
                    dateFrom: dateFrom,
                    dateTo: dateTo,
                },
                dataSrc: 'data'
            },
            fixedHeader: true,
            pageLength: 100,
            processing: true,
            language: {
                processing: '<img src="/loading.gif" width="40"/><span class="sr-only">Loading...</span>',
            },
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
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
                    },
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
                    },
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
                    },
                }
            ],
            columns: [{
                    data: null,
                },
                {
                    data: "university"
                },
                {
                    data: "name"
                },
                {
                    data: "phone"
                },
                {
                    data: "email"
                },
                {
                    data: "gender"
                },
                {
                    data: "dob"
                },
                {
                    data: "address"
                },
                {
                    data: "studentId"
                },
                {
                    data: "academic_year"
                },
                {
                    data: "degree_name"
                },
                {
                    data: "degree_level"
                },
                {
                    data: "ennovator_name"
                },
                {
                    data: null,
                    render: data => {
                        let htMl;
                        if (data.facebook_status == 'Yes') {
                            htMl = `<span class="badge bg-success">${data.facebook_status}</span>`
                        } else {
                            htMl = `<span class="badge bg-danger">${data.facebook_status}</span>`;
                        }
                        return htMl;
                    }
                },
                {
                    data: null,
                    render: data => {
                        let htMl;
                        if (data.instagram_status == 'Yes') {
                            htMl = `<span class="badge bg-success">${data.instagram_status}</span>`
                        } else {
                            htMl = `<span class="badge bg-danger">${data.instagram_status}</span>`;
                        }
                        return htMl;
                    }
                },
                {
                    data: null,
                    render: data => {
                        let htMl;
                        if (data.linkedin_status == 'Yes') {
                            htMl = `<span class="badge bg-success">${data.linkedin_status}</span>`
                        } else {
                            htMl = `<span class="badge bg-danger">${data.linkedin_status}</span>`;
                        }
                        return htMl;
                    }
                },
                {
                    data: null,
                    render(data) {
                        return `<a class="btn btn-danger btn-sm" href="/admin/register-delete/${data.id}" onclick="registerDelete(event)">Delete</a>`
                    },
                },
            ],
            fnCreatedRow: function(row, data, index) {
                $('td', row).eq(0).html(index + 1);
            }
        });
    }

    SearchData();

    function registerDelete(event) {
        event.preventDefault();
        if (confirm("Are you sure!")) {
            $.ajax({
                url: event.target.href,
                method: "GET",
                success: res => {
                    alert(res)
                    location.reload();
                }
            })
        }
    }
</script>
@endpush