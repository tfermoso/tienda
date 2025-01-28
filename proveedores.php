<?php
include("partials/cabecera.php");
//Consulta para obtener los proveedores
$sql = "select * from proveedores order by id desc ";
$result = $conexion->query($sql);
?>
<section>
    <div class="listado">
        <h1>Proveedores</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Web</th>                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['web'] . "</td>";
                    echo "<td><a href='editar_proveedor.php?id=" . $fila['id'] . "'>Editar</a> | <a href='eliminar_proveedor.php?id=" . $fila['id'] . "'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <hr>
        <h3>Nuevo Proveedor</h3>
        <form action="nuevo_proveedor.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre del proveedor">
            </div>
            <div class="form-group">
                <label for="web">Web:</label>
                <input type="text" name="web" id="web" class="form-control" required placeholder="http://">
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-primary">
            </div>
        </form>
      
    </div>

</section>
<?php
include("partials/footer.php");
?>