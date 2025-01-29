<?php
if(! isset($_GET["id"])){
    header("Location: proveedores");
    exit();
}
include("partials/cabecera.php");
$sql="SELECT P.id,P.nombre,P.web,D.id,D.calle,D.numero,D.comuna,D.ciudad
,T.id,T.numero FROM tienda.proveedores P 
left join tienda.direcciones D on P.id=D.proveedores_id
left join tienda.telefonos T on T.idproveedores=P.id;"

?>
<section>

</section>
<?php
include("partials/footer.php");
?>