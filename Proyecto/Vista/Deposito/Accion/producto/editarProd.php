<?php
include_once "../../../../configuracion.php";

$datos = data_submitted();
$archivos = archivosEnviados();

$dirGuardado = "../../../img/";
$dir = "../img/";
$subirImg = false;

if($archivos["prodetalle"]["size"] === 0){
    $param["prodetalle"] = $dir.$datos["imagen"];
    $param["imagen"] = $datos["imagen"];
}else{
    $param["prodetalle"] = $dir.$archivos["prodetalle"]["name"];
    $param["imagen"] = $archivos["prodetalle"]["name"];
    $direccionMoment = $archivos["prodetalle"]["tmp_name"];
    $direccionOrin = $dirGuardado.$archivos["prodetalle"]["name"];
    $subirImg = true;
}

$param["idproducto"] = $datos["idproducto"];
$param["pronombre"] = $datos["pronombre"];
$param["procantstock"] = $datos["procantstock"];
$param["precio"] = $datos["precio"];
$param["prodeshabilitado"] = $datos["prodeshabilitado"];

$obj = new abmProducto();
if($subirImg){
    $obj->subirImagenProducto($direccionMoment,$direccionOrin);
}
echo json_encode($obj->modificacion($param));


?>