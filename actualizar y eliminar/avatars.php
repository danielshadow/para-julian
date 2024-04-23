<?php
        session_start();
        require_once("../coneccion/coneccion.php");
        // include("../../../controller/validarSesion.php");
        $db = new Database();
        $con = $db -> conectar();

    //empieza la consulta
    $sql = $con -> prepare("SELECT * FROM avatars WHERE id_avatar='".$_GET['id']."'");
    $sql -> execute();
    $fila = $sql -> fetch ();

    //declaracion de variables de campos en la tabla

    if (isset($_POST['actualizar'])){

          
        $nom_avar= $_POST['nom_avar'];  
        $imagenes= $_POST['imagenes'];      
       
        
            $insert= $con -> prepare ("UPDATE avatars SET nom_avar='$nom_avar',imagenes='$imagenes'  WHERE id_avatar = '".$_GET['id']."'");
            $insert -> execute();
            echo '<script> alert ("Registro actualizado exitosamente");</script>';
            echo '<script> window.close(); </script>';
                
        }

        else if (isset($_POST['eliminar'])){
               
            $nom_avar= $_POST['nom_avar'];   
            $imagenes= $_POST['imagenes'];     
            
         
            
                $insert= $con -> prepare ("DELETE FROM avatars WHERE id_avatar = '".$_GET['id']."'");
                $insert -> execute();
                echo '<script> alert ("Registro actualizado exitosamente");</script>';
                echo '<script> window.close(); </script>';
                
                    
            }



            $consulta = $conexion->prepare("SELECT armas.*, usuarios.nivel as usuario_nivel
FROM armas 
JOIN usuarios ON armas.nivel <= usuarios.nivel
WHERE usuarios.nickname = ?");
$consulta->bind_param("s", $_SESSION['nickname']);
$consulta->execute();
$info = $consulta->get_result()->fetch_all(MYSQLI_ASSOC);
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
                    <td>nombre</td>
                    <td><input type="" name="nom_avar" value="<?php echo $fila['nom_avar'] ?>"></td>                 
                </tr>

                <tr>
                    <td>imagenes</td>
                   
                </tr>

             
                

                <tr>
                    <td><input type="submit" name="actualizar" value="Actualizar"></td>
                    <td><input type="submit" name="eliminar" value="Eliminar"></td>
                </tr>
            </form>

        </table>
    


</body>
</html>