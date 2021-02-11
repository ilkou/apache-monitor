<?php
$services = getApplications();
$i = 0;
?>

<div class="col">
    <div class="ibox">
        <div class="ibox-content">

            <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded h3" data-page-size="15">
                <thead>
                    <tr>

                        <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">

                            <span class="footable-sort-indicator">
                                Application name
                            </span>
                        </th>
                        <th data-hide="phone" class="footable-visible footable-sortable">
                            <span class="footable-sort-indicator">
                                url
                            </span>
                        </th>
                        <th data-hide="phone" class="footable-visible footable-sortable">
                            <span class="footable-sort-indicator">
                                string
                            </span>
                        </th>
                        <th data-hide="phone" class="footable-visible footable-sortable">
                            <span class="footable-sort-indicator">
                                status
                            </span>
                        </th>
                        <th data-hide="phone" class="footable-visible footable-sortable">
                            <span class="footable-sort-indicator">
                                action
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($services as $rec) {

                        extract($rec);
                    ?>
                        <tr class="footable-even" style="">
                            <td class="footable-visible footable-first-column">
                                <span class="footable-toggle"> <?php echo $name ?></span>

                            </td>

                            <td class="footable-visible footable-first-column">
                                <span class="footable-toggle"> <?php echo $url ?></span>
                            </td>

                            <td class="footable-visible footable-first-column">
                                <span class="footable-toggle"> <?php echo $string ?></span>
                            </td>

                            <td class="footable-visible" style="">
                                <?php if ($status == "enabled") { ?>
                                    <span class="label label-primary">Enable</span>
                                <?php } else { ?>
                                    <span class="label label-danger">Disabled</span>
                                <?php } ?>
                            </td>

                            <td class="footable-visible" style="">
                                <form action="<?php echo WEB_ROOT; ?>views/process.php?cmd=startService" method="post">
                                    <input type="hidden" name="token" value="<?= $_SESSION['apache_monitor_token'] ?>" />
                                    <input type="hidden" name="i" value="<?php echo $i ?>" />
                                    <button class="btn-white btn btn-ms">start</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    } ?>
                </tbody>
            </table>
            <div class="text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Add application
                </button>
            </div>
            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">MAdd new Application</h4>
                        </div>
                        <form action="<?php echo WEB_ROOT; ?>views/process.php?cmd=newApp" method="post">
                        <div class="modal-body">

                            
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Application Name</label>

                                    <div class="col-lg-10">
                                        <input type="text" name="name" placeholder="app3" class="form-control">
                                    </div>
                                </div>
                            
                           
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Application URL</label>

                                    <div class="col-lg-10">
                                        <input type="text" name="url" placeholder="http:..." class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Application String
                                    </label>

                                    <div class="col-lg-10">
                                        <input type="text" name="string" placeholder="apache  monitor" class="form-control">
                                    </div>
                                </div>



                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>