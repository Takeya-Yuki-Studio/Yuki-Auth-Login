<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/apicommon.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/errcode.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/webcheck.php";

$id=$_GET["appid"];
$key=$_GET["appsecret"];
$ref=$_SERVER["HTTP_REFERER"];
if($ref) {
    $uri = parse_url($ref);
// HTTPS CHECK
    if (strcmp($uri["scheme"], "https") != 0) {
        $err = ErrorCode::BadRequest;
        header("HTTP/1.0 " . $err . " " . ConvertErrCodeToMsg($err), true);
        echo 'HTTPS ONLY<br/>';
        echo "<a href=\"javascript:history.go(-1)\">Go Back</a>";
        exit;
    }
}

//APP CHECK
$app=web_check(intval($id),$key);
if(strcmp($app["apptype"],"Web")!=0)
{
    echo 'NOT WEBAPP<br/>';
    echo "<a href=\"javascript:history.go(-1)\">Go Back</a>";
    exit();
}
$appuri=parse_url($app["returnUrl"]);

//REF CHECK
if($ref) {
    $uri = parse_url($ref);
    if (strcmp($uri["host"], $appuri["host"]) != 0) {
        $err = ErrorCode::BadRequest;
        header("HTTP/1.0 " . $err . " " . ConvertErrCodeToMsg($err), true);
        echo 'REFERER ERROR<br/>';
        echo "<a href=\"javascript:history.go(-1)\">Go Back</a>";
        exit;
    }
}