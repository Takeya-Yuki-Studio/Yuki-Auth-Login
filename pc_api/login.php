<?php

header("Content-Type:text/json");
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/dbpara.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/enum_values.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/modules/dbconnect.php";
$username = "";
$password = "";
if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
}
$ret = db_read("select 'ok' from Accounts where UserName = ? and Password= ?",
    Array(
        new dbpara("s", $username),
        new dbpara("s", $password)
    ));
//var_dump($ret);
if (is_array($ret) && count($ret) == 1) {
    echo "{\"login\":\"OK\"}";
} else if (is_array($ret)) {
    echo "{\"login\":\"FAILED\"}";
} else {
    echo "{\"login\":\"" . $ret . "\"}";
}
?>