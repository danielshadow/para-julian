<?php
    session_start();
    require_once("../coneccion/coneccion.php");
    $db = new Database();
    $con = $db -> conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta</title>
    <link rel="stylesheet" href="../freefire/tabla.css">
</head>
<body>
<form action="" method="POST">

<td>
<div class="btn-container">
            
            <input type="submit" value="Regresar" name="regresar" id="regresar">
</div>
</tr>
</form>
<?php 
if (isset($_POST['regresar'])){
    header('Location: ../index.php');

}
?>
    <div class="formulario">

    <h1 class="title">registro usuario</h1>
        <form method="POST" action="">
        <table>
            <tr class="gris">
                
                <td>nombre de usuario</td>
                <td>cuenta registrada</td>
                <td>contraseña</td>
                <td>avatar</td>
                <td>nivel de la cuenta</td>
                <td>puntos</td>
                <td>modificar</td>
                
                
              

            </tr>
            
            <?php
             
                  $query = $con -> prepare("SELECT * FROM usuarios");
                  $query -> execute ();
                  $resultados = $query -> fetchAll(PDO::FETCH_ASSOC);

                  foreach ($resultados as $fila){
            ?>
            <tr>
                <td><?php echo $fila['nom_usu']?></td>
                <td><?php echo $fila['gmail']?></td>
                <td><?php echo $fila['contrasena']?></td>
                <td><?php echo $fila['avatar']?></td>
                <td><?php echo $fila['nivel']?></td>
                <td><?php echo $fila['puntos']?></td>
                <td><a class="hiper" href="" onclick="window.open
                ('../actualizar y eliminar/usu.php?id=<?php echo $fila['id'] ?>','','width=500, height=400, toolbar=NO'); void(null);">  editar</a>
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