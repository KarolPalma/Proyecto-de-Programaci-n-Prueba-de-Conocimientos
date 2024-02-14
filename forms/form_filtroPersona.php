<?php
include("../php/conexion.php");
?>

<html !DOCTYPE>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Búsqueda de Persona</title>
        <script src="../js/validaciones.js"></script>
        <link rel="stylesheet" href="../css/estilo.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body style="background-color: rgb(210, 210, 210);" >
        <header class="col-12 text-center mb-5">
        <!--Menu-->
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
            <h1 class="container"><span>Búsqueda de Personas</span></h1>
    </header>

    <main>
    <div class="container">
            <form name='formulario' id='formulario' method='POST' action="" class="container col-lg-8 mx-auto row g-3 row justify-content-center shadow-lg p-3 mb-5 rounded">
                <input type="hidden" name="accion" id="accion" value="">
                <div class="col-12">
                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                        <!--Id. Registro-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2">
                                <label for="txtIdRegistro" class="form-label">Id. Registro</label>
                                <input type="text" class="form-control" name="txtIdRegistro" id="txtIdRegistro" maxlength="15" placeholder="Ingrese el número de registro" value="">
                            </div>
                        </div>
                        <!--Persona-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2">
                                <label for="txtNombreComp" class="form-label">Nombre de la Persona</label>
                                <input type="text" class="form-control" name="txtNombreComp" id="txtNombreComp" maxlength="45" placeholder="Ingrese el nombre de la persona" value="">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <?php
                            $accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //La accion que cambia con la funcion validar()
                            if ($accion == "consultar") {
                                echo "<a class='btn btn-secondary m-3' href='form_filtroPersona.php'> Regresar</a>";
                            }
                            ?>
                            <button onClick="return validarBusqueda()" name="btnBuscar" id="btnBuscar" class="btn btn-primary m-3">Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-center my-4">
            <!--Bootstrap: Centrado de div-->
            <table id='tabla' class="table table-striped table-bordered" style="max-width: 1100px;">
                <!--Bootstrap: Estilo de tabla-->
                <?php
                $accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //La accion que cambia con la funcion validar()
                $registro = isset($_POST["txtIdRegistro"]) ? $_POST["txtIdRegistro"] : "";
                $nombreComp = isset($_POST["txtNombreComp"]) ? $_POST["txtNombreComp"] : "";
                if ($accion == "consultar") {
                    $sql = '';
                    if ($registro != '') {
                        $sql = "SELECT * FROM persona WHERE IdRegistro = '$registro' ";
                    }
                    if ($nombreComp != '') {
                        if ($sql == "") {
                            $sql = "SELECT * FROM persona WHERE NombreCompleto = '$nombreComp' ";
                        } else {
                            $sql = $sql . " AND IdRegistro = '$registro'";
                        }
                    }if($registro != '' && $nombreComp != ''){
                        $sql = "SELECT * FROM persona WHERE NombreCompleto = '$nombreComp' OR IdRegistro = '$registro'";
                    }

                    

                    $sql = $sql . " ORDER BY IdRegistro";
                    $result = mysqli_query($conexion, $sql);
                    if (mysqli_num_rows($result) != 0) {
                        echo
                        "<thead>
                        <tr>
                            <th scope='col'>Id Registro</th>
                            <th scope='col'>Nombre completo</th>
                            <th style='text-align: center;' scope='col'>Ver</th>
                        </tr>
                        </thead>
                        <tbody>";

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo
                            "<tr>
						<th scope='row'>" . $row["IdRegistro"] . "</td>
                        <td scope='row'>" . $row["NombreCompleto"] . "</td>
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_verPersona.php?idRegistro=" . $row["IdRegistro"] . "'>Ver Registro</a></td>
					    </tr>";
                        }
                    }
                    echo "</table>"; 
                    if (mysqli_num_rows($result) == 0) {
                        echo
                        "<div class='col-12 text-center mt-5 mb-5'>
                        <p>No se encontraron resultados</p>
                    </div>";
                    }
                    $sql = '';
                } else {
                    $sql = "SELECT * FROM persona";
                    $result = mysqli_query($conexion, $sql);
                    if (mysqli_num_rows($result) != 0) {
                        echo
                        "<thead>
                        <tr>
                            <th scope='col'>Id Registro</th>
                            <th scope='col'>Nombre completo</th>
                            <th style='text-align: center;' scope='col'>Ver</th>
                        </tr>
                        </thead>
                        <tbody>";

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo
                            "<tr>
						<th scope='row'>" . $row["IdRegistro"] . "</td>
                        <td scope='row'>" . $row["NombreCompleto"] . "</td>
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_verPersona.php?idRegistro=" . $row["IdRegistro"] . "'>Ver Registro</a></td>
					    </tr>";
                        }
                    }
                    echo "</table>";
                }
                ?>
                </tbody>
            </table>
        </div>
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
