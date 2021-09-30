<?php
    session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'php_crud'    
    );

    if( isset($conn) ){
        print "La base de datos está conectado.";
    }else {
        print "La base de datos no está conectado.";
    }
?>