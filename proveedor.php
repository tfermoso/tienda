<?php
if(! isset($_GET["id"])){
    header("Location: proveedores");
    exit();
}
include("partials/cabecera.php");
$sql="SELECT P.id,P.nombre,P.web,D.id,D.calle,D.numero,D.comuna,D.ciudad
,T.id,T.numero as telefono FROM tienda.proveedores P 
left join tienda.direcciones D on P.id=D.proveedores_id
left join tienda.telefonos T on T.idproveedores=P.id
where P.id=:id;";
$stm=$conexion->prepare($sql);
$stm->bindParam(":id",$_GET["id"]);
$result=$stm->execute();

?>
<section>
<?php
    $row=$stm->fetch(PDO::FETCH_ASSOC);
    echo "<p>".$row["nombre"]." ".$row["web"]."</p>";
    if($row["calle"]!=null){
    echo "<p>".$row["calle"]." ".$row["numero"]."</p>";
    };
    /*
    while($row=$stm->fetch(PDO::FETCH_ASSOC)){
       
    }
    */
?>
</section>
<?php
include("partials/footer.php");
?>