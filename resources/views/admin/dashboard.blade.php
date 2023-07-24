@extends('layouts.backend_master')

@section('title', 'Dashboard')
@section('breadcrumbTitle', 'Dashboard')
@section('breadcrumbSubTitle', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-sm-6">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple widget-icon"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Number of Registration">Total Registration</h5>
                <h3 class="mt-3 mb-3">{{$registers->count()}}</h3>
                <p class="mb-0 text-muted">
                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i></span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

    <div class="col-sm-6">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-cart-plus widget-icon"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Number of Events">Total Events </h5>
                <h3 class="mt-3 mb-3">{{$events->count()}}</h3>
                <p class="mb-0 text-muted">
                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i></span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

</div>

@endsection