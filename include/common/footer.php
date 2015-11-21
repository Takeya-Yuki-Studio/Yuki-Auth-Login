<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/mui.php";

?>
<style type="text/css">
    .footer {
        width: 100%;
        text-align: center;
        font-size: 20px;
    }
</style>
<br/><br/>
<div class="footer">
    &copy;<?php echo version::copyright; ?><br/>
    <?php echo version::license; ?>
</div>