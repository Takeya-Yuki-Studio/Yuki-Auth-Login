<?php

    include_once $_SERVER["DOCUMENT_ROOT"]."/include/common/dbpara.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/include/common/enum_values.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/include/modules/dbconnect.php";

    $f=fopen("dblogin.sql","r");
    $sql="";
    while(! feof($f))
    {
        $sql.= fgets($f);
    }
    $sqls=explode(";",$sql);
    //var_dump($sqls);
    fclose($f);

    foreach($sqls as $sql2)
    {
        if(strlen($sql2)>0) {
            db_write($sql2, null);
        }
    }
    echo "SQL INIT OK";