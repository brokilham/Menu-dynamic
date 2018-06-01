
var Dashboard = function() {

    return {


        initCharts: function() {
            if (!jQuery.plot) {
                return;
            }

            function showChartTooltip(x, y, xValue, yValue) {
                $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y - 40,
                    left: x - 40,
                    border: '0px solid #ccc',
                    padding: '2px 6px',
                    'background-color': '#fff'
                }).appendTo("body").fadeIn(200);
            }

            var data = [];
            var totalPoints = 250;

            // random data generator for plot charts

            function getRandomData() {
                if (data.length > 0) data = data.slice(1);
                // do a random walk
                while (data.length < totalPoints) {
                    var prev = data.length > 0 ? data[data.length - 1] : 50;
                    var y = prev + Math.random() * 10 - 5;
                    if (y < 0) y = 0;
                    if (y > 100) y = 100;
                    data.push(y);
                }
                // zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
                return res;
            }

            function randValue() {
                return (Math.floor(Math.random() * (1 + 50 - 20))) + 10;
            }



            if ($('#site_statistics').size() != 0) {
                var visitors = [];
                $.ajax({
                    type:"GET",
                    url:'./dashboard/get_bimbingan_in_year',
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                    success: function(data){      
                     
                        visitors.push(['JAN', data.bimbingan[0].jan]);
                        visitors.push(['FEB', data.bimbingan[0].feb]);
                        visitors.push(['MAR', data.bimbingan[0].mar]);
                        visitors.push(['APR', data.bimbingan[0].apr]);
                        visitors.push(['MAY', data.bimbingan[0].mei]);
                        visitors.push(['JUN', data.bimbingan[0].jun]);
                        visitors.push(['JUL', data.bimbingan[0].jul]);
                        visitors.push(['AUG', data.bimbingan[0].agu]);
                        visitors.push(['SEP', data.bimbingan[0].sep]);
                        visitors.push(['OCT', data.bimbingan[0].okt]);
                        visitors.push(['NOV', data.bimbingan[0].nov]);
                        visitors.push(['DEC', data.bimbingan[0].des]);

                        $('#site_statistics_loading').hide();
                        $('#site_statistics_content').show();

                        var plot_statistics = $.plot($("#site_statistics"), [{
                                data: visitors,
                                lines: {
                                    fill: 0.6,
                                    lineWidth: 0
                                },
                                color: ['#f89f9f']
                            }, {
                                data: visitors,
                                points: {
                                    show: true,
                                    fill: true,
                                    radius: 5,
                                    fillColor: "#f89f9f",
                                    lineWidth: 3
                                },
                                color: '#fff',
                                shadowSize: 0
                            }],

                            {
                                xaxis: {
                                    tickLength: 0,
                                    tickDecimals: 0,
                                    mode: "categories",
                                    min: 0,
                                    font: {
                                        lineHeight: 14,
                                        style: "normal",
                                        variant: "small-caps",
                                        color: "#6F7B8A"
                                    }
                                },
                                yaxis: {
                                    ticks: 5,
                                    tickDecimals: 0,
                                    tickColor: "#eee",
                                    font: {
                                        lineHeight: 14,
                                        style: "normal",
                                        variant: "small-caps",
                                        color: "#6F7B8A"
                                    }
                                },
                                grid: {
                                    hoverable: true,
                                    clickable: true,
                                    tickColor: "#eee",
                                    borderColor: "#eee",
                                    borderWidth: 1
                                }
                            });

                        var previousPoint = null;
                        $("#site_statistics").bind("plothover", function(event, pos, item) {
                            $("#x").text(pos.x.toFixed(2));
                            $("#y").text(pos.y.toFixed(2));
                            if (item) {
                                if (previousPoint != item.dataIndex) {
                                    previousPoint = item.dataIndex;

                                    $("#tooltip").remove();
                                    var x = item.datapoint[0].toFixed(2),
                                        y = item.datapoint[1].toFixed(2);

                                    showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' visits');
                                }
                            } else {
                                $("#tooltip").remove();
                                previousPoint = null;
                            }
                        });
                    },
                    error: function(data){
                        alert(data.responseText);
                    }
                });
                
            }


            if ($('#site_activities').size() != 0) {
                //site activities
                var previousPoint2 = null;
                $('#site_activities_loading').hide();
                $('#site_activities_content').show();
                var data1 = [];

                $.ajax({
                    type:"GET",
                    url:'./dashboard/get_pelanggaran_in_year',
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                    success: function(data){      
                     
                        data1.push(['JAN', data.pelanggaran[0].jan]);
                        data1.push(['FEB', data.pelanggaran[0].feb]);
                        data1.push(['MAR', data.pelanggaran[0].mar]);
                        data1.push(['APR', data.pelanggaran[0].apr]);
                        data1.push(['MAY', data.pelanggaran[0].mei]);
                        data1.push(['JUN', data.pelanggaran[0].jun]);
                        data1.push(['JUL', data.pelanggaran[0].jul]);
                        data1.push(['AUG', data.pelanggaran[0].agu]);
                        data1.push(['SEP', data.pelanggaran[0].sep]);
                        data1.push(['OCT', data.pelanggaran[0].okt]);
                        data1.push(['NOV', data.pelanggaran[0].nov]);
                        data1.push(['DEC', data.pelanggaran[0].des]);


                        var plot_statistics = $.plot($("#site_activities"),
                        [{
                            data: data1,
                            lines: {
                                fill: 0.2,
                                lineWidth: 0,
                            },
                            color: ['#BAD9F5']
                        }, {
                            data: data1,
                            points: {
                                show: true,
                                fill: true,
                                radius: 4,
                                fillColor: "#9ACAE6",
                                lineWidth: 2
                            },
                            color: '#9ACAE6',
                            shadowSize: 1
                        }, {
                            data: data1,
                            lines: {
                                show: true,
                                fill: false,
                                lineWidth: 3
                            },
                            color: '#9ACAE6',
                            shadowSize: 0
                        }],

                        {

                            xaxis: {
                                tickLength: 0,
                                tickDecimals: 0,
                                mode: "categories",
                                min: 0,
                                font: {
                                    lineHeight: 18,
                                    style: "normal",
                                    variant: "small-caps",
                                    color: "#6F7B8A"
                                }
                            },
                            yaxis: {
                                ticks: 5,
                                tickDecimals: 0,
                                tickColor: "#eee",
                                font: {
                                    lineHeight: 14,
                                    style: "normal",
                                    variant: "small-caps",
                                    color: "#6F7B8A"
                                }
                            },
                            grid: {
                                hoverable: true,
                                clickable: true,
                                tickColor: "#eee",
                                borderColor: "#eee",
                                borderWidth: 1
                            }
                        });

                        $("#site_activities").bind("plothover", function(event, pos, item) {
                            $("#x").text(pos.x.toFixed(2));
                            $("#y").text(pos.y.toFixed(2));
                            if (item) {
                                if (previousPoint2 != item.dataIndex) {
                                    previousPoint2 = item.dataIndex;
                                    $("#tooltip").remove();
                                    var x = item.datapoint[0].toFixed(2),
                                        y = item.datapoint[1].toFixed(2);
                                    showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + 'M$');
                                }
                            }
                        });

                        $('#site_activities').bind("mouseleave", function() {
                            $("#tooltip").remove();
                        });
            
                            },
                            error: function(data){
                                alert(data.responseText);
                            }
                        });
                
            }
        },
   

        init: function() {         
            this.initCharts();
        }
    };

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        Dashboard.init(); // init metronic core componets
    });
}