<?php
if (!isset($_POST["nombre"])) {
    header("Location: categorias");
    exit();
}
include("conexiondb.php");
$sql="insert into categorias (nombre,descripcion) 
values (:nombre,:descripcion)";
$stm=$conexion->prepare($sql);
$stm->bindParam(":nombre",$_POST["nombre"]);
$stm->bindParam(":descripcion",$_POST["descripcion"]);
$stm->execute();
header("Location: categorias");
?>