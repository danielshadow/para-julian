<?php
    session_start();
    require_once("../../coneccion/coneccion.php");
    $db = new Database();
    $con = $db -> conectar();
   

  if (isset($_POST['validar']))
   {

    $nom_usu= $_POST['nom_usu'];    
    $gmail= $_POST['gmail'];
    $contrasena= $_POST['contrasena'];
    $avatar= $_POST['avatar'];
    $nivel= $_POST['nivel'];
    $puntos= $_POST['puntos'];
    $estado= $_POST['estado'];
 
   

     $sql= $con -> prepare ("SELECT * FROM usuario ");
     $sql -> execute();
     $fila = $sql -> fetchAll(PDO::FETCH_ASSOC);

    
        
        
   
   
     if ( $nom_usu=="" || $gmail=="" || $contrasena=="" || $avatar=="" || $nivel=="" || $puntos=="" || $estado=="")
      {
         echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
         
      }
      
      else{

        
        $insertSQL = $con->prepare("INSERT INTO usuarios( nom_usu, gmail, contrasena, avatar, nivel, puntos, estado) VALUES( '$nom_usu', '$gmail', '$contrasena', '$avatar' ,'$nivel' ,'$puntos' ,'$estado')");
        $insertSQL -> execute();
        echo '<script> alert("REGISTRO EXITOSO");</script>';
       
     }  
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="stylesheet" href="../../freefire/consulta.css">
   
    <title>usuarios</title>
</head>
<body>
    
<form  method="POST" autocomplete="off" class="formulario" id="formulario">
<input type="submit" value="Regresar" name="regresar" id="regresar">
<?php 
if (isset($_POST['regresar'])){
    header('Location: ../formulario.php');

}
?>
             <h1>registro del jugador</h1>
        <div class="conte" id="conte">
                    <h2>nombre de usuario</h2>
             <input type="" class="inter" name="nom_usu" id="nom_usu" placeholder="nombre de usuario">
                        
                        <br>

                    <h2>gmail</h2>
             <input type="text" class="inter" name="gmail" id="gmail" placeholder="ingrese gmail">
             <br>

                    <h2>contraseña</h2>
            <input type="" class="inter" name="contrasena" id="contrasena" placeholder="contraseña">
             <br>

             <h2>avartar</h2>
            <input type="text" class="inter" name="avatar" id="avatar" placeholder="hombre o mujer">
             <br>
             
             <h2>nivel</h2>
            <input type="int" class="inter" name="nivel" id="nivel" placeholder="ingrese nivel">
             <br>
             
             <h2>puntos</h2>
            <input type="int" class="inter" name="puntos" id="puntos" placeholder="puntos inicales">
             <br>
             
             <h2>estado del jugador</h2>
            <input type="text" class="inter" name="estado" id="estado" placeholder="ingrese estado">
             <br>

             

             <input class="b"     type="submit" name="validar" value="Registro">
            
             

                        </div>
         
              

                      
                      
    </form>

</body>
</html>