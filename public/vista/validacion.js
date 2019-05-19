function validar(){
    
    for (var i = 0; i<document.forms[0].length; i++){
        var elemento = document.forms[0].elements[i];
        if (elemento.value.trim() == ''){
            bandera = true;
            if (elemento.id == 'cedula'){
                elemento.style.border = "1px red solid"
                document.getElementById('mensajeCedula').innerHTML = "La cedula es necesaria";
            }
            break
        }
    }
    var bandera = false;
    if (bandera == true){
        alert('Llenar todos los campos');
        return false
    }else {
        return true
    }
}

function validacionLetras(elemento){
    if (elemento.value.length > 0){
        var ascii = elemento.value.charCodeAt()
    }
}



/*3 caracteres antes del arroba, arroba y terminar en ups.edu.ec
fecha con formato d/m/a
*/