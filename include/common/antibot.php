<?php


function csrf_antibot(){
    return base64_encode(date("Y-m-d H:i:s"));
}

function csrf_token($key){
    return $key;
}