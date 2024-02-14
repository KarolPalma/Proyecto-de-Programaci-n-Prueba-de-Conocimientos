<?php
include("../php/conexion.php");
include("../php/insertarPersona.php");
//Incluye el archivo php que inserta los datos a la BD cuando se cambia el campo de "accion" al valor de guardar

    //Traer el IdRegistro de la base de datos
    $sql = "SELECT (IdRegistro + 1) AS P FROM persona ORDER by IdRegistro DESC LIMIT 1";
    $noRegistro = 0;
    $result = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $noRegistro = $row["P"];
    } 
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de Personas</title>
        <script src="../js/validaciones.js"></script>
        <link rel="stylesheet" href="../css/estilo.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body style="background-color: rgb(210, 210, 210);" >
        <header class="col-12 text-center mb-5">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
                <div class="container collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <!--Inicio-->
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Inicio</span></a>
                        </li>
                        <!--Registro de Persona-->
                        <li class="nav-item active">
                            <a class="nav-link" href="form_registroPersona.php">Registro Persona</span></a>
                        </li>
                        <!--Busqueda de Persona-->
                            <li class="nav-item active">
                            <a class="nav-link" href="form_filtroPersona.php">Búsqueda Persona</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <h1 class="container"><span>Registro de Personas</span></h1>
        </header>

        <main class="container col-12 text-center mt-5 mb-5">
            <!--Registro de Personas-->
            <form name='formulario' id='formulario' method='POST' action="" class="container col-lg-6 mx-auto row g-3 row justify-content-center shadow-lg p-3 mb-5 rounded">
                <input type="hidden" name="accion" id="accion" value="">
                <div class="col-12">
                    <div class="row">

                        <!--Id. Registro-->
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtIdRegistro" class="form-label">Id. Registro</label>
                                <input type="number" class="form-control" name="txtIdRegistro" id="txtIdRegistro" maxlength="45" <?php echo "value='$noRegistro'" ?> readonly>

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7"></div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7"></div>
                        <!--Nombre Completo-->
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtNombreComp" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control" name="txtNombreComp" id="txtNombreComp" maxlength="45" placeholder="Ingrese su nombre completo" value="Juan" required>

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7"></div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7"></div>
                        <!--Telefono Casa-->
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtTelefonoCasa" class="form-label">Número teléfonico de la casa</label>
                                <input type="text" class="form-control" name="txtTelefonoCasa" id="txtTelefonoCasa" maxlength="8" placeholder="Ingrese el teléfono de su casa" value="" oninput="this.value = this.value.replace(/\D/g, '').substring(0, 8);" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7"></div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7"></div>
                        <!--Telefono Celular-->
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtTelefonoCelular" class="form-label">Número teléfonico celular</label>
                                <input type="text" class="form-control" name="txtTelefonoCelular" id="txtTelefonoCelular" maxlength="8" placeholder="Ingrese su teléfono celular" value ="" oninput="this.value = this.value.replace(/\D/g, '').substring(0, 8);" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7"></div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7"></div>
                        <!--Año de nacimiento-->
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                            <div class="form-group mt-2 mb-2">
                                <label for="dteFecNac" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="dteFecNac" id="dteFecNac" value="" required>
                            </div>
                        </div>
                        
                        <!--Botones-->
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <button type="button" onclick="return validar()" name="btnGuardar" id="btnGuardar" class="btn btn-primary m-5">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </main>

        <footer>
            <div class="card">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>Desarrollado por Karol Palma.</p>
                        <div class="blockquote-footer">2023, <cite title="Source Title">Prueba práctica de conocimiento</cite></div>
                    </blockquote>
                </div>
            </div>
        </footer>
    </body>
</html>
