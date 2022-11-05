<?php
    session_start();

    include('conexion.php');

    if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['usuario']);
    $Contraseña = validate($_POST['contraseña']);

    if(empty($Usuario)){

        header("Location: login.html?error=El Usuario es Requerido");
        exit();

    }elseif(empty($Contraseña)){
        
        header("Location: login.html?error=La Contraseña es Requerida");
        exit();
    }else{

        $Contraseña = md5($Contraseña);

        $Sql = "SELECT * FROM usuario WHERE usuario = '$Usuario' and contraseña = '$Contraseña'";
        $result = mysqli_query($conexion, $Sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['usuario'] === $Usuario &&  $row['contraseña'] === $Contraseña);{
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['id'] = $row['id'];
                header("Location;: Inicio.php");
                exit();
            }else{
                header("Location: login.html?error=El Usuario o Contraseña son Incorrectas");
                exit();
            }
        }else{
            header("Location: login.html?error=El Usuario o Contraseña son Incorrectas");
            exit();
        }
    }

}else{
    header("Location: login.html");
     exit();

}    
