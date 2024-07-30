<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Leer</title>
    <style>
      .custom-icon-size {
        font-size: 29px; 
      }
    </style>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #E9967A;">
    CONEXION PHP Y MYSQL Listado de Producto
</nav>
<br><br>

<div class="container">
    <?php
    include 'conexion.php';

    // Obtener datos de la base de datos para el dropdown
    $tipoSql = 'SELECT id, nombre FROM tipoproducto';
    $tipoResultado = $conn->query($tipoSql);

    if(isset($_GET['msg'])){
        $msg=$_GET['msg'];
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
        Agregar Nuevo Producto
    </button>

    <br><br>
    <table class="table table-striped-columns table-info">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Tipo de Producto</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql='SELECT p.id, p.nombre, p.precio, tp.nombre as tipo 
            FROM producto p, tipoproducto tp where tp.id=p.tipo_id';
            $resultado=$conn->query($sql);
            while($row=$resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['precio'] ?></td>
                <td><?php echo $row['tipo'] ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pencil custom-icon-size"></i></a>
                    <a href="eliminar.php?id=<?php echo $row['id']?>" class="link-danger"><i class="fa-solid fa-trash-can custom-icon-size"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<!-- Modal para insertar nuevo producto -->
<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel">Agregar Nuevo Producto</h5>
                <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
            </div>
            <div class="modal-body">
                <form method="POST" action="insertar.php">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_id" class="form-label">Tipo de Producto</label>
                        <select name="tipo_id" id="tipo_id" class="form-select" required>
                            <?php while ($row = $tipoResultado->fetch_assoc()) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Insertar Producto</button>
                    <a class="btn btn-danger" href="index.htm" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>





<script src="https://kit.fontawesome.com/a59a082974.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
