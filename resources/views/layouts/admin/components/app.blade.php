<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>SIDERAC 2.0</title>

    <!-- Favicon -->
    <link href="//db.onlinewebfonts.com/c/97d6f29a4bda3a872dad26cc5b2d0d7b?family=Haettenschweiler" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    {{-- <link rel="shortcut icon" href="assets/images/logo/favicon.png"> --}}
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body>

    <!-- Page Container START -->
    <div class="" style="background: #EEEEEE;">


        <!-- Content Wrapper START -->
        <div class="main-content px-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @yield('content') 
                    </div>
                </div>

            </div>
        </div>
        <!-- Content Wrapper END -->
    </div>
    <!-- Page Container END -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- BS JavaScript -->

    @yield('script')
    <!-- page js -->

</body>

</html>
