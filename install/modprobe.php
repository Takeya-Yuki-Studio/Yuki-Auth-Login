<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/mui.php";
include_once $_SERVER["DOCUMENT_ROOT"] ."/include/modules/dbconnect.php";
include_once $_SERVER["DOCUMENT_ROOT"] ."/include/common/dbpara.php";
?>
<?php
$path=$_SERVER["DOCUMENT_ROOT"]."/install/SqlScripts/".$_POST["key"].".".$_POST["value"].".sql";
$f = fopen($path, "r");
$sql = "";
while (!feof($f)) {
    $sql .= fgets($f);
}
$sqls = explode(";", $sql);
//var_dump($sqls);
fclose($f);
$ret=true;

foreach ($sqls as $sql2) {
    if (strlen($sql2) > 0) {
        //echo $sql2;
        $ret = db_write($sql2, null);

    }
}
if($ret === true)
{
    echo install::installok;
}
else{
    echo install::installfail;
}


