<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/mui.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo login::page_title; ?></title>
    <link href="/include/css/pc_login.css" rel="stylesheet"/>
    <script type="text/javascript"
            src="/include/js/jquery-2.1.4.js"></script>
    <script type="text/javascript"
            src="/include/js/pc_login.js"></script>
    <meta http-equiv="Content-Type" content="text/html,charset=UTF-8"/>
</head>
<body>
<div class="head">
    <?php
    include "include/common/header.php";
    ?>
</div>
<div class="login_left">
    <div class="login_types">
        <div class="types active" id="login_normal"><?php echo login::login_normal ?></div>
        <div class="types" id="login_qr"><?php echo login::login_qr ?></div>
    </div>
    <div class="login_panel" id="normal_login">
        <input type="text" id="username" class="field line" placeholder="<?php echo login::username ?>"/>
        <input type="password" id="password" class="field line" placeholder="<?php echo login::password ?>"/>
        <input type="button" id="login_btn" class="field line button" value="<?php echo login::login ?>"/>

        <div class="line">
            <span class="line_types"><a href="/recover.php"><?php echo login::recover ?></a></span>
            <span class="line_types"><a href="/register.php"><?php echo login::register ?></a></span>
        </div>
    </div>
    <div class="login_panel" id="qr_login" style="display: none;">
        <img src="include/modules/qrcode.php?text=<?php echo
            "http://" . $_SERVER["HTTP_HOST"] . "/qrlogin/"; ?>&size=300&textsize=20&label="/>
        <span><?php echo login::qr_label ?></span>
        <span><a href="<?php echo login::qr_soft_package ?>"><?php echo login::qr_soft ?></a></span>
    </div>
</div>
<div class="login_right">
    <img src="/include/images/ad.jpg" alt="广告" style="height:422px"/>
</div>
<div class="foot">
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/include/common/footer.php";
    ?>
</div>
</body>
</html>