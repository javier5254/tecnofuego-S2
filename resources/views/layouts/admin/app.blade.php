
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')  | SIRAC 2</title>

    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    {{-- <link rel="shortcut icon" href="assets/images/logo/favicon.png"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
<div class="app">
    <div class="layout">
       @include('layouts.admin.components.sidebar')

        <!-- Page Container START -->
        <div class="page-container" style="background: #EEEEEE;">
           @include('layouts.admin.components.navbar')

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
<!--
           @include('layouts.admin.components.footer')
-->
        </div>
        <!-- Page Container END -->

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
<script src="http://momentjs.com/downloads/moment.min.js"></script>

<script src="{{ url('js/app.js') }}"></script>

<!-- BS JavaScript -->

@yield('script')
<!-- page js -->

</body>

</html>
