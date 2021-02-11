<?php


$path = "/var/www/html/apache-monitor/config.json";
$str_data = file_get_contents($path);
$data = json_decode($str_data, true);
if ($argv[1] == "disk_space_notified")
    $data[$argv[1]] = $argv[2];
else
    $data[$argv[1]][$argv[2]]["notified"] = $argv[3];


$fh = fopen("/var/www/html/apache-monitor/config.json", 'w')
    or die("Error opening output file");
fwrite($fh, json_encode($data, JSON_UNESCAPED_UNICODE));
fclose($fh);
?>