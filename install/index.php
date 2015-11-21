<?php
include_once "checkfunc.php";

if(!checkphp())
{
    echo "你的PHP版本过低,请先升级PHP后再试";
}
else{
    header("location: dbconfig.php");
}