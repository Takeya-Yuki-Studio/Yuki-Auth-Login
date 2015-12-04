<?php
include_once $_SERVER["DOCUMENT_ROOT"] ."/api/common/dbcon.php";
function user_check($uid,$upwd)
{
    $sql = 'select * from Users where name=? and password=?';
    $user = db_read($sql,
        Array(
            new dbpara('s', $uid),
            new dbpara('s', $upwd)
        ));
    if ($user) {
        return $user[0];
    } else {
        $err = ErrorCode::Accepted;
        header("HTTP/1.0 " . $err . " " . ConvertErrCodeToMsg($err) . " ", true);
        echo "User Auth Error.\r\n";
        exit;
    }
}