<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/mui.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/enum_values.php";
?>
<?php
function testdb()
{
    $con = mysqli_connect($_POST["server"], $_POST["user"], $_POST["password"],
        $_POST["database"], $_POST["port"]);
    if ($con != false) {
        mysqli_close($con);
        return dberror::OK;
    } else {
        return dberror::CONNECT_EXCEPTION;
    }
}

if(testdb()==dberror::OK){
    echo install::dbok;
}
else{
    echo install::dbfail;
}