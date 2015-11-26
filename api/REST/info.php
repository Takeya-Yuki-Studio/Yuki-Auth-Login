<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/dbcon.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/restcheck.php";

global $args;

$appid=$args->appid;
$appkey=$args->appkey;

$app=rest_check($appid,$appkey);


echo $app["appname"];
exit;