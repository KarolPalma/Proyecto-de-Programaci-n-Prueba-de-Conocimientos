<?php

$accion = isset($_POST["accion"]) ? $_POST["accion"] : "";

if ($accion == "guardar") {
    
    $sql = "CALL InsertarPersona('" . $_POST["txtNombreComp"] . "','" . $_POST["txtTelefonoCasa"] . "','" . $_POST["txtTelefonoCelular"] . "',
    '" . $_POST["dteFecNac"] ."')";

    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Registro de la persona correcta');</script>";
}
?>