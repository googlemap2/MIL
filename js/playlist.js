
function isEmptyOrSpaces(str){
    if (str == null || str.trim() === ''){
       return true;
      }
      return false;
}

btn_updatePlaylist.onclick=function(){
    if(!isEmptyOrSpaces(selectPlaylist.value) && !isEmptyOrSpaces(updateNamePlaylist.value)){
        updatePLaylist();
    }
}

btn_delete.onclick=function(){
    deletePLaylist();
}


function updatePLaylist(){
    var xhttp= new XMLHttpRequest();
    results_search.innerHTML=null;
    xhttp.onreadystatechange=function(){
        if(xhttp.status==200 && xhttp.readyState==4){
         alert(this.responseText);
        }
    };
    xhttp.open("GET","/MIL/mvc/core/updatePLaylist.php?idPlaylist="+selectPlaylist.value+"&nameUpdate="+updateNamePlaylist.value,false);
    xhttp.send();
}

function deletePLaylist(){
    var xhttp= new XMLHttpRequest();
    results_search.innerHTML=null;
    xhttp.onreadystatechange=function(){
        if(xhttp.status==200 && xhttp.readyState==4){
         alert(this.responseText);
        }
    };
    xhttp.open("GET","/MIL/mvc/core/deletePLaylist.php?idPlaylist="+selectPlaylist.value,false);
    xhttp.send();
}