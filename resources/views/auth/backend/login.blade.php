<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login</title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/logo.png') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    <style>
        .rounded-t-5 {
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        @media (min-width: 992px) {
            .rounded-tr-lg-0 {
                border-top-right-radius: 0;
            }

            .rounded-bl-lg-5 {
                border-bottom-left-radius: 0.5rem;
            }
        }

        .back_image {
            /* background: url(../../../admin_background.jpg); */
            background: orange;
            /* background-position: cover; */
            background-repeat: no-repeat;
            background-size: cover;
        }

        .login_center {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>



</head>

<body style="position: relative;height:100vh" class="back_image">
    <div class="row h-100 login_center m-0">
        <div class="col-10 col-sm-6 ">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0 text-center">Admin Login Page</h3>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div style="padding: 10px 31px 10px;text-align: center;">
                            <img style="width: 80px;margin-bottom: 10px;" src="{{ asset('frontend/assets/images/logo.png') }}" alt="Banglalink Youth Fest - 2023" />
                            <h2>Banglalink</h2>
                            <p>Banglalink Youth Fest - 2023</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card-body py-4 px-md-5">
                            <form onsubmit="AdminLogin(event)">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="username" id="form2Example1" class="form-control" autocomplete="off" value="" />
                                    <label class="form-label error-username" for="form2Example1">Username or
                                        Email Address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form2Example2" class="form-control" autocomplete="off" value="" />
                                    <label class="form-label error-password" for="form2Example2">Password</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section: Design Block -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function AdminLogin(event) {
            event.preventDefault();
            let formdata = new FormData(event.target)
            $.ajax({
                url: location.origin + "/admin",
                method: "POST",
                data: formdata,
                dataType: "JSON",
                processData: false,
                contentType: false,
                beforeSend: () => {
                    $(".error-username").text("Username or Email Address").removeClass("text-danger");
                    $(".error-password").text("Password").removeClass("text-danger");
                },
                success: res => {
                    if (!res.error) {
                        if (res.errors) {
                            $(".error-username").text(res.errors).addClass("text-danger");
                        } else {
                            location.href = "/admin/dashboard";
                        }
                    } else {
                        $.each(res.error, (index, value) => {
                            $(".error-" + index).text(value).addClass("text-danger");
                        })
                    }
                }
            })
        }
    </script>

</body>

</html>