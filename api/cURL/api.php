<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/apicommon.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/errcode.php";

$api=$_POST["method"];

switch($api){
    case 'INFO':
        include $_SERVER["DOCUMENT_ROOT"] . "/api/cURL/info.php";
        exit;
        break;
    case 'AUTH':
        include $_SERVER["DOCUMENT_ROOT"] . "/api/cURL/login.php";
        exit;
        break;
    default:
        $err=ErrorCode::ApiNotFound;
        header("HTTP/1.0 ".$err." ".ConvertErrCodeToMsg($err)." ",true);
        echo $api." Not Found (Error).\r\n";
        exit;
        break;
}