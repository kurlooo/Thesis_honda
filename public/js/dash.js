$(function() {
    $.getJSON("/effi", function(result) {

        var data = [];
        var labels = [];
        // var tech = [];

        for (var i = 0; i < result.length; i++) {
            labels.push(result[i].date);
            data.push(result[i].effi);
        }

        var ch = {
            labels: labels,
            datasets: [{
                label: "Workshop Efficiency",
                data: data,
                backgroundColor: "#F4A460",
                borderColor: "#212529",
                borderWidth: 2,
            }],
        };

        //DAILY

        var daily = {
            type: 'line',
            data: ch,
            options: {
                responsive: true,
                global: {
                    defaultFontColor: 'white',
                },
                legend: {
                    labels: {
                        fontColor: 'white',
                    }
                },
                // title:      {
                //     display: true,
                //     text:    "Chart.js Time Scale"
                // },
                scales: {
                    xAxes: [{
                        type: "time",
                        time: {
                            unit: 'day',
                            // format: 'HH:mm:ss',
                            tooltipFormat: 'll',
                            // displayFormats: {
                            //     minute: 'LT',
                            // }
                            // unit: 'minute',
                            // displayFormats: {
                            //     minute: 'lll',
                            // },
                            // tooltipFormat: 'lll',
                        },
                        ticks: {
                            fontColor: 'white',
                            autoSkip: true,
                            maxTicksLimit: 10.5,
                            source: labels,
                        },
                        distribution: 'linear',
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Percentage (%)',
                            fontColor: 'white',
                        },
                        ticks: {
                            fontColor: 'white',
                        },
                        gridLines: {
                            // drawBorder: true,
                            color: 'white',
                        }
                        // fontColor: 'white',

                    }]
                }
            }
        };

        //MONTHLY

        var monthly = {
            type: 'line',
            data: ch,
            options: {
                responsive: true,
                global: {
                    defaultFontColor: 'white',
                },
                legend: {
                    labels: {
                        fontColor: 'white',
                    }
                },
                // title:      {
                //     display: true,
                //     text:    "Chart.js Time Scale"
                // },
                scales: {
                    xAxes: [{
                        type: "time",
                        time: {
                            unit: 'month',
                            // format: 'YYYY-MM-DD',
                            tooltipFormat: 'll',
                            // displayFormats: {
                            //     month: 'LL',
                            // }
                        },
                        ticks: {
                            fontColor: 'white',
                            // source: 'data',
                            autoSkip: true,
                            maxTicksLimit: 10.1,
                            // source: labels,
                        },
                        // distribution: 'series',
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Percentage (%)',
                            fontColor: 'white',
                        },
                        ticks: {
                            fontColor: 'white',
                        },
                        gridLines: {
                            // drawBorder: true,
                            color: 'white',
                        }
                        // fontColor: 'white',

                    }]
                }
            }
        };

        var ctx1       = document.getElementById("canvas").getContext("2d");
        var myLine = new Chart(ctx1, daily);

        $("#daily").on("click", function() {
            var ctx1 = document.getElementById("canvas").getContext("2d");
            var myLine = new Chart(ctx1, daily);
        });
        $("#monthly").on("click", function() {
            var ctx2 = document.getElementById("canvas").getContext("2d");
            var myLine = new Chart(ctx2, monthly);
        });
    });


    $.getJSON("/techeffi", function(result) {

        var data = [];
        var labels = [];
        var tech = [];

        for (var i = 0; i < result.length; i++) {
            // labels.push(result[i].day);
            data.push(result[i].teffi);
            tech.push(result[i].tech_name);
        }
        var ctz = $("#canvas1");

        // var ctz = $("#chart-com");

        var ch = {
            labels: tech,
            datasets: [
                {
                    label: "Technician Efficiency",
                    data: data,
                    backgroundColor : "#b52f12",
                    borderColor : "#F4A460",
                    borderWidth: 2,
                    fill: false,
                },
            ],
        };

        var mychart = new Chart(ctz, {
            type: 'bar',
            data: ch,
            options: {
                responsive: true,
                global: {
                    defaultFontColor: 'white',
                },
                legend: {
                    labels: {
                        fontColor: 'white',
                    }
                },
                // title:      {
                //     display: true,
                //     text:    "Chart.js Time Scale"
                // },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Technician',
                            fontColor: 'white',
                        },
                        ticks: {
                            fontColor: 'white',
                        },
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Percentage (%)',
                            fontColor: 'white',
                        },
                        ticks: {
                            fontColor: 'white',
                        },
                        gridLines: {
                            // drawBorder: true,
                            color: 'white',
                        }
                        // fontColor: 'white',

                    }]
                }
            }
        });
    });


    $.getJSON("/unres", function(result) {

        var dat;

        dat.push(result.tcount);

        document.getElementById('unres').innerHTML=dat;
    });

    $.getJSON("/uncom", function(result) {

        var dat;

        dat.push(result.tcount);

        document.getElementById('uncom').innerHTML=dat;
    });

    $.getJSON("/unrel", function(result) {

        var dat;

        dat.push(result.tcount);

        document.getElementById('unrel').innerHTML=dat;
    });

    // //TECH EFFICIENCY
    //
    // var timeFormat1 = 'DD/MM/YYYY';
    //
    // var config1 = {
    //     type:    'line',
    //     data:    {
    //         datasets: [
    //             {
    //                 label: 'Jose Rizal',
    //                 data: [{
    //                     x: "17/02/2020", y: 40
    //                 }, {
    //                     x: "18/02/2020", y: 50
    //                 }, {
    //                     x: "19/02/2020", y: 55
    //                 }, {
    //                     x: "20/02/2020", y: 67
    //                 }],
    //                 // backgroundColor: "#F4A460",
    //                 borderColor: "#F4A460"
    //             },
    //             {
    //                 label: 'Juan Dela Cruz',
    //                 data: [{
    //                     x: "17/02/2020", y: 50
    //                 }, {
    //                     x: "18/02/2020", y: 58
    //                 }, {
    //                     x: "19/02/2020", y: 75
    //                 }, {
    //                     x: "20/02/2020", y: 69
    //                 }],
    //                 // backgroundColor: "#F4A460",
    //                 borderColor: "#b52f12"
    //             },
    //         ]
    //     },
    //     options: {
    //         responsive: true,
    //         global: {
    //             defaultFontColor : 'white',
    //         },
    //         legend: {
    //             labels: {
    //                 fontColor: 'white',
    //             }
    //         },
    //         // title:      {
    //         //     display: true,
    //         //     text:    "Chart.js Time Scale"
    //         // },
    //         scales:     {
    //             xAxes: [{
    //                 type:       "time",
    //                 time: {
    //                     unit: 'day',
    //                     format: timeFormat1,
    //                     tooltipFormat: 'll',
    //                     displayFormats: {
    //                         day: 'MMM D',
    //                     }
    //                 },
    //                 scaleLabel: {
    //                     display:     true,
    //                     labelString: 'Date',
    //                     fontColor: 'white',
    //                 },
    //                 ticks: {
    //                     fontColor: 'white',
    //                 },
    //             }],
    //             yAxes: [{
    //                 scaleLabel: {
    //                     display: true,
    //                     labelString: 'Percentage (%)',
    //                     fontColor: 'white',
    //                 },
    //                 ticks: {
    //                     fontColor: 'white',
    //                 },
    //                 gridLines: {
    //                     // drawBorder: true,
    //                     color: 'white',
    //                 }
    //                 // fontColor: 'white',
    //
    //             }]
    //         }
    //     }
    // };

    // var ctx1       = document.getElementById("canvas1").getContext("2d");
    // var myLine = new Chart(ctx1, config1);
    //

});







