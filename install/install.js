/**
 * Created by yuki on 2015/11/24.
 */
var modules=[
    {key:"01",value:"groups"},
    {key:"02",value:"users"},
    {key:"03",value:"initdata"},
    {key:"04",value:"apps"},
    {key:"05",value:"accesstoken"}

];

var current=0;

function installone(module){
    $.ajax({
        type: "POST",
        url: "/install/insmod.php",
        data: module,
        success: function (data) {
            $("#status").text($("#status").text()+data);
            $.ajax({
                type: "POST",
                url: "/install/modprobe.php",
                data: module,
                success: function (data) {
                    $("#status").text($("#status").text()+data+"\r\n");
                    current++;
                    if(current<modules.length){
                        installone(modules[current]);
                    }
                    else{
                        document.location="/index.php";
                    }
                },
                error: function (e) {
                    //alert(e.status + "(" + e.statusText + ")");
                }
            });
        },
        error: function (e) {
            alert(e.status + "(" + e.statusText + ")");
        }
    });
}

function install(modulelst){
    current=0;
    $("#status").text("");
    installone(modulelst[current]);
}

$(document).ready(function(){
    $("#retry").click(function(){
        install(modules);
    });
    install(modules);
});