<!-- <div id="gauge1" class="gauge-container"></div> -->
<!-- style="background-color: #272b30;" -->
<div class="ibox">
    <div class="ibox-content text-center p-md">

        <h4 class="m-b-xxs">System Overview</h4>
        <div class="d-flex justify-content-center">
            <div class="col-sm-4">
            
                <div id="cpu" class="gauge-container"></div>
                CPU
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-sm-3">
                    <div id="disk_read" class="gauge-container"></div>
                    Disk Read
                </div>
                <div class="col-sm-2">
                    <div id="disk_write" class="gauge-container"></div>
                    Disk Write
                </div>
                <div class="col-sm-2">
                    <div id="ipv4_inbound" class="gauge-container"></div>
                    Ipv4 Inbound
                </div>
                <div class="col-sm-2">
                    <div id="ipv4_outbound" class="gauge-container"></div>
                    Ipv4 Outbound
                </div>
                <div class="col-sm-3">
                    <div id="used_ram" class="gauge-container"></div>
                    Used Ram
                </div>

            </div>
        </div>

    </div>
</div>

<?php include('cpu.php');?>
<?php include('disk.php');?>
<?php include('ram.php');?>
<?php include('network.php');?>
<script src="<?php echo WEB_ROOT; ?>js/plugins/guage/gauge.min.js"></script>
<script>
    var cpu = Gauge(
        document.getElementById("cpu"), {
            min: -100,
            max: 100,
            dialStartAngle: 180,
            dialEndAngle: 0,
            value: 90,
            label: function(value) {
                return 2.5 + "Gb";
            },
            viewBox: "0 0 100 57",
            color: function(value) {
                if (value < 20) {
                    return "#5ee432";
                } else if (value < 40) {
                    return "#fffa50";
                } else if (value < 60) {
                    return "#f7aa38";
                } else {
                    return "#ef4655";
                }
            }
        }
    );


    var disk_read = Gauge(
        document.getElementById("disk_read"), {
            max: 100,
            value: 60,
            label: function(value) {
                return Math.round(value) ;
            },
            color: function(value) {
                if (value < 20) {
                    return "#5ee432";
                } else if (value < 40) {
                    return "#fffa50";
                } else if (value < 60) {
                    return "#f7aa38";
                } else {
                    return "#ef4655";
                }
            }
        }
    );

    var disk_write = Gauge(
        document.getElementById("disk_write"), {
            max: 100,
            value: 30,
            label: function(value) {
                return Math.round(value);
            },
            color: function(value) {
                if (value < 20) {
                    return "#5ee432";
                } else if (value < 40) {
                    return "#fffa50";
                } else if (value < 60) {
                    return "#f7aa38";
                } else {
                    return "#ef4655";
                }
            }
        }
    );

    var ipv4_inbound = Gauge(
        document.getElementById("ipv4_inbound"), {
            max: 100,
            value: 50,
            label: function(value) {
                return Math.round(value);
            },
            color: function(value) {
                if (value < 20) {
                    return "#5ee432";
                } else if (value < 40) {
                    return "#fffa50";
                } else if (value < 60) {
                    return "#f7aa38";
                } else {
                    return "#ef4655";
                }
            }
        }
    );

    var ipv4_outbound = Gauge(
        document.getElementById("ipv4_outbound"), {
            max: 100,
            value: 20,
            label: function(value) {
                return Math.round(value);
            },
            color: function(value) {
                if (value < 20) {
                    return "#5ee432";
                } else if (value < 40) {
                    return "#fffa50";
                } else if (value < 60) {
                    return "#f7aa38";
                } else {
                    return "#ef4655";
                }
            }
        }
    );

    var used_ram = Gauge(
        document.getElementById("used_ram"), {
            max: 100,
            value: 60,
            label: function(value) {
                return Math.round(value) ;
            },
            color: function(value) {
                if (value < 20) {
                    return "#5ee432";
                } else if (value < 40) {
                    return "#fffa50";
                } else if (value < 60) {
                    return "#f7aa38";
                } else {
                    return "#ef4655";
                }
            }
        }
    );
</script>