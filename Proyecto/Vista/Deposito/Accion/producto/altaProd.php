<?php 
    include_once "../../../../configuracion.php";
    $datos = data_submitted();
    $archivos = archivosEnviados();
    $ambProductos = new abmProducto();
    $dirGuardado = "../../../img/";
    $dir = "../img/";
    $direccionMoment = $archivos["prodetalle"]["tmp_name"];
    $direccionOrin = $dirGuardado.$archivos["prodetalle"]["name"];
    
    $param["pronombre"] = $datos["pronombre"];
    $param["prodetalle"] = $dir.$archivos["prodetalle"]["name"];
    $param["procantstock"] = $datos["procantstock"];
    $param["precio"] = $datos["precio"];
    $param["prodeshabilitado"] = "0000-00-00 00:00:00";
    $param["imagen"] = $archivos["prodetalle"]["name"];
    
    if(isset($datos)){
        if($ambProductos->subirImagenProducto($direccionMoment,$direccionOrin)){
            $resultado = $ambProductos->altaSinID($param); 
            if($resultado){
                $mensaje = "El producto se subio correctamente";
            }else{
                $mensaje = "No se pudo subir el producto";
            }
        }else{
            $resultado = false;
            $mensaje = "Error al subir la imagen, por favor revise el archivo enviado";
        }
        
    }
    
    $retornoJSON["result"] = $resultado;
    $retornoJSON["mensaje"] = $mensaje;
    
    echo json_encode($retornoJSON);
    
?>