function buscarPorCedula(){   
    var cedula = document.getElementById("cedula").value;
    if (cedula == ""){
        document.getElementById("informacion").innerHTML="";
    }else{
        if(window.XMLHttpRequest){
            //code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("informacion").innerHTML=this.responseText;
            }
        };
        xmlhttp.open("GET", "../../controladores/buscar.php?cedula="+cedula, true);
        xmlhttp.send();
    }
}
