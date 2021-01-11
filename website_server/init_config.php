<?php
require_once './library/config.php';
require_once './library/functions.php';


$errorMessage = '&nbsp;';
if (isset($_POST['login']) && isset($_POST['pwd'])) {
    $result = doLogin();
    if ($result != '') {
        $errorMessage = $result;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>server monitoring | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>



<body class="gray-bg">

    <div class="wrapper wrapper-content animated fadeInRight">


        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h1>Configuration Page</h1>
                        <p>this process is required to use the website</p>
                    </div>
                    <div class="ibox-content">
                        <form method="post">
                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Username :</label>
                                <div class="col-sm-10"><input type="text" class="form-control"></div>
                            </div>

                            <div class="form-group  row"><label class="col-sm-2 col-form-label">email :</label>
                                <div class="col-sm-10"><input type="email" placeholder="Enter email" class="form-control"></div>
                            </div>

                            <div class="form-group row"><label class="col-sm-2 col-form-label">Password :</label>
                                <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
                            </div>

                            <div class="form-group row"><label class="col-sm-2 col-form-label">Verify Password :</label>

                                <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
                            </div>

                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Databese name :</label>
                                <div class="col-sm-10"><input type="text" class="form-control">
                                    <span class="form-text m-b-none"><strong>NB</strong> : the old datebase will automaticly removed</span>
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
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>