<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/errcode.php";

$api=$_POST["method"];

switch($api){
    case 'INFO':
        include $_SERVER["DOCUMENT_ROOT"] . "/api/cURL/info.php";
        exit;
        break;
    default:
        $err=ErrorCode::ApiNotFound;
        header("HTTP/1.0 ".$err." ".ConvertErrCodeToMsg($err)." ",true);
        echo $api." Not Found.\r\n";
        exit;
        break;
}