<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/dbcon.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/curlcheck.php";

$appid=$_POST["appid"];
$appkey=$_POST["appkey"];

$app=curl_check($appid,$appkey);

$uid=$_POST["uname"];
$upwd=$_POST["upwd"];

$user=user_check($uid,$upwd);
echo $user["uid"];