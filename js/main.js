var logout= document.getElementById("logout");
logout.onchange=()=>{
    if(logout.value.toLowerCase()=="logout"){
        window.location.href="http://localhost/MIL/login/"+logout.value;
    }
   
}
