var btn_insert;

var nameSong= "";

function ajaxInsert(playlist,nameSong){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
            if (xhttp.status=200 && xhttp.readyState==4){
                alert(this.responseText);
            }
    };
    xhttp.open("GET","/MIL/mvc/core/insertList.php?nameSong="+nameSong+"&playlist="+playlist,false);
    xhttp.send();
}