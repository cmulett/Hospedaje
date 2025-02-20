<?php
    include('db.php');

    $USUARIO = $_POST['usuario'];
    $PASSWORD = $_POST['password'];

    $consulta = "SELECT* FROM usuario WHERE usuarios = '$USUARIO' and password = '$PASSWORD'";
    $resultado = mysqli_query($conexion, $consulta);

    $filas = mysqli_num_rows($resultado);

    if($filas){
        header("location:registro.html");

    }else {
        include("login.html");
        ?>
        <h1>ERROR EN LA AUTENTICACIÓN</h1>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>