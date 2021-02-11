<?php
$services = getServices();
$i = 0;
// print_r(getenv("AM_LOCATION"));
// echo getenv ("AM_LOCATION");
?>

<div class="col">
    <div class="ibox">
        <div class="ibox-content">

            <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded h3" data-page-size="15">
                <thead>
                    <tr>

                        <th data-toggle="true" class="footable-visible footable-first-column footable-sortable"><span class="footable-sort-indicator">Nom de service</span></th>
                        <th data-hide="phone" class="footable-visible footable-sortable"><span class="footable-sort-indicator">Monitored</span></th>
                        <th data-hide="phone" class="footable-visible footable-sortable"><span class="footable-sort-indicator">State</span></th>
                        <th class="text-right footable-visible footable-last-column" data-sort-ignore="true">Action</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($services as $rec) {

                        extract($rec);
                    ?>
                        <tr class="footable-even" style="">
                            <td class="footable-visible footable-first-column"><span class="footable-toggle"><?php echo $service ?></span>
                                
                            </td>

                            <td class="footable-visible" style="">
                                <?php if ($status == "enabled") { ?>
                                    <span class="label label-primary">Enable</span>
                                <?php } else { ?>
                                    <span class="label label-danger">Disabled</span>
                                <?php } ?>
                            </td>


                            <td class="footable-visible" style="">
                                <?php if ($state == "started") { ?>
                                    <span class="label label-primary">Started</span>
                                <?php } else { ?>
                                    <span class="label label-danger">Stopped</span>
                                <?php } ?>
                            </td>

                            <td class="text-right footable-visible footable-last-column">
                                <div class="btn-group">

                                    <?php if ($state == "started") { ?>
                                        <form action="<?php echo WEB_ROOT; ?>views/process.php?cmd=stopService" method="post">
                                            <input type="hidden" name="token" value="<?= $_SESSION['apache_monitor_token'] ?>" />
                                            <input type="hidden" name="i" value="<?php echo $i ?>" />

                                            <input type="hidden" name="cmd" value="<?php echo $cmd ?>" />
                                            <button class="btn-white btn btn-ms">stop</button>
                                        </form>
                                    <?php } else { ?>
                                        <form action="<?php echo WEB_ROOT; ?>views/process.php?cmd=startService" method="post">
                                            <input type="hidden" name="token" value="<?= $_SESSION['apache_monitor_token'] ?>" />
                                            <input type="hidden" name="i" value="<?php echo $i ?>" />

                                            <input type="hidden" name="cmd" value="<?php echo $cmd ?>" />
                                            <button class="btn-white btn btn-ms">start</button>
                                        </form>
                                    <?php } ?>


                                </div>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    } ?>
                    <!-- <tr class="footable-even" style="">
                        <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                            Example product 3
                        </td>
                       
                        <td class="footable-visible">
                            <span class="label label-danger">Disabled</span>
                        </td>
                        <td class="footable-visible">
                            rerereerer
                        </td>
                        <td class="text-right footable-visible footable-last-column">
                            <div class="btn-group">
                                 <button class="btn-white btn btn-xs">stop</button>
                                <button class="btn-white btn btn-xs">start</button>
                            </div>
                        </td>
                    </tr>
                  
                    <tr class="footable-even" style="">
                        <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                            Example product 5
                        </td>
                      
                        <td class="footable-visible">
                            <span class="label label-warning">Loaded</span>
                        </td>
                        <td class="footable-visible">
                            dfwrwrwwwrwwrw
                        </td>
                        <td class="text-right footable-visible footable-last-column">
                            <div class="btn-group">
                            <button class="btn-white btn btn-xs">stop</button>
                                <button class="btn-white btn btn-xs">start</button>
                            </div>
                        </td>
                    </tr> -->




                </tbody>

            </table>

        </div>
    </div>
</div>