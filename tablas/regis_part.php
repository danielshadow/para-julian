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

    <h1 class="title">registro de partidas</h1>
        <form method="POST" action="">
        <table>
            <tr class="gris">
                
                <td>mundo jugado</td>
                <td>tiempo de partida inicial</td>
                <td>partida finalizada</td>
            </tr>
            
            <?php
             
                  $query = $con -> prepare("SELECT * FROM duracion");
                  $query -> execute ();
                  $resultados = $query -> fetchAll(PDO::FETCH_ASSOC);

                  foreach ($resultados as $fila){
            ?>
            <tr>
                <td><?php echo $fila['id_mundo']?></td>
                <td><?php echo $fila['fecha_ini']?></td>
                <td><?php echo $fila['fecha_fin']?></td>
                
                
                
                
                
                
            </tr>
            <?php
                  }
                 
            ?>

            

            
         
        </table>
 
        </form>               

    </div>

</body>
</html>