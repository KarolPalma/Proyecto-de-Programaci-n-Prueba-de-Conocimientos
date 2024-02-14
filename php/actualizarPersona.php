<?php
$accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; 
if ($accion == "guardar") { 

    $sql = "UPDATE persona SET NombreCompleto = '" . $_POST["txtNombreComp"] . "', 
                                        TelefonoCasa = '" . $_POST["txtTelefonoCasa"] . "', 
                                        TelefonoCelular = '" . $_POST["txtTelefonoCelular"] . "',
                                        FechaNacimiento = '" . $_POST["dteFecNac"] . "'
                                    WHERE IdRegistro = " . $_POST["txtIdRegistro"];

    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Persona actualizada satisfactoriamente');</script>";
    echo "<script>
                window.location.href = '../forms/form_filtroPersona.php';
      </script>";
}

if ($accion == "eliminar") { 

    $sql = "DELETE FROM  persona WHERE IdRegistro = " . $_POST["txtIdRegistro"];

    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Persona Eliminada satisfactoriamente');</script>";
    echo "<script>
                window.location.href = '../forms/form_filtroPersona.php';
      </script>";
}
?>