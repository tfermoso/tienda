<?php
function direccionExiste($direcciones, $iddireccion)
{
    foreach ($direcciones as $direccion) {
        if ($direccion['iddireccion'] == $iddireccion) {
            return true;
        }
    }
    return false;
}
function telefonoExiste($telefonos, $idtelefono)
{
    foreach ($telefonos as $telefono) {
        if ($telefono['idtelefono'] == $idtelefono) {
            return true;
        }
    }
    return false;
}
if (!isset($_GET["id"])) {
    header("Location: proveedores");
    exit();
}
include("partials/cabecera.php");
$sql = "SELECT P.id,P.nombre,P.web,D.id as iddireccion,D.calle,D.numero,D.comuna,D.ciudad
,T.id as idtelefono,T.numero as telefono FROM tienda.proveedores P 
left join tienda.direcciones D on P.id=D.proveedores_id
left join tienda.telefonos T on T.idproveedores=P.id
where P.id=:id;";
$stm = $conexion->prepare($sql);
$stm->bindParam(":id", $_GET["id"]);
$result = $stm->execute();

?>
<section>
    <?php
    $direcciones = [];
    $telefonos = [];
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    echo "<div class='proveedor'>
        <h1>Proveedor</h1>
        <h4>" . $row['nombre'] . "</h4>
        <p>Web: <a href='" . $row['web'] . "'>" . $row['web'] . "</a></p>
        </div>";
    do {
        if ($row["iddireccion"] != null) {
            if (!direccionExiste($direcciones, $row["iddireccion"])) {
                $direcciones[] = [
                    "iddireccion" => htmlspecialchars($row["iddireccion"]),
                    "calle" => htmlspecialchars($row["calle"]),
                    "numero" => htmlspecialchars($row["numero"]),
                    "comuna" => htmlspecialchars($row["comuna"]),
                    "ciudad" => htmlspecialchars($row["ciudad"]),
                ];
            }
        }

        if ($row["idtelefono"] != null) {
            if (!telefonoExiste($telefonos, $row["idtelefono"])) {
                $telefonos[] = [
                    "idtelefono" => htmlspecialchars($row["idtelefono"]),
                    "telefono" => htmlspecialchars($row["telefono"])
                ];
            }
        }
    } while ($row = $stm->fetch(PDO::FETCH_ASSOC));


    ?>
    <div class="direcciones">
        <h3>direcciones</h3>
        <?php
        for ($i = 0; $i < count($direcciones); $i++) {
            echo "<p>" . $direcciones[$i]["calle"] . " " . $direcciones[$i]["numero"] . " " . $direcciones[$i]["comuna"] . " " . $direcciones[$i]["ciudad"] . "</p>";
        }
        ?>
    </div>
    <div class="telefonos">
        <h3>telefonos</h3>
        <?php
        for ($i = 0; $i < count($telefonos); $i++) {
            echo "<p>" . $telefonos[$i]["telefono"] . "</p>";
        }
        ?>
    </div>

</section>
<?php
include("partials/footer.php");
?>