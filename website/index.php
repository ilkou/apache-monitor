<?php
require_once './library/config.php';
require_once './library/functions.php';


// check if user is connected( check $_SESSION)
checkFDUser();
checkInitConfig();
$content = 'views/dashboard.php';

$pageTitle = '';
$script = array();

require_once 'include/template.php';
?>