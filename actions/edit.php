<?php
    require("../database/conexion.php");

    if( isset( $_GET['id'] ) ){
        $id = $_GET['id'];
        echo "". $id . "<br>";
        $query = "SELECT * FROM tbltareas WHERE tareID=$id";
        $result = mysqli_query($conn, $query);

        if( $registros = mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_array($result);

            $titulo = $row['tareTitulo'];
            $descripcion = $row['tareDescripcion'];
            print $titulo . " - " . $descripcion;

           
        }
    }

    printf("Fin");


    if( isset($_POST['update']) ){
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $query = "UPDATE tbltareas SET tareTitulo = '$titulo', tareDescripcion = '$descripcion' WHERE tareID=$id";
        mysqli_query($conn, $query);

        print "Modificado";
        $_SESSION['message']  = "Tarea modificado exitosamente";
        $_SESSION['message_type'] = "success";
        header("Location: ../index.php");

    }

?>

<?php require("../includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <card class="card-body">
                <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="Actualiza el titulo" 
                        value="<?php echo $titulo; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Actualiza la descripción" 
                        ><?php echo $descripcion; ?></textarea>

                    </div>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </card>
        </div>
    </div>
</div>

<?php require("../includes/footer.php"); ?>