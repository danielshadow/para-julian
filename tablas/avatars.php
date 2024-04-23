<?php
session_start();
require_once("../coneccion/coneccion.php");
$db = new Database();
$con = $db->conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Personajes</title>
    <link rel="stylesheet" href="../freefire/tabla.css">
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Contenedor del formulario */
        .formulario {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Título de la página */
        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Encabezados de tabla */
        th {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: left;
        }

        /* Filas de tabla */
        tr {
            border-bottom: 1px solid #ddd;
        }

        /* Celdas de tabla */
        td {
            padding: 10px;
        }

        /* Botones */
        .btn-container {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Enlaces */
        .hiper {
            color: #007bff;
            text-decoration: none;
        }

        /* Estilos para las imágenes */
        img {
            max-width: 100px; /* Define el ancho máximo de las imágenes */
            height: auto; /* Mantiene la proporción de aspecto */
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <div class="btn-container">
            <input type="submit" value="Regresar" name="regresar" id="regresar">
        </div>
    </form>

    <?php 
    if (isset($_POST['regresar'])){
        header('Location: ../index.php');
    }
    ?>

    <div class="formulario">
        <h1 class="title">Personajes en el juego</h1>
        <form method="POST" action="">
            <table>
                <tr class="gris">
                    <td>Nombre del Personaje</td>
                    <td>Imagen</td>
                    <td>Modificar</td>
                </tr>
                
                <?php
                    $query = $con->prepare("SELECT * FROM avatars");
                    $query->execute();
                    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($resultados as $fila) {
                ?>
                <tr>
                    <td><?php echo $fila['nom_avar']?></td>
                    <!-- Mostrar la imagen utilizando la ruta de archivo -->
                    <td><img src="<?php echo $fila['rut_img']; ?>" alt="<?php echo $fila['nom_avar']; ?>"></td>
                    <td>
                        <a class="hiper" href="" onclick="window.open('../actualizar y eliminar/avatars.php?id=<?php echo $fila['id_avatar']; ?>','','width=500, height=400, toolbar=NO'); void(null);">Editar</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </form>   
    </div>

</body>
</html>
