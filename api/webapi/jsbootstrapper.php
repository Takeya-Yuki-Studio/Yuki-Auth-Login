<?php

$path=$_SERVER["PATH_INFO"];
$path=ltrim($path,"\t\n\r\0\x0B/");
$files=explode(',',$path);

header("Content-Type: text/javascript");
header("Update Time: ".date("yyyy-MM-dd HH:mm:ss ZZZ"));
if(strcmp("$files","")==0)
{
    echo "/* No JS Selected */";
    exit();
}

$root=$_SERVER["DOCUMENT_ROOT"]."/api/webapi/js/";

// TEST js FILES
$jscheck=true;
foreach($files as $file){
    $js=fopen($root.$file.".js","rb");
    if($js){
        fclose($js);
    }
    else{
        $jscheck=false;
        $f=$file;
        break;
    }
}

if(!$jscheck){
    echo "/* $file is not found */\r\n";
    exit;
}
unset($file);
$jscontent="/* JS Starts Here */\r\n";
foreach($files as $file){
    $js=fopen($root.$file.".js","rb");
    if($js){
        $jscontent .= "/* BEGIN $file */\r\n";
        while (!feof($js)) {
            $jscontent .= fgets($js);
        }
        fclose($js);
        $jscontent .= "/* END $file */\r\n";
    }
}
$jscontent.="/* JS Ends Here */\r\n";
header("Content-Type: text/javascript");
header("Update Time: ".date("Y-m-d H:i:s"));
echo $jscontent;