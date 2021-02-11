<link href="<?php echo WEB_ROOT ?>css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">


<?php 

$configuration = getConfiguration();
?>
<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h1>Configuration Page</h1>
        </div>
        <div class="ibox-content">
            <form action="<?php echo WEB_ROOT; ?>views/process.php?cmd=config" method="post">
                <input type="text" value="dsdsdsd" hidden>

                <div class="form-group  row">
                    <label label class="col-sm-3 col-form-label">Storage Alert</label>
                    <div class="col-sm-9">
                        <input  name="percentage" id="ionrange_3" />
                        <span class="form-text m-b-none"></span>
                    </div>
                </div>


         
                <div class="form-group  row"><label class="col-sm-3 col-form-label">Notification email :</label>
                    <div class="col-sm-9">
                        <input name="email" type="email" 
                        placeholder="Enter email" 
                        value="<?php echo $configuration['email'] ?>" 
                        class="form-control"></div>
                </div>

                <div class="form-group  row">
                    <label class="col-sm-3 col-form-label">
                        SMS API Token :
                    </label>
                    <div class="col-sm-9">
                        <input name="sms_api_token" type="text" placeholder="Enter Token" 
                        value="<?php echo $configuration['sms_api_token'] ?>" 
                        class="form-control">
                    </div>
                </div>
                <div class="form-group  row"><label class="col-sm-3 col-form-label">
                        SMS API Phone :
                    </label>
                    <div class="col-sm-9">
                        <input name="sms_api_tel" type="tel" placeholder="Enter Phone" 
                        value="<?php echo $configuration['sms_api_tel'] ?>" 
                        class="form-control">
                    </div>
                </div>

                <div class="form-group  row"><label class="col-sm-3 col-form-label">
                        Cron file location :
                    </label>
                    <div class="col-sm-9">
                        <input name="cron_location" type="text" placeholder="Enter location" 
                        value="<?php echo $configuration['cron_location'] ?>" 
                        class="form-control">
                    </div>
                </div>


                <div class="hr-line-dashed"></div>
                <div class="form-group row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
