<?php
        session_start();
        require_once("../coneccion/coneccion2.php");
        // include("../../../controller/validarSesion.php");
        $db = new Database();
        $con = $db -> conectar();

    //empieza la consulta
    $sql = $con -> prepare("SELECT * FROM mundo WHERE id_mundo='".$_GET['id']."'");
    $sql -> execute();
    $fila = $sql -> fetch ();

    //declaracion de variables de campos en la tabla

    if (isset($_POST['actualizar'])){

          
        $nom_mundo= $_POST['nom_mundo'];    
        $cap_max_jug= $_POST['cap_max_jug'];  
       
        
            $insert= $con -> prepare ("UPDATE mundo SET nom_mundo='$nom_mundo',cap_max_jug='$cap_max_jug'  WHERE id_mundo = '".$_GET['id']."'");
            $insert -> execute();
            echo '<script> alert ("Registro actualizado exitosamente");</script>';
            echo '<script> window.close(); </script>';
                
        }

        else if (isset($_POST['eliminar'])){
               
            $nom_mundo= $_POST['nom_mundo'];  
            $cap_max_jug= $_POST['cap_max_jug'];    
         
            
                $insert= $con -> prepare ("DELETE FROM mundo WHERE id_mundo = '".$_GET['id']."'");
                $insert -> execute();
                echo '<script> alert ("Registro actualizado exitosamente");</script>';
                echo '<script> window.close(); </script>';
                    
            }
?>

<!DOCTYPE html>
<html lang="en">
    <script>
        function centrar() {
            iz=(screen.width-document.body.clientWidth) / 2;
            de=(screen.height-document.body.clientHeight) / 3;
            moveTo(iz,de);
        }
    </script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Articulos</title>
    <link rel="stylesheet" href="../../../css/tablaedi.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/6375/6375816.png">
</head>
<body onload="centrar();">
    
        <table class="center">
            <form autocomplete="off" name="form_actualizar" method="POST">

                <tr>
                    <td>nombre de mundo</td>
                    <td><input type="" name="nom_mundo" value="<?php echo $fila['nom_mundo'] ?>"></td>                 
                </tr>
                <tr>
                    <td>capacidad de jugadores</td>
                    <td><input type="" name="cap_max_jug" value="<?php echo $fila['cap_max_jug'] ?>"></td>                 
                </tr>

             
                

                <tr>
                    <td><input type="submit" name="actualizar" value="Actualizar"></td>
                    <td><input type="submit" name="eliminar" value="Eliminar"></td>
                </tr>
            </form>
        </table>
    


</body>
</html>