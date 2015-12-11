<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/apicommon.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/errcode.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/common/webcheck.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/antibot.php";

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
?>

<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/mui.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo cp::loginmsg($app["appname"]); ?></title>
    <link href="/api/webapi/cssbootstrapper.php/common,login" rel="stylesheet"/>
    <script type="text/javascript"
            src="/api/webapi/jsbootstrapper.php/jquery-2.1.4,weblogin"></script>
    <meta http-equiv="Content-Type" content="text/html,charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<div class="title"><?php echo cp::loginmsg($app["appname"]); ?></div>
    <form id="form" name="form" method="post" action="/api/webapi/webauth.php">
        <input type="text" id="username" name="username" placeholder="<?php echo login::username; ?>"/>
        <input type="password" id="password" name="password" placeholder="<?php echo login::password; ?>"/>
        <input type="hidden" id="csrf_and_antibot" name="csrf_and_antibot" value="<?php echo csrf_antibot();?>" />
        <input type="hidden" id="app" name="app" value="<?php echo $app["appid"];?>" />
        <input type="hidden" id="key" name="key" value="<?php echo csrf_token($app["secret"]); ?>" />
        <input type="hidden" id="info" name="info" value="base_info" />
        <input type="submit" id="login" value="<?php echo login::login?>" />
    </form>
</body>