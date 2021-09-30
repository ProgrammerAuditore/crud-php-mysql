<?php require('./database/conexion.php') ?>
<?php require('./includes/header.php') ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="./actions/save.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="formTareaTitulo" class="form-control" placeholder="Titulo" autofocus autocomplete="off">
                    </div>
                    <div class="form-group">
                        <textarea name="formTareaDescripcion" rows="10" class="form-control" placeholder="Descripcion"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="Guardar">
                </form>
            </div>
        </div>

        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                        <tbody>
                            <?php 
                                $query = "SELECT * FROM `tbltareas`";
                                $result = mysqli_query($conn, $query);
                                while( $fila = mysqli_fetch_array($result) ){ ?>
                                <tr>
                                    <td><?php echo $fila['tareTitulo']; ?></td>
                                    <td><?php echo $fila['tareDescripcion']; ?></td>
                                    <td><?php echo $fila['tareCreado_en']; ?></td>
                                    <td>
                                        <a href="./actions/edit.php?id=<?php echo $fila['tareID']; ?> " class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="./actions/delete.php?id=<?php echo $fila['tareID']; ?> " class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </thead>
                </table>
        </div>
    </div>
</div>

<?php require('./includes/footer.php') ?>

