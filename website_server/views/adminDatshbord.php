<?php
$records = getStatistiques();
extract($records);
$data2 = "[" . $m1 . "," . $m2 . "," . $m3 . "," . $m4 . "," . $m5 . "," . $m6 . "," . $m7 . "," . $m8 . "," . $m9 . "," . $m10 . "," . $m11 . "," . $m12 . "]";
$maxpercent = max($starter, $premium, $vip);
if ($maxpercent == 0) {
  $pstarter = 0;
  $ppremium = 0;
  $pvip = 0;
} else {
  $pstarter = ($starter * 100.0) / $maxpercent;
  $ppremium = ($premium * 100.0) / $maxpercent;
  $pvip = ($vip * 100.0) / $maxpercent;
}
?>

<div class="col-xl-8 col-lg-7">
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-contrats-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">statistiques</h6>
    </div>
    <div class="card-body">
      <div class="chart-area">
        <canvas id="adminAreaChart"></canvas>
      </div>
    </div>
  </div>
</div>


<div class="col-xl-4 col-lg-5">
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-contrats-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">type de contrats</h6>
      <!-- <div class="dropdown no-arrow">
                <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Month <i class="fas fa-chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Sélectionnez Période</div>
                    <a class="dropdown-item" href="#">Aujourd'hui</a>
                    <a class="dropdown-item" href="#">Semaine</a>
                    <a class="dropdown-item active" href="#">Mois</a>
                    <a class="dropdown-item" href="#">Cette année</a>
                </div>
            </div> -->
    </div>
    <div class="card-body">
      <div class="mb-3">
        <div class="small text-gray-500">Starter
          <div class="small float-right"><b><?php echo $starter ?> contrats</b></div>
        </div>
        <div class="progress" style="height: 12px;">
          <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $pstarter ?>%" aria-valuenow="<?php echo $starter ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="mb-3">
        <div class="small text-gray-500">Premium
          <div class="small float-right"><b><?php echo $premium ?> contrats</b></div>
        </div>
        <div class="progress" style="height: 12px;">
          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $ppremium ?>%" aria-valuenow="<?php echo $ppremium ?> " aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>

      <div class="mb-3">
        <div class="small text-gray-500">Vip
          <div class="small float-right"><b><?php echo $vip ?> contrats</b></div>
        </div>
        <div class="progress" style="height: 12px;">
          <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $pvip ?>%" aria-valuenow="<?php echo $pvip ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>

    </div>
  </div>
</div>
<?php if ($_SESSION['crm_fd_user']['fonction'] == 'admin') { ?>
  <div class="col-md-8 mb-4">
    <!-- Simple Tables -->
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-contrats-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">utilisateurs</h6>
      </div>
      <div class="table-responsive">
        <?php include('userlist.php') ?>
      </div>
      <div class="card-footer"></div>
    </div>

  </div>
<?php } ?>
<script language="javascript">
  function createUserForm() {
    window.location.href = '<?php echo WEB_ROOT; ?>views/?v=CREATE';
  }

  function updateUser(login) {
    window.location.href = '<?php echo WEB_ROOT; ?>views/?v=UPDATEUSER&login=' + login;
  }

  function deleteUser(login, token) {
    //  if (confirm('Etes-vous sûr de  suprimer ' + $login))

    window.location.href = '<?php echo WEB_ROOT; ?>views/process.php?cmd=deleteUser&login=' + login + "&token=" + token;
  }
</script>





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
  var ctx = document.getElementById("adminAreaChart");
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
        data: <?php echo $data2 ?>,
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