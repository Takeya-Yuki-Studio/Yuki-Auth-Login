<?php
/**
 * Created by PhpStorm.
 * User: UIHARU
 * Date: 2015/10/16
 * Time: 14:14
 */
const PHP_MIN = 50500;//PHP 5.6.* is needed
const PHP_MIN_DESC = "5.5";

function checkphp()
{
    return PHP_VERSION_ID >= PHP_MIN;
}
