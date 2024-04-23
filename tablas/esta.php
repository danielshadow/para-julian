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
    <title>estadisticas</title>
</head>
<body>
    
<div class="info_jugador">

    

    <h1 class="title">informacion del jugador</h1>
        <form method="POST" action="">
        <table>
            <tr class="gris">
                
                
                <td>nombre de jugador </td>
                
                <td> verificar</td>
                
                
              

            </tr>
            
            <?php
             
                  $query = $con -> prepare("SELECT * FROM usuarios");
                  $query -> execute ();
                  $resultados = $query -> fetchAll(PDO::FETCH_ASSOC);

                  foreach ($resultados as $fila){
            ?>
            <tr>
                <td><?php echo $fila['nom_usu']?></td>             
                
                <td><a class="hiper" href="" onclick="window.open
                ('../estadisticas /jugador.php?id=<?php echo $fila['id'] ?>'); void(null);">  estadisticas</a>
               </td>
            
              
            </tr>
            <?php
                  }
                 
            ?>

            

            
         
        </table>
 
        </form>               

    </div>
       
        
     
<div class="grafica">

</div>
</body>
</html>