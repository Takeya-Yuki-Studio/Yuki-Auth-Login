<?php
include_once $_SERVER["DOCUMENT_ROOT"] ."/api/common/dbcon.php";
/**
* @param $appid
* @param $appkeys
* @return mixed
*/
function web_check($appid,$appkey)
{
if ((!$appid) || (!$appkey)) {
$err = ErrorCode::BadRequest;
header("HTTP/1.0 " . $err . " " . ConvertErrCodeToMsg($err) . " ", true);
echo "Argument Error.\r\n";
exit;
}
$sql = 'select * from Apps where appid=? and secret=?';
$app = db_read($sql,
Array(
new dbpara('i', $appid),
new dbpara('s', $appkey)
));
if ($app) {
$err = ErrorCode::Accepted;
return $app[0];
} else {
$err = ErrorCode::Accepted;
header("HTTP/1.0 " . $err . " " . ConvertErrCodeToMsg($err) . " ", true);
echo "App Auth Error.\r\n";
exit;
}
}