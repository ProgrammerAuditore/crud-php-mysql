<?php
require("../database/conexion.php");

    if( isset( $_POST['guardar_tarea']) ){
        $titulo = $_POST['formTareaTitulo'];
        $descripcion = $_POST['formTareaDescripcion'];
        
        $query = "INSERT INTO `tbltareas`(tareTitulo, tareDescripcion) VALUES ('$titulo', '$descripcion')";
        $resp = mysqli_query($conn, $query);

        if(!$resp){
            die("Query fail");
        }

        print "Guardado";
        $_SESSION['message']  = "Tarea guardado exitosamente";
        $_SESSION['message_type'] = "success";
        
        header("Location: ../index.php");
    }
?>