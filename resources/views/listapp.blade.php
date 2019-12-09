<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>List of Appointments</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>

            body {
                background-color: #000000;
                background-image: linear-gradient(147deg, #000000 0%, #2c3e50 74%);
                height: 100vh;
                margin: 0;
            }
            table {
                counter-reset: tableCount;
            }

            .counterCell:before {
                content: counter(tableCount);
                counter-increment: tableCount;
            }

            .position{
                padding-top: 100px;
                padding-bottom: 50px;
            }

            .chour {
                margin:auto;
            }

            .text {
                color: whitesmoke;
                font-size: medium;
            }

        </style>

    </head>
    <body>
        <div class="container-fluid ">
            <div class="col-md-9 position chour text">
                <table id="datatable" class="table bg-light table-hover display responsive">
                    <thead class="thead-dark">
                    <tr>
                        <th >#</th>
                        <th>Plate Number</th>
                        <th>Service Type</th>
                        <th >Date and Time</th>
                        <th >Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($appoints as $appoint)
                        <tr>
                            <td class="counterCell"></td>
                            <td>{{ $appoint->plate_no }}</td>
                            <td>{{ $appoint->serviceType }}</td>
                            <td>{{ $appoint->datetime }}</td>
                            <td>{{ $appoint->remarks }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script>

            $(document).ready(function () {

                $('#datatable').dataTable({
                    "responsive": true,
                    "scrollY": "500px",
                    "scrollCollapse": true,
                    // "paging": false
                });
            });

        </script>

    </body>
</html>
