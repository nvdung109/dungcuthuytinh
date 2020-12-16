<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
    <link href="{{ asset('assets/admin/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/lib/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/css/bracket.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/css/jquery.growl.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/css/css_custom.css') }}" rel="stylesheet" type="text/css">
    @yield('CSS_HEADER_MORE')
    @yield('JS_HEADER_MORE')
</head>

<body class="">
    <div class="br-logo"><a href=""><span></span>Admin <i>Lab</i><span></span></a></div>

    @include("admin.sidebar")
    @include("admin.header")
    @include("admin.right")

    <div class="br-mainpanel">
    	@yield('CONTAINER')
    </div>

    @include("admin.footer")

    <script type="text/javascript">
    	var urlUpload = '{{ Config("app.upload_url") }}';
    </script>
    <script type="text/javascript">
        $("div.alert").delay(3000).slideUp();
    </script>

    <script src="{{ asset('assets/admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/rickshaw/vendor/d3.min.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/rickshaw/vendor/d3.layout.min.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/select2/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/bracket.js') }}"></script>
    <script src="{{ asset('assets/admin/js/ResizeSensor.js') }}"></script>

	<script language="javascript" src="{{ asset('assets/admin/js/jquery.growl.js') }}"></script>
    <script language="javascript" src="{{ asset('assets/admin/js/library.js?v=11122') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('JS_FOOTER')
    @include("admin.flash-message")

</body>

</html>
