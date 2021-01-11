<?php
ini_set('display_errors', 'on');
// start the session
session_start();

// database connection config

$dbHost = 'localhost';
$dbUser = 'rahimi';
$dbPass = 'rahimi1498';
$dbName = 'telaction';




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
