<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/mui.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo cp::page_title; ?></title>
    <link href="/api/webapi/cssbootstrapper.php/common,cp" rel="stylesheet"/>
    <script type="text/javascript"
            src="/api/webapi/jsbootstrapper.php/jquery-2.1.4,cpindex"></script>
    <meta http-equiv="Content-Type" content="text/html,charset=UTF-8"/>
</head>
<body>
    <div class="title"><?php echo cp::login_title; ?></div>
    <div class="selectorlist">
        <div class="selector webapi">
            <?php echo cp::via_web; ?>
        </div>
        <div class="selector appapi">
            <?php echo cp::via_app; ?>
        </div>
    </div>
</body>