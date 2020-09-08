var results_search=document.getElementById("results_search");
var task_search=document.getElementById("task_search");
var categories=document.getElementById("categories");
var namePLaylist= document.getElementById("namePLaylist");
var addNamePlaylist=document.getElementById("addList");
var selectPlaylist=document.getElementById("selectPlaylist");
var updateNamePlaylist=document.getElementById("updateNamePlaylist");
var btn_updatePlaylist=document.getElementById("btn_updatePlaylist");
var btn_delete = document.getElementById("btn_delete");
var selectDeletePlaylist=document.getElementById("selectDelete");

var item_song;
var item_playlist;
var child_list;

var wrap_item;
var search = "";
if(localStorage.getItem("listMusic")===null)
{
    localStorage.setItem("listMusic",JSON.stringify([]));
}





document.body.onload=function(){
    loadCategories();
    item_playlist=document.querySelectorAll(".item-list");
    loadPlaylist();
    child_list=document.querySelectorAll(".child-list");
    insertList();
    if(document.querySelectorAll('.button')){
        btn_insert =document.querySelectorAll('.button');
        if (typeof createEvent =="function"){
            createEvent();
        }
    
    }

    wrap_item = document.querySelectorAll(".item");
    for(var a of wrap_item){
        a.onclick=function(e){
            var  list=JSON.parse(localStorage.getItem("listMusic")) ;
            list.push([e.path[1].children[1].innerText,e.path[1].children[2].innerText,e.path[1].children[0].src]);
            list.reverse();
           localStorage.setItem("listMusic",JSON.stringify(list));
        }
    }
    item_song=document.querySelectorAll(".item-song");
    if(item_song!=null){
        for(var i of item_song)
        {
            i.onclick=function(e){
                var  list=JSON.parse(localStorage.getItem("listMusic")) ;
                list.push([e.path[1].children[1].innerText,e.path[1].children[2].innerText,e.path[1].children[0].src]);
                 list.reverse();
                localStorage.setItem("listMusic",JSON.stringify(list));
            }
        }
    }
}

function insertList(){
    for(var c of child_list){
        c.onclick=function(e){ 
             ajaxInsert(e.target.lastChild.value,e.path[3].children[0].value);
        }
    }
}

function createP(text){
    var p = document.createElement("a");
    p.setAttribute("id","result");
    p.setAttribute("href","/MIL/player");
    p.innerText=text;
    p.onclick=function(e){
        var  list=JSON.parse(localStorage.getItem("listMusic")) ;
        list.push([e.path[0].innerText,""]);
        list.reverse();
        localStorage.setItem("listMusic",JSON.stringify(list));
    };
    var span=document.createElement("span");
    span.setAttribute("class","category-result");
    span.innerText="Nhạc";
    p.append(span);
    return p;
}

function createS(text){
    var p = document.createElement("a");
    p.setAttribute("id","result");
    p.setAttribute("href","/MIL/singer/listSinger/"+text);
    p.innerText=text;
    var span=document.createElement("span");
    span.setAttribute("class","category-result");
    span.innerText="Ca sĩ";
    p.append(span);
    return p;
}

function createC(text){
    var p = document.createElement("a");
    p.setAttribute("class","item_categories");
    p.setAttribute("href","/MIL/categories/listCategory/"+text);
    p.innerText=text;
    return p;
}

window.onkeyup=function(){
    search=task_search.value;
    if(task_search.value!=""){
        results_search.style.display="flex";
        loadResult();
    }
    else{
        json=[];
        results_search.style.display="none";
        results_search.innerHTML=null;
    }
}
if(addNamePlaylist != null)
{
    addNamePlaylist.onclick=function(){
        if (namePLaylist.value!=""){
            insertNamePlaylist();
        }
        };
}



var json;



function loadResult(){
    var xhttp= new XMLHttpRequest();
    results_search.innerHTML=null;
    xhttp.onreadystatechange=function(){
        if(xhttp.status==200 && xhttp.readyState==4){
           json= JSON.parse(xhttp.responseText);
 
            for(var p  of json[0]){
             results_search.append(createP(p[0]));
            }
            for(var p  of json[1]){
                results_search.append(createS(p[0]));
            }
        }
    };
    xhttp.open("GET","/MIL/mvc/core/search.php?search="+search,false);
    xhttp.send();
}

function loadCategories(){
    var xhttp= new XMLHttpRequest();
    results_search.innerHTML=null;
    xhttp.onreadystatechange=function(){
        if(xhttp.status==200 && xhttp.readyState==4){
           json= JSON.parse(xhttp.responseText);
            for (var i of json){
                categories.append(createC(i[0]));
            }
        
        }
    };
    xhttp.open("GET","/MIL/mvc/core/getCategories.php?category="+true,false);
    xhttp.send();
}

function insertNamePlaylist(){
    var xhttp= new XMLHttpRequest();
    results_search.innerHTML=null;
    xhttp.onreadystatechange=function(){
        if(xhttp.status==200 && xhttp.readyState==4){
         alert(xhttp.responseText);
        }
    };
    xhttp.open("GET","/MIL/mvc/core/insertNamePLaylist.php?namePLaylist="+namePLaylist.value,false);
    xhttp.send();
}
function CreateItemList(text,id){
    var p= document.createElement("p");
    p.setAttribute("class","child-list");
    p.innerText=text;
    input=document.createElement("input");
    input.type="hidden";
    input.setAttribute("value",id);
    p.append(input);
    return p;
}

function loadPlaylist(){
    var xhttp= new XMLHttpRequest();
    results_search.innerHTML=null;
    xhttp.onreadystatechange=function(){
        if(xhttp.status==200 && xhttp.readyState==4){
         var json=JSON.parse(this.responseText);
         for(var b of item_playlist){
            for(var a of json){
                b.append(CreateItemList(a[2],a[0]));
            }
         }
      
        }
    };
    xhttp.open("GET","/MIL/mvc/core/getPlaylist.php",false);
    xhttp.send();
}