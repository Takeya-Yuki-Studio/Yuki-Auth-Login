<?php

$path=$_SERVER["PATH_INFO"];
$path=ltrim($path,"\t\n\r\0\x0B/");
$files=explode(',',$path);

header("Content-Type: text/css");
header("Update Time: ".date("yyyy-MM-dd HH:mm:ss ZZZ"));
if(strcmp("$files","")==0)
{
    echo "/* No CSS Selected */";
    exit();
}

$root=$_SERVER["DOCUMENT_ROOT"]."/api/webapi/css/";

// TEST CSS FILES
$csscheck=true;
foreach($files as $file){
    $css=fopen($root.$file.".css","rb");
    if($css){
       fclose($css);
    }
    else{
        $csscheck=false;
        $f=$file;
        break;
    }
}

if(!$csscheck){
    echo "/* $file is not found */\r\n";
    exit;
}
unset($file);
$csscontent="/* CSS Starts Here */\r\n";
foreach($files as $file){
    $css=fopen($root.$file.".css","rb");
    if($css){
        $csscontent .= "/* BEGIN $file */\r\n";
        while (!feof($css)) {
            $csscontent .= fgets($css);
        }
        fclose($css);
        $csscontent .= "/* END $file */\r\n";
    }
}
$csscontent.="/* CSS Ends Here */\r\n";
header("Content-Type: text/css");
header("Update Time: ".date("Y-m-d H:i:s"));
echo $csscontent;
