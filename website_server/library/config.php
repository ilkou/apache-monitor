<?php
ini_set('display_errors', 'on');
//ob_start("ob_gzhandler");
//error_reporting(E_ALL);

// start the session
session_start();

// database connection config

$dbHost = 'localhost';
$dbUser = 'rahimi';
$dbPass = 'rahimi1498';
$dbName = 'telaction';

// $dbHost = 'eu-cdbr-west-03.cleardb.net';
// $dbUser = 'b5c151ec4be64e';
// $dbPass = 'e8535c66';
// $dbName = 'heroku_b2d33a0075c36b6';




$thisFile = str_replace('\\', '/', __FILE__);
$docRoot = $_SERVER['DOCUMENT_ROOT'];

$webRoot  = str_replace(array($docRoot, 'library/config.php'), '', $thisFile);
$srvRoot  = str_replace('library/config.php', '', $thisFile);

define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);


if (isset($_POST)) {
	foreach ($_POST as $key => $value) {
		if (gettype($value) === "array")
			$value = implode(",", $value);
		$_POST[$key] =  htmlspecialchars($value);
	}
}

if (isset($_GET)) {
	foreach ($_GET as $key => $value) {
		if (gettype($value) === "array")
			$value = implode(",", $value);
		$_GET[$key] =  htmlspecialchars($value);
	}
}


require_once 'database.php';
