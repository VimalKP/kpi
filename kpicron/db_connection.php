<?php

ob_start();
header("Cache-control: private, no-cache");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Pragma: no-cache");
header("Cache: no-cahce");
ini_set('max_execution_time', 90000);  //30 minutes
ini_set("memory_limit", -1);
//$isLocal = false;
$isLocal = true;
//define our connection parameter
if ($isLocal == true) {
    define('DB_SERVER', 'localhost'); // eg, localhost - should not be empty for productive servers
    define('DB_SERVER_USERNAME', 'root');
    define('DB_SERVER_PASSWORD', '');
    define('DB_DATABASE', 'kpi');//name of database
    $conn = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD) or die("Unable to connect with server");
    mysql_select_db(DB_DATABASE) or die("Unable to select database");
}
define('API_HOST', 'https://api.twitter.com/1.1/');
ob_end_flush();
?>