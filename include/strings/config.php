<?php

$LANGLIST = $_SERVER["HTTP_ACCEPT_LANGUAGE"];

$LANG = "";

$ARR = explode(",", $LANGLIST);

foreach ($ARR as $LANGUAGE) {
    $LNG = explode(";", $LANGUAGE);
    break;
}

$LNG = $LNG[0];

$LNG = explode("-", $LNG);

$LNG = $LNG[0];

if (strcmp($LNG, "")) {
    $LANG = "ja";
} else {
    $LANG = $LNG;
}

?>