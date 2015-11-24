<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/mui.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html,charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, maximum-scale=1,minimum-scale=1.0,user-scalable=no" />
    <title><?php echo install::dbconftitle; ?></title>
    <style type="text/css"><?php echo install::dbconfcss; ?></style>
    <script src="/include/js/jquery-2.1.4.js" language="JavaScript" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript">
        $(document).ready(function(){
            $("#testr").click(function(){
                $.ajax({
                    type:"POST",
                    url:"/install/testdb.php",
                    data:{
                        server:$("#rsrv").val(),
                        port:$("#rport").val(),
                        database:$("#rdb").val(),
                        user:$("#ruid").val(),
                        password:$("#rpwd").val()
                    },
                    success:function(data){
                        alert(data);
                    },
                    error:function(e){
                        alert(e.status+"("+ e.statusText+")");
                    }
                });
            });
            $("#testw").click(function(){
                $.ajax({
                    type: "POST",
                    url: "/install/testdb.php",
                    data: {
                        server: $("#ssrv").val(),
                        port: $("#sport").val(),
                        database: $("#sdb").val(),
                        user: $("#suid").val(),
                        password: $("#spwd").val()
                    },
                    success: function (data) {
                        alert(data);
                    },
                    error: function (e) {
                        alert(e.status + "(" + e.statusText + ")");
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="conf title">
        <?php echo install::dbconftitle; ?>
    </div>
    <form action="dbconfig.php" method="post">
        <div id="rdbconf" class="conf">
            <div class="title"><?php echo install::dbconfread; ?></div>
            <hr/>
            <div class="fields" ><div><?php echo install::host?></div>
            <input type="text" id="rsrv" name="rsrv" /></div>
            <div class="fields" ><div><?php echo install::port?></div>
            <input type="number" id="rport" name="rport" /></div>
            <div class="fields" ><div><?php echo install::db?></div>
            <input type="text" id="rdb" name="rdb" /></div>
            <div class="fields" ><div><?php echo install::username?></div>
            <input type="text" id="ruid" name="ruid" /></div>
            <div class="fields" ><div><?php echo install::password?></div>
            <input type="password" id="rpwd" name="rpwd" /></div>
            <div class="fields" ><div></div>
            <input type="button" id="testr" value="<?php echo install::testdb?>"/></div>
        </div>
        <div id="wdbconf" class="conf">
            <div class="title"><?php echo install::dbconfwrite; ?></div>
            <hr/>
            <div class="fields" ><div><?php echo install::host?></div>
            <input type="text" id="ssrv" name="ssrv" /></div>
            <div class="fields" ><div><?php echo install::port?></div>
            <input type="number" id="sport" name="sport" /></div>
            <div class="fields" ><div><?php echo install::db?></div>
            <input type="text" id="sdb" name="sdb" /></div>
            <div class="fields" ><div><?php echo install::username?></div>
            <input type="text" id="suid" name="suid" /></div>
            <div class="fields" ><div><?php echo install::password?></div>
            <input type="password" id="spwd" name="spwd" /></div>
            <div class="fields" ><div></div>
            <input type="button" id="testw" value="<?php echo install::testdb?>"/></div>
        </div>
    </form>
</body>
</html>