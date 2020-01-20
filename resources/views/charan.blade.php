<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">

</head>
<body>
<div class="chart-container">
    <div class="pie-chart-container">
        <canvas id="chart-sales" class="chart-canvas"></canvas>
    </div>
</div>


    <script>
        $(function() {
            // // $.getJSON("/total", function(result){
            //
            var labels = ['workbay 1', 'workbay 2'];
            // //
            // // for(var i=0; i < result.length; i++) {
            // //     labels.push(result[i].workbay_id);
            // //     data.push(result[i].tcount);
            // // }
            var ctx = $("#mychart");

            var piechart = {
                labels: labels,
                datasets: [{
                    label: "Vehicle Count Each Workbay",
                    backgroundColor: [
                        "#A9A9A9",
                        "#F4A460",
                    ],
                    borderColor: [
                        "#CB252B",
                        "#1D7A46",
                    ],
                    borderWidth: [2, 2],
                }],
            };

            var options = {
                responsive: true,
                legend:{
                    display:true,
                    position: "top",
                    labels: {
                        fontColor: "#d1e6ab",
                        fontSize: 16
                    }
                }
            };

            var mychart = new Chart(ctx, {
                type: 'bar',
                data: piechart,
                options: options,
            });

        });
    </script>
</body>
</html>
