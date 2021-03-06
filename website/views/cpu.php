<div class="col ">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>CPU Usage</h5>
            <h3> shapeSpace_system_load :<?php

                echo shapeSpace_system_load();

                ?>
        </h3>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#" class="dropdown-item">Config option 1</a>
                    </li>
                    <li><a href="#" class="dropdown-item">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

            <div class="flot-chart">
                <div class="flot-chart-content" id="flot-line-chart-moving"></div>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo WEB_ROOT ?>js/jquery-3.1.1.min.js"></script>


<!-- Flot demo data -->
<script>
    $(function() {

        var container = $("#flot-line-chart-moving");

        // Determine how many data points to keep based on the placeholder's initial size;
        // this gives us a nice high-res plot while avoiding more than one point per pixel.

        var maximum = container.outerWidth() / 2.0 || 300.0;

        //

        var data = [];

        function getRandomData() {

            if (data.length) {
                data = data.slice(1);
            }

            while (data.length < maximum) {
                // var previous = data.length ? data[data.length - 1] : 50;
                // var y = previous + Math.random() * 10 - 5;
                // data.push(y < 0 ? 0 : y > 100 ? 100 : y);
                
                data.push(<?php echo shapeSpace_system_load2();?>);
            //   console.log(<?php echo shapeSpace_system_load2();?>);
            //   await sleep(2);
            }

            // zip the generated y values with the x values

            var res = [];
            for (var i = 0; i < data.length; ++i) {
                res.push([i, data[i]])
            }

            return res;
        }

        series = [{
            data: getRandomData(),
            lines: {
                fill: true
            }
        }];


        var plot = $.plot(container, series, {
            grid: {

                color: "#999999",
                tickColor: "#D4D4D4",
                borderWidth: 0,
                minBorderMargin: 20,
                labelMargin: 10,
                backgroundColor: {
                    colors: ["#ffffff", "#ffffff"]
                },
                margin: {
                    top: 8,
                    bottom: 20,
                    left: 20
                },
                markings: function(axes) {
                    var markings = [];
                    var xaxis = axes.xaxis;
                    for (var x = Math.floor(xaxis.min); x < xaxis.max; x += xaxis.tickSize * 2) {
                        markings.push({
                            xaxis: {
                                from: x,
                                to: x + xaxis.tickSize
                            },
                            color: "#fff"
                        });
                    }
                    return markings;
                }
            },
            colors: ["#1ab394"],
            xaxis: {
                tickFormatter: function() {
                    return "";
                }
            },
            yaxis: {
                min: 0,
                max: 110
            },
            legend: {
                show: true
            }
        });

        // Update the random dataset at 25FPS for a smoothly-animating chart

        setInterval(function updateRandom() {
            series[0].data = getRandomData();
            plot.setData(series);
            plot.draw();
        }, 40);

    });
</script>