@extends('layouts.backend_master')

@section('title', 'Dashboard')
@section('breadcrumbTitle', 'Dashboard')
@section('breadcrumbSubTitle', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-sm-4">
        <div class="card widget-flat text-center" style="box-shadow: 0px 0px 0px 5px #bbbbbb;background: #ffec1e2b;">
            <div class="card-body p-2">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple widget-icon"></i>
                </div>
                <h5 class="text-dark fw-normal mt-0" title="Number of Today Registration">Today Registration </h5>
                <h3 class="mt-2 text-dark">{{count($todayreg)}}</h3>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card widget-flat text-center" style="box-shadow: 0px 0px 0px 5px #bbbbbb;background: #ffec1e2b;">
            <div class="card-body p-2">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple widget-icon"></i>
                </div>
                <h5 class="text-dark fw-normal mt-0" title="Number of Registration">Total Registration</h5>
                <h3 class="mt-2 text-dark">{{$registers->count()}}</h3>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card widget-flat text-center" style="box-shadow: 0px 0px 0px 5px #bbbbbb;background: #ffec1e2b;">
            <div class="card-body p-2">
                <div class="float-end">
                    <i class="mdi mdi-calendar-plus widget-icon"></i>
                </div>
                <h5 class="text-dark fw-normal mt-0" title="Number of Events">Total Events </h5>
                <h3 class="mt-2 text-dark">{{$events->count()}}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div style="height: 250px">
            <canvas id="myChart"></canvas>
        </div>
    </div>


</div>

@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    setTimeout(() => {
        $.ajax({
            url: '/admin/get-graph-data',
            method: 'POST',
            data: {},
            success: res => {
                let arKey = [];
                let arData = [];
                $.each(res.monthly_record, (index, value) => {
                    arKey.push(value[0]);
                    arData.push(value[1]);
                })
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: arKey,
                        datasets: [{
                            label: 'This Month Total Registration',
                            data: arData,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        })
    }, 1000)
</script>
@endpush