<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/dbcon.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/curlcheck.php";

$appid=$_POST["appid"];
$appkey=$_POST["appkey"];

$app=curl_check($appid,$appkey);


echo $app["appname"];
exit;