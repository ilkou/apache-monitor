<!-- <div id="gauge1" class="gauge-container"></div> -->
<!-- style="background-color: #272b30;" -->

<style>

</style>
<?php
require './library/serverInfo.php'
?>

<div class="ibox">
    <div class="ibox-content text-center p-md">
        <h3> shapeSpace_system_load :<?php

                                        echo shapeSpace_system_load();

                                        ?>
        </h3>
        <h3>shapeSpace_system_cores : <?php

                                        echo shapeSpace_system_cores();

                                        ?>
        </h3>
        <h3>shapeSpace_http_connections :
            <?php
            echo shapeSpace_http_connections();

            ?>

        </h3>
        <h3>shapeSpace_server_memory_usage:
            <?php
            echo shapeSpace_server_memory_usage();

            ?>
        </h3>
        <h3>shapeSpace_disk_usage:
            <?php
            echo shapeSpace_disk_usage()

            ?>
        </h3>
        <h3>shapeSpace_server_uptime:
            <?php
            echo shapeSpace_server_uptime()
            ?>
        </h3>
        <h3>
            <?php
            echo shapeSpace_kernel_version()
            ?>
        </h3>
        <h3>shapeSpace_number_processes:
            <?php
            echo shapeSpace_number_processes()
            ?>
        </h3>

        <h3>shapeSpace_memory_usage:
            <?php
            echo shapeSpace_memory_usage()
            ?>
        </h3>
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
                    <div id="disk_usage" class="gauge-container"></div>
                    Disk Usage
                </div>
                <div class="col-sm-2">
                    <div id="disk_memory" class="gauge-container"></div>
                    Disk Memory Used
                </div>
                <div class="col-sm-2">
                    <div id="http_connections" class="gauge-container"></div>
                    Http Connections
                </div>
                <div class="col-sm-2">
                    <div id="ram_memory" class="gauge-container"></div>
                    Ram Memory Used
                </div>
                <div class="col-sm-3">
                    <div id="used_ram" class="gauge-container"></div>
                    Used Ram
                </div>

            </div>
        </div>

    </div>
</div>
<!-- 
<?php include('cpu.php'); ?>
<?php include('disk.php'); ?>
<?php include('ram.php'); ?>
<?php include('network.php'); ?> -->
<script src="<?php echo WEB_ROOT; ?>js/plugins/guage/gauge.min.js"></script>
<script>
    var cpu = Gauge(
        document.getElementById("cpu"), {
            min: -100,
            max: 100,
            dialStartAngle: 180,
            dialEndAngle: 0,
            value: <?php echo shapeSpace_system_load() ?>,
            label: function(value) {
                return value;
                //return 2.5 + "Gb";
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


    var disk_usage = Gauge(
        document.getElementById("disk_usage"), {
            max: 100,
            value: <?php echo shapeSpace_disk_usage() ?>,
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

    var disk_memory = Gauge(
        document.getElementById("disk_memory"), {
            max: <?php echo disk_total_space('/')  / 1000000000.0 ; ?>,
            value: <?php echo diskuse() ?>,
            label: function(value) {
                return value.toFixed(2) + "Gb";
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

    var http_connections = Gauge(
        document.getElementById("http_connections"), {
            max: 100,
            value: <?php echo  shapeSpace_http_connections(); ?>,
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

    var ram_memory = Gauge(
        document.getElementById("ram_memory"), {
            max: <?php echo total_ram_memory() ?>,
            value: <?php echo used_ram_memory()?> ,
            label: function(value) {
                return (value / 1000000.0) .toFixed(2) + "Gb";
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
            value: <?php echo shapeSpace_server_memory_usage() ?>,
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

    setInterval(function() {
        $.ajax({
                url: "<?php echo WEB_ROOT; ?>library/serverInfo.php?cmd=ram",
                success: function(data) {
                    used_ram.setValue(data);
                }
            } );

            $.ajax({
                url: "<?php echo WEB_ROOT; ?>library/serverInfo.php?cmd=disk",
                success: function(data) {
                    disk_usage.setValue(data);
                }
            })

        $.ajax({
            url: "<?php echo WEB_ROOT; ?>library/serverInfo.php?cmd=cpu",
            success: function(data) {
                cpu.setValue(data);
            }
        });

        $.ajax({
            url: "<?php echo WEB_ROOT; ?>library/serverInfo.php?cmd=http_connections",
            success: function(data) {
                http_connections.setValue(data);
            }
        });

        $.ajax({
            url: "<?php echo WEB_ROOT; ?>library/serverInfo.php?cmd=diskuse",
            success: function(data) {
                disk_memory.setValue(data);
            }
        });

        $.ajax({
            url: "<?php echo WEB_ROOT; ?>library/serverInfo.php?cmd=used_ram_memory",
            success: function(data) {
                ram_memory.setValue(data);
            }
        });

    }, 2000);

</script>