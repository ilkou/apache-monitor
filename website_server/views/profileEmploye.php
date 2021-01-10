<?php
$records = getMyRecords();
extract($records);
$percent = ($chiffre_affaire * 100.0) / 200000.0;
$rest = 200000.0 - $chiffre_affaire;
if ($rest < 0)
    $rest = 0;
$data = "[" . $m1 . "," . $m2 . "," . $m3 . "," . $m4 . "," . $m5 . "," . $m6 . "," . $m7 . "," . $m8 . "," . $m9 . "," . $m10 . "," . $m11 . "," . $m12 . "]";

?>
<style>
    .y {
        text-align: end;
    }
</style>

<div class="col-sm-12 mb-4 card">

    <div>
    </div>
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="m-0 font-weight-bold text-primary">Informations</h5>
    </div>
    <div class="row card-body">
        <div class="card col-sm-8">
            <div class="card-body ">
                <div class="row">
                    <div class="col-sm-3">
                        <?php if ($photo) { ?>
                            <img class="img-profile rounded-circle" alr="" src="<?php echo WEB_ROOT; ?>views/<?php echo "$photo"; ?>" style="max-width: 100px; height:100px">

                        <?php } else { ?>
                            <img class="img-profile rounded-circle" alt="" src="<?php echo WEB_ROOT; ?>img/boy.png" style="max-width: 100px ">

                        <?php } ?>
                    </div>
                    <div class="col-sm-8">
                        <div class="row" class="col-md-9">
                            <dt class="col-md-4">nom complet</dt>
                            <dt class="col-md-8  font-weight-normal"><?php echo "$nom_user"; ?> <?php echo "$prenom_user"; ?></dt>
                        </div>
                        <div class="row" class="col-md-9">
                            <dt class="col-md-4">fonction</dt>
                            <dt class="col-md-8  font-weight-normal"><?php

                                                    if ($fonction == "manager") echo "manager";
                                                    if ($fonction == "developpeur_tech") echo "développeur technique";
                                                    if ($fonction == "devloppeur_commercial") echo "développeur commercial";
                                                    if ($fonction == "commercial") echo "commercial";
                                                    ?> </dt>
                        </div>

                        <div class="row" class="col-md-9">
                            <dt class="col-md-4">numero</dt>
                            <dt class="col-md-8  font-weight-normal"><?php echo "$tel"; ?> </dt>
                        </div>
                        <div class="row" class="col-sm-9">
                            <dt class="col-md-4">email</dt>
                            <dt class="col-md-8  font-weight-normal"><?php echo "$login"; ?></dt>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($fonction == 'commercial') { ?>
            <div class="col-sm-4">
                <div class="card ">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2 ">
                                <div class="h5  font-weight-bold text-uppercase mb-1 text-primary">chiffre d’affaire</div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo ($chiffre_affaire) ?> Dh</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-line fa-4x text-primary"></i>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
            <?php if ($fonction == 'commercial') { ?>
                <div class="col-sm-12">
                    <div class="progress mb-3">
                        <div class="progress-bar progress-bar-striped  Primary" role="progressbar" style="width: <?php echo $percent; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <span class="y"><?php echo $percent; ?>%</span>
                        </div>
                        <div class="progress-bar .progress-bar-striped bg-gradient-secondary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">

                        </div>
                    </div>
                </div>
            <?php } ?>
    </div>
    <?php if ($fonction == 'commercial') { ?>
        <div class="col-sm-12 row">
            <div class="col-sm-8">
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Statistiques</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">pourcentage de chiffre d’affaire</h5>
                </div>
                <div class="card-body">
                    <div id="piechart"></div>
                </div>
            </div>
        </div>
    <?php } ?>
    <br />
    <?php if ($fonction == 'developpeur_tech') {
        include('acceptedProjects.php');
    }
    ?>
    <!-- Simple Tables -->
</div>

<script src="<?php echo WEB_ROOT; ?>vendor/chart.js/Chart.min.js"></script>
<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Janv", "Fèv", "Mars", "Avril", "Mai", "Juin", "Juil", "Août", "Sept", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.5)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: <?php echo $data ?>,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value) + 'Dhs';
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ' ' + number_format(tooltipItem.yLabel) + ' Dhs';
                    }
                }
            }
        }
    });
</script>





<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['réalisé', <?php echo $chiffre_affaire ?>],
            ['reste', <?php echo $rest ?>],
        ]);

        var options = {
            legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>