<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Complete</title>
    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div class="row">
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
                        <td colspan="2" class="text-center">
                            <div id="qrcode"></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <script>
        var qrcode = new QRCode("qrcode");

        function makeCode() {
            var elText = document.getElementById("text");

            if (!elText.value) {
                alert("Input a text");
                elText.focus();
                return;
            }

            qrcode.makeCode(elText.value);
        }

        makeCode();
    </script>
</body>

</html>