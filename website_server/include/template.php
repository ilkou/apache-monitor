<?php
if (!defined('WEB_ROOT')) {
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>

  <?php include('head.php'); ?>
</head>

<body>
  <div id="wrapper">
    <?php include('sidebar.php'); ?>

    <div id="page-wrapper" class="gray-bg dashbard-1">
      <?php include('nav.php'); ?>

      <!-- content -->
      <div id="page-wrapper w-100" class="gray-bg dashbard-1" >
        <?php
        require_once $content;
        ?>
      </div>
      <!-- end content -->
      <!-- <div class="row  border-bottom white-bg dashboard-header">

        <div class="col-md-3">
          <h2>Welcome</h2>
          <small>You have 42 messages and 6 notifications.</small>
          <ul class="list-group clear-list m-t">
            <li class="list-group-item fist-item">
              <span class="float-right">
                09:00 pm
              </span>
              <span class="label label-success">1</span> Please contact me
            </li>
            <li class="list-group-item">
              <span class="float-right">
                10:16 am
              </span>
              <span class="label label-info">2</span> Sign a contract
            </li>
            <li class="list-group-item">
              <span class="float-right">
                08:22 pm
              </span>
              <span class="label label-primary">3</span> Open new shop
            </li>
            <li class="list-group-item">
              <span class="float-right">
                11:06 pm
              </span>
              <span class="label label-default">4</span> Call back to Sylvia
            </li>
            <li class="list-group-item">
              <span class="float-right">
                12:00 am
              </span>
              <span class="label label-primary">5</span> Write a letter to Sandra
            </li>
          </ul>
        </div>
        <div class="col-md-6">
          <div class="flot-chart dashboard-chart">
            <div class="flot-chart-content" id="flot-dashboard-chart" style="padding: 0px; position: relative;"><canvas class="flot-base" width="226" height="180" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 226px; height: 180px;"></canvas>
              <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 45px; top: 163px; left: 16px; text-align: center;">0</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 45px; top: 163px; left: 78px; text-align: center;">5</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 45px; top: 163px; left: 138px; text-align: center;">10</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 45px; top: 163px; left: 200px; text-align: center;">15</div>
                </div>
                <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 150px; left: 7px; text-align: right;">0</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 113px; left: 1px; text-align: right;">10</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 75px; left: 1px; text-align: right;">20</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 38px; left: 1px; text-align: right;">30</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">40</div>
                </div>
              </div><canvas class="flot-overlay" width="226" height="180" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 226px; height: 180px;"></canvas>
            </div>
          </div>
          <div class="row text-left">
            <div class="col">
              <div class=" m-l-md">
                <span class="h5 font-bold m-t block">$ 406,100</span>
                <small class="text-muted m-b block">Sales marketing report</small>
              </div>
            </div>
            <div class="col">
              <span class="h5 font-bold m-t block">$ 150,401</span>
              <small class="text-muted m-b block">Annual sales revenue</small>
            </div>
            <div class="col">
              <span class="h5 font-bold m-t block">$ 16,822</span>
              <small class="text-muted m-b block">Half-year revenue margin</small>
            </div>

          </div>
        </div>
        <div class="col-md-3">
          <div class="statistic-box">
            <h4>
              Project Beta progress
            </h4>
            <p>
              You have two project with not compleated task.
            </p>
            <div class="row text-center">
              <div class="col-lg-6">
                <canvas id="doughnutChart2" width="80" height="80" style="margin: 18px auto 0px; display: block;"></canvas>
                <h5>Kolter</h5>
              </div>
              <div class="col-lg-6">
                <canvas id="doughnutChart" width="80" height="80" style="margin: 18px auto 0px; display: block;"></canvas>
                <h5>Maxtor</h5>
              </div>
            </div>
            <div class="m-t">
              <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
            </div>

          </div>
        </div>

      </div> -->
      <!-- <div class="wrapper wrapper-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-4">
                <div class="ibox ">
                  <div class="ibox-title">
                    <h5>New data for the report</h5> <span class="label label-primary">IN+</span>
                    <div class="ibox-tools">
                      <a class="collapse-link" href="">
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
                      <a class="close-link" href="">
                        <i class="fa fa-times"></i>
                      </a>
                    </div>
                  </div>
                  <div class="ibox-content">
                    <div>

                      <div class="float-right text-right">

                        <span class="bar_dashboard" style="display: none;">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span><svg class="peity" height="16" width="100">
                          <rect fill="#1ab394" x="0" y="7.111111111111111" width="2.2580645161290325" height="8.88888888888889"></rect>
                          <rect fill="#d7d7d7" x="3.2580645161290325" y="10.666666666666668" width="2.2580645161290325" height="5.333333333333333"></rect>
                          <rect fill="#1ab394" x="6.516129032258065" y="0" width="2.2580645161290325" height="16"></rect>
                          <rect fill="#d7d7d7" x="9.774193548387098" y="5.333333333333334" width="2.2580645161290325" height="10.666666666666666"></rect>
                          <rect fill="#1ab394" x="13.03225806451613" y="7.111111111111111" width="2.2580645161290325" height="8.88888888888889"></rect>
                          <rect fill="#d7d7d7" x="16.290322580645164" y="0" width="2.2580645161290325" height="16"></rect>
                          <rect fill="#1ab394" x="19.548387096774196" y="3.555555555555557" width="2.2580645161290325" height="12.444444444444443"></rect>
                          <rect fill="#d7d7d7" x="22.806451612903228" y="10.666666666666668" width="2.2580645161290325" height="5.333333333333333"></rect>
                          <rect fill="#1ab394" x="26.06451612903226" y="7.111111111111111" width="2.2580645161290325" height="8.88888888888889"></rect>
                          <rect fill="#d7d7d7" x="29.322580645161292" y="12.444444444444445" width="2.2580645161290325" height="3.5555555555555554"></rect>
                          <rect fill="#1ab394" x="32.58064516129033" y="8.88888888888889" width="2.2580645161290325" height="7.111111111111111"></rect>
                          <rect fill="#d7d7d7" x="35.83870967741936" y="3.555555555555557" width="2.2580645161290325" height="12.444444444444443"></rect>
                          <rect fill="#1ab394" x="39.09677419354839" y="10.666666666666668" width="2.2580645161290325" height="5.333333333333333"></rect>
                          <rect fill="#d7d7d7" x="42.35483870967742" y="12.444444444444445" width="2.2580645161290325" height="3.5555555555555554"></rect>
                          <rect fill="#1ab394" x="45.612903225806456" y="3.555555555555557" width="2.2580645161290325" height="12.444444444444443"></rect>
                          <rect fill="#d7d7d7" x="48.87096774193549" y="0" width="2.2580645161290325" height="16"></rect>
                          <rect fill="#1ab394" x="52.12903225806452" y="5.333333333333334" width="2.2580645161290325" height="10.666666666666666"></rect>
                          <rect fill="#d7d7d7" x="55.38709677419355" y="8.88888888888889" width="2.2580645161290325" height="7.111111111111111"></rect>
                          <rect fill="#1ab394" x="58.645161290322584" y="7.111111111111111" width="2.2580645161290325" height="8.88888888888889"></rect>
                          <rect fill="#d7d7d7" x="61.903225806451616" y="3.555555555555557" width="2.2580645161290325" height="12.444444444444443"></rect>
                          <rect fill="#1ab394" x="65.16129032258065" y="10.666666666666668" width="2.2580645161290325" height="5.333333333333333"></rect>
                          <rect fill="#d7d7d7" x="68.41935483870968" y="12.444444444444445" width="2.2580645161290325" height="3.5555555555555554"></rect>
                          <rect fill="#1ab394" x="71.67741935483872" y="14.222222222222221" width="2.2580645161290325" height="1.7777777777777777"></rect>
                          <rect fill="#d7d7d7" x="74.93548387096774" y="15" width="2.2580645161290325" height="1"></rect>
                          <rect fill="#1ab394" x="78.19354838709678" y="0" width="2.2580645161290325" height="16"></rect>
                          <rect fill="#d7d7d7" x="81.45161290322581" y="7.111111111111111" width="2.2580645161290325" height="8.88888888888889"></rect>
                          <rect fill="#1ab394" x="84.70967741935485" y="5.333333333333334" width="2.2580645161290325" height="10.666666666666666"></rect>
                          <rect fill="#d7d7d7" x="87.96774193548387" y="1.7777777777777786" width="2.2580645161290325" height="14.222222222222221"></rect>
                          <rect fill="#1ab394" x="91.22580645161291" y="10.666666666666668" width="2.2580645161290325" height="5.333333333333333"></rect>
                          <rect fill="#d7d7d7" x="94.48387096774194" y="12.444444444444445" width="2.2580645161290325" height="3.5555555555555554"></rect>
                          <rect fill="#1ab394" x="97.74193548387098" y="14.222222222222221" width="2.2580645161290325" height="1.7777777777777777"></rect>
                        </svg>
                        <br>
                        <small class="font-bold">$ 20 054.43</small>
                      </div>
                      <h4>NYS report new data!
                        <br>
                        <small class="m-r"><a href="graph_flot.html"> Check the stock price! </a> </small>
                      </h4>
                    </div>
                  </div>
                </div>
                <div class="ibox ">
                  <div class="ibox-title">
                    <h5>Read below comments</h5>
                    <div class="ibox-tools">
                      <a class="collapse-link" href="">
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
                      <a class="close-link" href="">
                        <i class="fa fa-times"></i>
                      </a>
                    </div>
                  </div>
                  <div class="ibox-content no-padding">
                    <ul class="list-group">
                      <li class="list-group-item">
                        <p><a class="text-info" href="#">@Alan Marry</a> I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 minuts ago</small>
                      </li>
                      <li class="list-group-item">
                        <p><a class="text-info" href="#">@Stock Man</a> Check this stock chart. This price is crazy! </p>
                        <div class="text-center m">
                          <span id="sparkline8"><canvas width="170" height="150" style="display: inline-block; width: 170px; height: 150px; vertical-align: top;"></canvas></span>
                        </div>
                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 hours ago</small>
                      </li>
                      <li class="list-group-item">
                        <p><a class="text-info" href="#">@Kevin Smith</a> Lorem ipsum unknown printer took a galley </p>
                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small>
                      </li>
                      <li class="list-group-item ">
                        <p><a class="text-info" href="#">@Jonathan Febrick</a> The standard chunk of Lorem Ipsum</p>
                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 hour ago</small>
                      </li>
                      <li class="list-group-item">
                        <p><a class="text-info" href="#">@Alan Marry</a> I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 minuts ago</small>
                      </li>
                      <li class="list-group-item">
                        <p><a class="text-info" href="#">@Kevin Smith</a> Lorem ipsum unknown printer took a galley </p>
                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="ibox ">
                  <div class="ibox-title">
                    <h5>Your daily feed</h5>
                    <div class="ibox-tools">
                      <span class="label label-warning-light float-right">10 Messages</span>
                    </div>
                  </div>
                  <div class="ibox-content">

                    <div>
                      <div class="feed-activity-list">

                        <div class="feed-element">
                          <a class="float-left" href="profile.html">
                            <img alt="image" class="rounded-circle" src="img/profile.jpg">
                          </a>
                          <div class="media-body ">
                            <small class="float-right">5m ago</small>
                            <strong>Monica Smith</strong> posted a new blog. <br>
                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>

                          </div>
                        </div>

                        <div class="feed-element">
                          <a class="float-left" href="profile.html">
                            <img alt="image" class="rounded-circle" src="img/a2.jpg">
                          </a>
                          <div class="media-body ">
                            <small class="float-right">2h ago</small>
                            <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                            <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                          </div>
                        </div>
                        <div class="feed-element">
                          <a class="float-left" href="profile.html">
                            <img alt="image" class="rounded-circle" src="img/a3.jpg">
                          </a>
                          <div class="media-body ">
                            <small class="float-right">2h ago</small>
                            <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
                            <small class="text-muted">2 days ago at 8:30am</small>
                          </div>
                        </div>
                        <div class="feed-element">
                          <a class="float-left" href="profile.html">
                            <img alt="image" class="rounded-circle" src="img/a4.jpg">
                          </a>
                          <div class="media-body ">
                            <small class="float-right text-navy">5h ago</small>
                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                            <div class="actions">
                              <a href="" class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                              <a href="" class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                            </div>
                          </div>
                        </div>
                        <div class="feed-element">
                          <a class="float-left" href="profile.html">
                            <img alt="image" class="rounded-circle" src="img/a5.jpg">
                          </a>
                          <div class="media-body ">
                            <small class="float-right">2h ago</small>
                            <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                            <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                            <div class="well">
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                              Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                            </div>
                            <div class="float-right">
                              <a href="" class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                            </div>
                          </div>
                        </div>
                        <div class="feed-element">
                          <a class="float-left" href="profile.html">
                            <img alt="image" class="rounded-circle" src="img/profile.jpg">
                          </a>
                          <div class="media-body ">
                            <small class="float-right">23h ago</small>
                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                          </div>
                        </div>
                        <div class="feed-element">
                          <a class="float-left" href="profile.html">
                            <img alt="image" class="rounded-circle" src="img/a7.jpg">
                          </a>
                          <div class="media-body ">
                            <small class="float-right">46h ago</small>
                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                          </div>
                        </div>
                      </div>

                      <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>

                    </div>

                  </div>
                </div>

              </div>
              <div class="col-lg-4">
                <div class="ibox ">
                  <div class="ibox-title">
                    <h5>Alpha project</h5>
                    <div class="ibox-tools">
                      <a class="collapse-link" href="">
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
                      <a class="close-link" href="">
                        <i class="fa fa-times"></i>
                      </a>
                    </div>
                  </div>
                  <div class="ibox-content ibox-heading">
                    <h3>You have meeting today!</h3>
                    <small><i class="fa fa-map-marker"></i> Meeting is on 6:00am. Check your schedule to see detail.</small>
                  </div>
                  <div class="ibox-content inspinia-timeline">

                    <div class="timeline-item">
                      <div class="row">
                        <div class="col-4 date">
                          <i class="fa fa-briefcase"></i>
                          6:00 am
                          <br>
                          <small class="text-navy">2 hour ago</small>
                        </div>
                        <div class="col content no-top-border">
                          <p class="m-b-xs"><strong>Meeting</strong></p>

                          <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the
                            sale.</p>

                          <p><span data-diameter="40" class="updating-chart" style="display: none;">1,5,1,1,8,10,7,5,6,3,1,2,2,3,3,6,7,7,1,7,8,0,9,3,7,4,0,1,7,3,4,10,6,4,3,3,4</span><svg class="peity" height="16" width="64">
                              <polygon fill="#1ab394" points="0 15 0 14 1.7777777777777777 8 3.5555555555555554 14 5.333333333333333 14 7.111111111111111 3.5 8.88888888888889 0.5 10.666666666666666 5 12.444444444444443 8 14.222222222222221 6.5 16 11 17.77777777777778 14 19.555555555555554 12.5 21.333333333333332 12.5 23.11111111111111 11 24.888888888888886 11 26.666666666666664 6.5 28.444444444444443 5 30.22222222222222 5 32 14 33.77777777777778 5 35.55555555555556 3.5 37.33333333333333 15.5 39.11111111111111 2 40.888888888888886 11 42.666666666666664 5 44.44444444444444 9.5 46.22222222222222 15.5 48 14 49.77777777777777 5 51.55555555555555 11 53.33333333333333 9.5 55.11111111111111 0.5 56.888888888888886 6.5 58.666666666666664 9.5 60.44444444444444 11 62.22222222222222 11 64 9.5 64 15"></polygon>
                              <polyline fill="transparent" points="0 14 1.7777777777777777 8 3.5555555555555554 14 5.333333333333333 14 7.111111111111111 3.5 8.88888888888889 0.5 10.666666666666666 5 12.444444444444443 8 14.222222222222221 6.5 16 11 17.77777777777778 14 19.555555555555554 12.5 21.333333333333332 12.5 23.11111111111111 11 24.888888888888886 11 26.666666666666664 6.5 28.444444444444443 5 30.22222222222222 5 32 14 33.77777777777778 5 35.55555555555556 3.5 37.33333333333333 15.5 39.11111111111111 2 40.888888888888886 11 42.666666666666664 5 44.44444444444444 9.5 46.22222222222222 15.5 48 14 49.77777777777777 5 51.55555555555555 11 53.33333333333333 9.5 55.11111111111111 0.5 56.888888888888886 6.5 58.666666666666664 9.5 60.44444444444444 11 62.22222222222222 11 64 9.5" stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline>
                            </svg></p>
                        </div>
                      </div>
                    </div>
                    <div class="timeline-item">
                      <div class="row">
                        <div class="col-4 date">
                          <i class="fa fa-file"></i>
                          7:00 am
                          <br>
                          <small class="text-navy">3 hour ago</small>
                        </div>
                        <div class="col content">
                          <p class="m-b-xs"><strong>Send documents to Mike</strong></p>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                        </div>
                      </div>
                    </div>
                    <div class="timeline-item">
                      <div class="row">
                        <div class="col-4 date">
                          <i class="fa fa-coffee"></i>
                          8:00 am
                          <br>
                        </div>
                        <div class="col content">
                          <p class="m-b-xs"><strong>Coffee Break</strong></p>
                          <p>
                            Go to shop and find some products.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="timeline-item">
                      <div class="row">
                        <div class="col-4 date">
                          <i class="fa fa-phone"></i>
                          11:00 am
                          <br>
                          <small class="text-navy">21 hour ago</small>
                        </div>
                        <div class="col content">
                          <p class="m-b-xs"><strong>Phone with Jeronimo</strong></p>
                          <p>
                            Lorem Ipsum has been the industry's standard dummy text ever since.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="timeline-item">
                      <div class="row">
                        <div class="col-4 date">
                          <i class="fa fa-user-md"></i>
                          09:00 pm
                          <br>
                          <small>21 hour ago</small>
                        </div>
                        <div class="col content">
                          <p class="m-b-xs"><strong>Go to the doctor dr Smith</strong></p>
                          <p>
                            Find some issue and go to doctor.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="timeline-item">
                      <div class="row">
                        <div class="col-4 date">
                          <i class="fa fa-comments"></i>
                          12:50 pm
                          <br>
                          <small class="text-navy">48 hour ago</small>
                        </div>
                        <div class="col content">
                          <p class="m-b-xs"><strong>Chat with Monica and Sandra</strong></p>
                          <p>
                            Web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                          </p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div> -->
      <!-- <div class="footer">
        <div class="float-right">
          10GB of <strong>250GB</strong> Free.
        </div>
        <div>
          <strong>Copyright</strong> Example Company © 2014-2018
        </div>
      </div> -->
    </div>



  </div>
</body>




<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Flot -->
<script src="js/plugins/flot/jquery.flot.js"></script>
<script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/plugins/flot/jquery.flot.spline.js"></script>
<script src="js/plugins/flot/jquery.flot.resize.js"></script>
<script src="js/plugins/flot/jquery.flot.pie.js"></script>

<!-- Peity -->
<script src="js/plugins/peity/jquery.peity.min.js"></script>
<script src="js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="js/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="js/plugins/chartJs/Chart.min.js"></script>

<!-- Toastr -->
<script src="js/plugins/toastr/toastr.min.js"></script>

<script>
  $(document).ready(function() {
    let toast = $(".toast");

    setTimeout(function() {
      toast.toast({
        delay: 5000,
        animation: true,
      });
      toast.toast("show");
    }, 2200);

    var data1 = [
      [0, 4],
      [1, 8],
      [2, 5],
      [3, 10],
      [4, 4],
      [5, 16],
      [6, 5],
      [7, 11],
      [8, 6],
      [9, 11],
      [10, 30],
      [11, 10],
      [12, 13],
      [13, 4],
      [14, 3],
      [15, 3],
      [16, 6],
    ];
    var data2 = [
      [0, 1],
      [1, 0],
      [2, 2],
      [3, 0],
      [4, 1],
      [5, 3],
      [6, 1],
      [7, 5],
      [8, 2],
      [9, 3],
      [10, 2],
      [11, 1],
      [12, 0],
      [13, 2],
      [14, 8],
      [15, 0],
      [16, 0],
    ];
    $("#flot-dashboard-chart").length &&
      $.plot($("#flot-dashboard-chart"), [data1, data2], {
        series: {
          lines: {
            show: false,
            fill: true,
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4,
          },
          points: {
            radius: 0,
            show: true,
          },
          shadowSize: 2,
        },
        grid: {
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: "#d5d5d5",
        },
        colors: ["#1ab394", "#1C84C6"],
        xaxis: {},
        yaxis: {
          ticks: 4,
        },
        tooltip: false,
      });

    var doughnutData = {
      labels: ["App", "Software", "Laptop"],
      datasets: [{
        data: [300, 50, 100],
        backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"],
      }, ],
    };

    var doughnutOptions = {
      responsive: false,
      legend: {
        display: false,
      },
    };

    var ctx4 = document.getElementById("doughnutChart").getContext("2d");
    new Chart(ctx4, {
      type: "doughnut",
      data: doughnutData,
      options: doughnutOptions,
    });

    var doughnutData = {
      labels: ["App", "Software", "Laptop"],
      datasets: [{
        data: [70, 27, 85],
        backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"],
      }, ],
    };

    var doughnutOptions = {
      responsive: false,
      legend: {
        display: false,
      },
    };

    var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
    new Chart(ctx4, {
      type: "doughnut",
      data: doughnutData,
      options: doughnutOptions,
    });
  });

  $(window).bind("scroll", function() {
    let toast = $(".toast");
    toast.css("top", window.pageYOffset + 20);
  });
</script>
<script src="js/plugins/flot/jquery.flot.time.js"></script>


</html>