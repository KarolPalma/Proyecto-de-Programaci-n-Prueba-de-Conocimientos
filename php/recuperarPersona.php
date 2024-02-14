<?php 

    $id = $_GET['idRegistro'];

    //Inicializacion de variables
    $idRegistro = '';
    $nombreComp = '';
    $telefonoCasa = '';
    $telefonoCelular = '';
    $fechaNac = '';
    $FechaRegistro = '';
    $HoraRegistro = '';

    $sql = "SELECT * FROM persona WHERE IdRegistro = '" . $id . "';"; 
    $result = mysqli_query($conexion, $sql); 
    while ($row = mysqli_fetch_assoc($result)) { 
        $idRegistro = $row["IdRegistro"]; 
        $nombreComp = $row["NombreCompleto"];
        $telefonoCasa = $row["TelefonoCasa"];
        $telefonoCelular = $row["TelefonoCelular"];
        $fechaNac = $row["FechaNacimiento"];
        $FechaRegistro = $row["FechaRegistro"];;
        $HoraRegistro = $row["HoraRegistro"];
    }
?>