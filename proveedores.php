<?php
include("partials/cabecera.php");
//Consulta para obtener los proveedores
$sql = "select * from proveedores order by id desc";
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
                while ($fila = $result->fetchAll()) {
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
        <a href="nuevo_proveedor.php" class="btn btn-primary">Nuevo Proveedor</a>
    </div>

</section>
<?php
include("partials/footer.php");
?>