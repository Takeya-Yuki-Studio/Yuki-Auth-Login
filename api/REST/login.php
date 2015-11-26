<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/dbcon.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/restcheck.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/usercheck.php";

global $args;

$appid=$args->appid;
$appkey=$args->appkey;

$app=rest_check($appid,$appkey);

$uid=$args->uname;
$upwd=$args->upwd;

$user=user_check($uid,$upwd);
echo $user["uid"];