<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>

    <script src="{{ asset('js/app.js') }}"></script>
{{--    <script src="{{ asset('custom/jquery.min.js') }}"></script>--}}
{{--    <script src="{{ asset('custom/moment.min.js') }}"></script>--}}
{{--    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <script src="/node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>--}}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{--    <link href="/node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">--}}
{{--#    <script src="/node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>--}}
{{--    <link href="/node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">--}}


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker1').datetimepicker()
                });
            </script>
        </div>
    </div>

</body>



</html>
