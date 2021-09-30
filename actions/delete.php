<?php 

    require("../database/conexion.php");

    if( isset($_GET['id']) ){
        $id = $_GET['id'];
        $query = "DELETE FROM `tbltareas` WHERE tareID = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query fallo");
        }

        print "Guardado";
        $_SESSION['message']  = "Tarea eliminado exitosamente";
        $_SESSION['message_type'] = "danger";
        
        header("Location: ../index.php");
    }

?>