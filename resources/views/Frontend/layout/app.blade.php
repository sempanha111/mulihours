<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>multihours.com</title>

    <link rel="icon" href="{{ asset('assets_frontend/images/favicon.png')}}">
    <link href='{{ asset('assets_frontend/css/bootstrap.min.css') }}' rel='stylesheet' type='text/css'>
    <link href='{{ asset('assets_frontend/css/animate.css') }}' rel='stylesheet' type='text/css'>
    <link href='{{ asset('assets_frontend/css/custom.css') }}' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src='{{ asset('assets_frontend/js/setting2.js') }}' type='text/javascript'></script>
    <script src='{{ asset('assets_frontend/js/bootstrap.min.js') }}' type='text/javascript'></script>
    <link rel="stylesheet" href="{{ asset('assets_backend/vendors/toastr/toastr.css') }}">
    <script src="{{ asset('assets_backend/vendors/toastr/toastr.min.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    @yield('style')
    <style>
        .wrapper {
            background: url('{{ asset('assets_frontend/images/banner-bg.jpg') }}') no-repeat center top;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            padding-top: 0px;
        }

        .about-right {
            overflow: hidden;
            text-align: center;
            background: url('{{ asset('assets_frontend/images/about-right.png') }}') no-repeat center 0px;
            min-height: 500px;
        }

        .affiliates-right {
            overflow: hidden;
            text-align: center;
            background: url('{{ asset('assets_frontend/images/ref1.png') }}') no-repeat content-box 0px;
            height: 200px;
        }

        .form-container.loginpage,
        .form-container.forgot_pw,
        .form-container.signuppage {
            margin: 30px auto;
            width: 100%;
            padding: 30px;
            background: #590469 url('{{ asset('assets_frontend/images/company-bg.jpg') }}') no-repeat center top;
            box-shadow: 0 0 10px #d73a16;
            border-radius: 10px;
            background-size: cover;
        }

        .banner_wrap_sub {
            padding-bottom: 0px;
            background: #3E2667 url('{{ asset('assets_frontend/images/feature-bg.png') }}') repeat center;
            font-weight: 600;
            box-shadow: 0 5px 5px #1207357a;
        }
    </style>



</head>

<body>


    @yield('content')



    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5d1b881a22d70e36c2a3cca4/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <script>
        $(document).ready(function() {
            @if (Session::has('success') || Session::has('error') || Session::has('warning'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "timeOut": 10000,
                    "positionClass": "toast-bottom-left",
                };
                // Display toastr message based on session data
                @if (Session::has('success'))
                    var toastrMessage = toastr.success("{{ session('success') }}");
                @elseif (Session::has('error'))
                    var toastrMessage = toastr.error("{{ session('error') }}");
                @elseif (Session::has('warning'))
                    var toastrMessage = toastr.warning("{{ session('warning') }}");
                @endif

                // Add hover event listener to restart timeout on hover
                toastrMessage.hover(
                    function() {
                        toastr.options.timeOut = 0; // Set timeout to 0 to prevent auto-close
                    },

                );
            @endif
        });
    </script>
    <!--End of Tawk.to Script-->

</body>

</html>
