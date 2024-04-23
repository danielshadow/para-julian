<?php
        session_start();
        require_once("../coneccion/coneccion.php");
        // include("../../../controller/validarSesion.php");
        $db = new Database();
        $con = $db -> conectar();

    //empieza la consulta
    $sql = $con -> prepare("SELECT * FROM usuarios WHERE id='".$_GET['id']."'");
    $sql -> execute();
    $fila = $sql -> fetch ();

    //declaracion de variables de campos en la tabla

    if (isset($_POST['actualizar'])){

          
        $nom_usu= $_POST['nom_usu'];    
        $avatar= $_POST['avatar'];
        $nivel= $_POST['nivel'];
        $estado= $_POST['estado'];
        
            $insert= $con -> prepare ("UPDATE usuarios SET nom_usu='$nom_usu', avatar='$avatar', nivel='$nivel', estado='$estado'  WHERE id = '".$_GET['id']."'");
            $insert -> execute();
            echo '<script> alert ("Registro actualizado exitosamente");</script>';
            echo '<script> window.close(); </script>';
                
        }

        else if (isset($_POST['eliminar'])){
               
            $nom_usu= $_POST['nom_usu'];    
            $avatar= $_POST['avatar'];
            $nivel= $_POST['nivel'];
            $estado= $_POST['estado'];
            
                $insert= $con -> prepare ("DELETE FROM usuarios WHERE id = '".$_GET['id']."'");
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
                    <td>avatar</td>
                    <td><input type="" name="avatar" value="<?php echo $fila['avatar'] ?>"></td>                 
                </tr>

                <tr>
                    <td>nombre de usuario</td>
                    <td><input type="" name="nom_usu" value="<?php echo $fila['nom_usu'] ?>"></td>                 
                </tr>

                <tr>
                    <td>nivel </td>
                    <td><input type="" name="nivel" value="<?php echo $fila['nivel'] ?>"></td>                 
                </tr>

                <tr>
                    <td>estado</td>
                    <td><input type="" name="estado" value="<?php echo $fila['estado'] ?>"></td>                 
                </tr>

                <tr>
                    <td><input type="submit" name="actualizar" value="Actualizar"></td>
                    <td><input type="submit" name="eliminar" value="Eliminar"></td>
                </tr>
            </form>
        </table>
    


</body>
</html>