<?php
    include 'config.php';

    if ($_POST['subir']) {
        if (file_exists($_FILES['archivo']['tmp_name'])) {
            echo "Se ha Subido Correctamente";
            if (move_uploaded_file($_FILES['archivo']['tmp_name'],'archivos/'.$_FILES['archivo']['name'])) {

                $nombre = $_POST['nombre'];
                $url = 'archivos/'.$_FILES['archivo']['name'];

                $sql = $conexion->query("INSERT INTO datos (nombre,url) VALUES ('".$nombre."','".$url."')");

            }else{
                echo "Error al Subir";
            }
        }else{
            echo "No se ha Subido el Archivo";
        }

        }
?>
