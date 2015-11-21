<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/config/dbconfig_r.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/config/dbconfig_w.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/common/enum_values.php";


/**
 * @param $sql
 * @param $paras
 * @return bool|string
 */
function db_write($sql, $paras)
{
    if (dbconfig_w::Provider == "mysqli") {
        //mysqli的情况
        if (extension_loaded("mysqli")) {
            $con = mysqli_connect(dbconfig_w::DataSource, dbconfig_w::UserID, dbconfig_w::Password,
                dbconfig_w::InitialCatalog, dbconfig_w::Port);
            if ($con != false) {
                if ($paras == null) {
                    $rel = mysqli_real_query($con, $sql);
                    $data = false;
                    if ($rel != false) {
                        $data = $rel;
                    } else {
                        $data = dberror::SQL_EXCEPTION;
                    }
                } else {
                    $mt = $con->stmt_init();
                    $mt->prepare($sql);
                    foreach ($paras as $para) {
                        $val = $para->value;
                        mysqli_stmt_bind_param($mt, $para->type, $val);
                    }
                    unset($para);
                    $rel = mysqli_stmt_execute($mt);
                    if ($rel != false) {
                        $data = $rel;
                    } else {
                        return dberror::SQL_EXCEPTION;
                    }
                }
                mysqli_close($con);
                return $data;
            } else {
                return dberror::CONNECT_EXCEPTION;
            }
        } else {
            return dberror::NO_MYSQLI_EXCEPTION;
        }
    } else {
        //mysql的情况
        if (extension_loaded("mysql")) {
            $con = mysql_connect(dbconfig_w::DataSource, dbconfig_w::UserID, dbconfig_w::Password,
                dbconfig_w::InitialCatalog, dbconfig_w::Port);
            if ($con != false) {
                if ($paras == null) {
                    $rel = mysql_query($con, $sql);
                    $data = false;
                    if ($rel != false) {
                        $data = true;
                    } else {
                        $data = dberror::SQL_EXCEPTION;
                    }
                } else {
                    $data = dberror::MYSQL_NO_PREPARE_EXCEPTION;
                }
                mysql_close($con);
                return $data;
            } else {
                return dberror::CONNECT_EXCEPTION;
            }
        } else {
            return dberror::NO_MYSQL_EXCEPTION;
        }
    }
}

/**
 * @param $sql
 * @param $paras
 * @return array|string
 */
function db_read($sql, $paras)
{
    if (dbconfig_r::Provider == "mysqli") {
        //mysqli的情况
        if (extension_loaded("mysqli")) {
            $con = mysqli_connect(dbconfig_r::DataSource, dbconfig_r::UserID, dbconfig_r::Password,
                dbconfig_r::InitialCatalog, dbconfig_r::Port);
            if ($con != false) {
                if ($paras == null) {
                    $table = mysqli_query($con, $sql);
                    $data = Array();
                    if ($table != false) {
                        while ($row = mysqli_fetch_object($table)) {
                            array_push($data, $row);
                        }
                    } else {
                        $data = dberror::SQL_EXCEPTION;
                    }
                } else {
                    $mt = $con->stmt_init();
                    $mt->prepare($sql);
                    foreach ($paras as $para) {
                        $val = $para->value;
                        mysqli_stmt_bind_param($mt, $para->type, $val);
                    }
                    unset($para);
                    mysqli_stmt_execute($mt);
                    $rel = mysqli_stmt_get_result($mt);
                    $data = Array();
                    if ($rel != false) {
                        while ($row = mysqli_fetch_array($rel)) {
                            array_push($data, $row);
                        }
                    } else {
                        return dberror::SQL_EXCEPTION;
                    }
                }
                mysqli_close($con);
                return $data;
            } else {
                return dberror::CONNECT_EXCEPTION;
            }
        } else {
            return dberror::NO_MYSQLI_EXCEPTION;
        }
    } else {
        //mysql的情况
        if (extension_loaded("mysql")) {
            $con = mysql_connect(dbconfig_r::DataSource, dbconfig_r::UserID, dbconfig_r::Password,
                dbconfig_r::InitialCatalog, dbconfig_r::Port);
            if ($con != false) {
                if ($paras == null) {
                    $table = mysql_query($con, $sql);
                    $data = Array();
                    if ($table != false) {
                        while ($row = mysql_fetch_object($table)) {
                            array_push($data, $row);
                        }
                    } else {
                        $data = dberror::SQL_EXCEPTION;
                    }
                } else {
                    $data = dberror::MYSQL_NO_PREPARE_EXCEPTION;
                }
                mysql_close($con);
                return $data;
            } else {
                return dberror::CONNECT_EXCEPTION;
            }
        } else {
            return dberror::NO_MYSQL_EXCEPTION;
        }
    }
}