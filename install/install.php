<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/mui.php";
?>
<!DOCTYPE html>
<html style="height: 95%;">
<head>
    <meta http-equiv="content-type" content="text/html,charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, maximum-scale=1,minimum-scale=1.0,user-scalable=no" />
    <title><?php echo install::dbconftitle; ?></title>
    <style type="text/css"><?php echo install::dbconfcss; ?></style>
    <script src="/include/js/jquery-2.1.4.js" language="JavaScript" type="text/javascript"></script>
    <script src="/install/install.js" language="JavaScript" type="text/javascript"></script>
</head>
<body style="height: 100%;">
<div class="conf title" style="height: 100%">
    <div class="fields" style="height: 100%">
        <textarea id="status" style="display: block;height: 90%;width:100%" readonly="readonly"></textarea>
        <div style="height: 10px;"></div>
        <input id="retry" type="button" value="<?php echo install::retry ?>" style="text-align: center;"/>
    </div>
</div>
</body>
</html>