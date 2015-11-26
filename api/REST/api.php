<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/apicommon.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/errcode.php";

$path=$_SERVER["PATH_INFO"];
$path=ltrim($path,"\t\n\r\0\x0B/");
$patharr=explode('/',$path);

$args=new stdClass();

foreach($patharr as $pathitem){
    $argitemarr=explode("=",$pathitem);
    $args->$argitemarr[0]=$argitemarr[1];
}

$api=$args->method;

switch($api){
    case 'INFO':
        include $_SERVER["DOCUMENT_ROOT"] . "/api/REST/info.php";
        exit;
        break;
    case 'AUTH':
        include $_SERVER["DOCUMENT_ROOT"] . "/api/REST/login.php";
        exit;
        break;
    default:
        $err=ErrorCode::ApiNotFound;
        header("HTTP/1.0 ".$err." ".ConvertErrCodeToMsg($err)." ",true);
        echo $api." Not Found (Error).\r\n";
        exit;
        break;
}