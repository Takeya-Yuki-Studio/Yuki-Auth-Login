<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/dbcon.php";

$appid=$_POST["appid"];
$appkey=$_POST["appkey"];

if((!$appid)||(!$appkey))
{
    $err=ErrorCode::BadRequest;
    header("HTTP/1.0 ".$err." ".ConvertErrCodeToMsg($err)." ",true);
    echo "Argument Error.\r\n";
    exit;
}
$sql='select * from Apps where appid=? and secret=?';
$app=db_read($sql,
    Array(
        new dbpara('i',$appid),
        new dbpara('s',$appkey)
    ));
if($app) {
    $ua=$app[0]["cURLAgent"];
    $cua=$_SERVER["HTTP_USER_AGENT"];
    if(strcmp($ua,$cua) != 0)
    {
        header("HTTP/1.0 ".$err." ".ConvertErrCodeToMsg($err)." ",true);
        echo "User-Agent Check Error.\r\n";
        exit;
    }
    else{
        echo $app[0]["appname"];
        exit;
    }
}
else{
    header("HTTP/1.0 ".$err." ".ConvertErrCodeToMsg($err)." ",true);
    echo "App Auth Error.\r\n";
    exit;
}