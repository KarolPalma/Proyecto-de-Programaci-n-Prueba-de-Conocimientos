function validar() {

    var alerta = false;

    //Extracción de datos del formulario.
    var nombreComp = document.getElementById("txtNombreComp").value;
    var telefonoCasa = document.getElementById("txtTelefonoCasa").value;
    var telefonoCelular = document.getElementById("txtTelefonoCelular").value;
    var fechaNaci = document.getElementById("dteFecNac").value;
    
    //Calcular la edad según fecha de nacimiento
    var fechaNac = new Date(document.getElementById("dteFecNac").value);
    var hoy = new Date();
    var edad = hoy.getFullYear() - fechaNac.getFullYear();
    var mes = hoy.getMonth() - fechaNac.getMonth();

    //Expresiones Regulares
    var expRegNombre = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;
    var expRegTelCas = /^2\d{7}$/;
    var expRegTelCel = /^(3|8|9)[0-9]{7}$/;

    if (!expRegNombre.test(nombreComp) || nombreComp == ""){
        alert("Por favor, ingresa solo letras (mayúsculas o minúsculas) o espacios en el campo del nombre completo.");
        document.getElementById("txtNombreComp").focus();
        alerta = true;
    }   if(!expRegTelCas.test(telefonoCasa) || telefonoCasa == ""){
        alert("Por favor, ingresa un número telefónico valido que comience con 2 y tenga 8 dígitos.");
        document.getElementById("txtTelefonoCasa").focus();
        alerta = true;
    }   if(!expRegTelCel.test(telefonoCelular) || telefonoCelular == ""){
        alert("Por favor, ingresa un número telefónico valido que comience con 3, 8 o 9 y tenga 8 dígitos.");
        document.getElementById("txtTelefonoCelular").focus();
        alerta = true;
    }   if(mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())){
        edad--; 
    }   if (edad < 18 || edad > 65 || fechaNaci === "") {
        alert("Por favor, ingresa una edad entre 18 a 65 años.");
        alerta = true;
    }  
    if(!alerta){
        if(confirm("Esta seguro de guardar la información de "+ nombreComp + "?")){
            document.getElementById("accion").value = "guardar";
            document.getElementById("formulario").submit();
        }
    }
    return false;
}

function validarBusqueda() {
    if (document.getElementById("txtIdRegistro").value == "" && document.getElementById("txtNombreComp").value == "") {
        alert("Debe ingresar una opción de filtrado");
        document.getElementById("txtNombreComp").focus();
    } else {
        document.getElementById("accion").value = "consultar";
        document.getElementById("formulario").submit();
    }
    return false;
}

function eliminar(){
    var nombreComp = document.getElementById("txtNombreComp").value;
    if(confirm("Esta seguro de eliminar la información de "+ nombreComp + "?")){
        document.getElementById("accion").value = "eliminar";
        document.getElementById("formulario").submit();
    }
}