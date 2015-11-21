<?php
/**
 * Created by PhpStorm.
 * User: UIHARU
 * Date: 2015/10/16
 * Time: 14:13
 */

$rdb=$_POST["rdb"];
$rsrv=$_POST["rsrv"];
$ruid=$_POST["ruid"];
$rpwd=$_POST["rpwd"];
$rport=$_POST["rport"];

$sdb=$_POST["sdb"];
$ssrv=$_POST["ssrv"];
$suid=$_POST["suid"];
$spwd=$_POST["spwd"];
$sport=$_POST["sport"];

$template_r="<?php"."\r\n"."class dbconfig_r"."{"."\r\n".
    "const DataSource=\"".$rsrv."\";"."\r\n".
    "const Port=".$rport.";"."\r\n".
    "const UserID=\"".$ruid."\";"."\r\n".
    "const Password=\"".$rpwd."\";"."\r\n".
    "const InitialCatalog=\"".$rdb."\";"."\r\n".
    "const Provider=\"mysqli\";"."\r\n"."}"."\r\n";

$template_w="<?php"."\r\n"."class dbconfig_w"."{"."\r\n".
    "const DataSource=\"".$ssrv."\";"."\r\n".
    "const Port=".$sport.";"."\r\n".
    "const UserID=\"".$suid."\";"."\r\n".
    "const Password=\"".$spwd."\";"."\r\n".
    "const InitialCatalog=\"".$sdb."\";"."\r\n".
    "const Provider=\"mysqli\";"."\r\n"."}"."\r\n";

$rc=$_SERVER["DOCUMENT_ROOT"]."/config/dbconfig_r.php";
$sc=$_SERVER["DOCUMENT_ROOT"]."/config/dbconfig_w.php";

$r=fopen($rc,"w");
$s=fopen($sc,"w");

fputs($r,$template_r);
fputs($s,$template_w);

fclose($r);
fclose($s);