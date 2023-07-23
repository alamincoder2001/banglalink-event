@extends('layouts.frontend_master')

@section('content')
<div class="container">
    <div class="row" style="background: orangered;height:120px;display: flex;align-items: center;justify-content: space-around;">
        <a class="text-white" style="text-decoration: underline;" href="{{route('website')}}">Back To Home</a>
        <a class="text-white" style="background: green;padding: 3px 15px;" onclick="printWindow(event)">Print</a>
    </div>
    <div class="row mb-5 mt-2" id="content">
        <div class="col-md-12">
            <h3>Banglalink Youth Fest - 2023</h3>
            <table>
                <tr>
                    <td>Venue Name:</td>
                    <td>{{$data->university}}</td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td>{{$data->created_at}}</td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>{{$data->university}}</td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>{{$data->phone}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{$data->email}}</td>
                </tr>
                <tr>
                    <td colspan="2">Qrcode:</td>
                </tr>
                <tr>
                </tr>
            </table>
            <div id="qrcode" class="text-center"></div>
        </div>
    </div>
</div>

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

    function printWindow(event) {
        event.preventDefault();
        let printContent = document.getElementById('content').innerHTML;
        document.write(printContent)
        $("#qrcode").css({display: 'flex', justifyContent:'center'});
        window.print();
        location.reload();
    }

</script>
@endpush