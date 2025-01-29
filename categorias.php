<?php
include("partials/cabecera.php");
$sql = "select * from categorias";
$result = $conexion->query($sql);

?>
<section>
    <h3>Listado de categorias</h3>
    <table>
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
        </thead>
        <tbody>

            <?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>".$row['nombre']."</td>
                        <td>{$row['descripcion']}</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
    <hr>
    <form action="nueva_categoria.php" method="post">
        <h3>Nueva categoria</h3>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required placeholder="Nombre">
        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" required placeholder="Descripción">
        <input type="submit" value="Guardar">
        <input type="reset" value="Limpiar">
    </form>
</section>
<?php
include("partials/footer.php");
?>