<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/apicommon.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/errcode.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/webcheck.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/usercheck.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/antibot.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/mui.php";

$username=$_POST["username"];
$password=$_POST["password"];
$csrf_and_antibot=$_POST["csrf_and_antibot"];
$app=$_POST["app"];
$token=$_POST["key"];
$key=csrf_untoken($token);

if(!$key)
{
    $err=ErrorCode::BadRequest;
    header("HTTP/1.0 ".$err." ".ConvertErrCodeToMsg($err)." ",true);
    echo $token." Not Valid (Error).\r\n";
    exit;
}

$appinfo=web_check($app,$key);

$user=user_check($username,$password);

?>
<form id="f" name="f" method="post" action="<?php echo $appinfo["returnUrl"];?>">
    <input type="hidden" name="uid" id="uid" value="<?php echo $user["uid"]; ?>" />
    <script type="text/javascript" src="/api/webapi/jsbootstrapper.php/jquery-2.1.4"></script>
    <script type="text/javascript">$("#f").submit();</script>
</form>
