<?php
/**
 * Created by PhpStorm.
 * User: UIHARU
 * Date: 2015/10/16
 * Time: 11:39
 */
header("Content-Type:text/mysql");
include_once "include/modules/dbconnect.php";
include_once "include/common/dbpara.php";

$r=db_read("select 'ok' from Accounts where UserName = ? and Password= ?",
    Array(
        new dbpara("s","admin"),
        new dbpara("s","admin")
    ));

var_dump($r);
