@extends('layouts.backend_master')

@section('title', 'Register List')
@section('breadcrumbTitle', 'Register List')
@section('breadcrumbSubTitle', 'Register List')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card widget-flat">
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Register Code</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($registers as $key => $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->registrationID}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->address}}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{route('admin.registerdestroy', $item->id)}}" onclick="registerDelete(event)">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@push('js')
<script>
    function registerDelete(event) {
        event.preventDefault();
        $.ajax({
            url: event.target.href,
            method: "GET",
            success: res => {
                alert(res)
                location.reload();
            }
        })
    }
</script>
@endpush