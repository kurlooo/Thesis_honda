$(function() {
    // $.getJSON("/unres", function(result) {
    //
    //     var data = [];
    //
    //     for (var i = 0; i < result.length; i++) {
    //         // labels.push('Workbay '+ result[i].workbay_id);
    //         data.push(result[i].tcount);
    //     }
    //     var ctx = $("#chart-rec");
    //
    //     var ctz = $("#chart-com");
    //
    //     var ch = {
    //         labels: ["Workbay 1", "Workbay 2"],
    //         datasets: [{
    //             label: "Vehicle Count",
    //             data: data,
    //             backgroundColor: "#F4A460",
    //             borderColor: "#1D7A46",
    //             borderWidth: [2, 2],
    //         }],
    //     };
    //
    //     var mychart = new Chart(ctx, {
    //         type: 'horizontalBar',
    //         data: ch,
    //         options: {
    //             global: {
    //                 defaultFontColor : 'white',
    //             },
    //             legend: {
    //                 labels: {
    //                     fontColor: 'white',
    //                 }
    //             },
    //             scales: {
    //                 yAxes: [{
    //                     ticks: {
    //                         beginAtZero: true,
    //                         fontColor: Charts.colors.white,
    //                     },
    //                     maxBarThickness: 50,
    //                 }],
    //                 xAxes: [{
    //                     ticks: {
    //                         beginAtZero: true,
    //                         display: true,
    //                         callback: function(value) {
    //                             if (!(value % 1)) {
    //                                 return value
    //                             }
    //                         },
    //                         fontColor: Charts.colors.white,
    //                         max: 10,
    //                     },
    //                     gridLines: {
    //                         drawBorder: true,
    //                         color: 'white',
    //                     }
    //                 }],
    //             },
    //         }
    //     });
    // });

    // $.getJSON("/uncom", function(result) {
    //
    //     var data = [];
    //
    //     for (var i = 0; i < result.length; i++) {
    //         // labels.push('Workbay '+ result[i].workbay_id);
    //         data.push(result[i].tcount);
    //     }
    //     var ctx = $("#chart-com");
    //
    //     var chart = {
    //         labels: ["Workbay 1", "Workbay 2"],
    //         datasets: [{
    //             label: "Vehicle Count",
    //             data: data,
    //             backgroundColor: "#e63d4e",
    //             borderColor: "#080608",
    //             borderWidth: [2, 2],
    //         }],
    //     };
    //
    //     var mychart = new Chart(ctx, {
    //         type: 'horizontalBar',
    //         data: chart,
    //         options: {
    //             global: {
    //                 defaultFontColor : 'black',
    //             },
    //             legend: {
    //                 labels: {
    //                     fontColor: 'black',
    //                 }
    //             },
    //             scales: {
    //                 yAxes: [{
    //                     ticks: {
    //                         beginAtZero: true,
    //                         fontColor: Charts.colors.black,
    //                     },
    //                     maxBarThickness: 50,
    //                 }],
    //                 xAxes: [{
    //                     ticks: {
    //                         beginAtZero: true,
    //                         display: true,
    //                         callback: function(value) {
    //                             if (!(value % 1)) {
    //                                 return value
    //                             }
    //                         },
    //                         fontColor: Charts.colors.gray,
    //                         max: 10,
    //                     },
    //                     gridLines: {
    //                         drawBorder: true,
    //                         color: Charts.colors.black,
    //                     }
    //                 }],
    //             },
    //         }
    //     });
    // });


    $.getJSON("/unres", function(result) {

        var dat = [];

        dat.push(result[0].tcount);

        document.getElementById('unres').innerHTML=dat;
    });

    $.getJSON("/uncom", function(result) {

        var dat = [];

        dat.push(result[0].tcount);

        document.getElementById('uncom').innerHTML=dat;
    });

    $.getJSON("/unrel", function(result) {

        var dat = [];

        dat.push(result[0].tcount);

        document.getElementById('unrel').innerHTML=dat;
    });

});



