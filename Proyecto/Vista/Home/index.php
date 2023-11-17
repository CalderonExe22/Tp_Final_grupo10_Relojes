<?php
    $Titulo = "Inicio";
    $libre = true;
    include_once ("../Estructura/cabecera.php");
    $datos = data_submitted();

    $trailer1["trailer"] = "https://www.youtube.com/@cartier";
    $trailer1["nombre"] = "qr_cartier.png";

    $trailer2["trailer"] = "https://www.youtube.com/@ROLEX";
    $trailer2["nombre"] = "qr_rolex.png";

    $trailer3["trailer"] = "https://www.youtube.com/@tissot";
    $trailer3["nombre"] = "qr_tirot.png";

    $dir = "../img/temp/";
                
    if(!file_exists($dir)){
        mkdir($dir);
    }

    $tamanio = 3;//tamaño de la imagen que le daremos al qr, 33 * 10 = 330px, donde 10 es $tamanio, osea, 33 * $tamanio = qrpx
    $level = "Q";// calidad del qr, L,M,Q,H
    $framSize = 3;// margen que le daremos al qr

    QRcode::png($trailer1["trailer"] , $dir.$trailer1["nombre"], $level, $tamanio, $framSize);
    QRcode::png($trailer2["trailer"] , $dir.$trailer2["nombre"], $level, $tamanio, $framSize);
    QRcode::png($trailer3["trailer"] , $dir.$trailer3["nombre"], $level, $tamanio, $framSize);

  

if (!empty($datos['mensaje'])) {
?>
    <div class="position-fixed p-2 bottom-0 end-0">
        <div class="toast show text-bg-primary">
            <div class="toast-header">
                <i class="fa-solid fa-envelope me-2"></i>
                <strong class="me-auto">Mensaje Sistema</strong>
                <small>hace 2 minutos</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <span><?php echo $datos['mensaje'] ?></span>
            </div>
        </div>
    </div>
<?php } ?>

<div class="container-fluid pe-0 ps-0">
    <!--<div class="col-12 text-center p-5 mb-5 izq">
        <h2 class="titulosImagen">Descubre que tenemos para ti</h2>
        <p class="textoImagen">Explora los productos que tenemos disponibles en este momento.</p>
        <a href="productos.php"><button class="boton mt-5" type="button">Explora nuestros productos</button><br></a>
    </div>-->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/Wristshot-mano-derecha.jpeg" class="imgPrincipal" alt="imgPortadaPrincipal">
                <div class="carousel-caption d-none d-md-block m-5">
                    <h2 class="titulosImagen">Descubre que tenemos para ti</h2>
                    <p class="textoImagen">Explora los productos que tenemos disponibles en este momento.</p>
                    <a href="productos.php"><button class="boton mt-5" type="button">Explora nuestros productos</button><br></a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="../img/cartier.png" class="imgPrincipal" alt="imgMarcas">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="titulosImagen">Descubre alguno de nuestros productos</h2>
                    <p class="textoImagen">Visita su canal de youtube y enterate de lo ultimo.</p>
                    <div class="col-12 d-flex justify-content-center">
                        <img src="<?php echo $dir.$trailer1["nombre"] ?>" id="qr" alt="imgMarcas">
                    </div>
                </div>    
            </div>

            <div class="carousel-item">
                <img src="../img/rolex.webp" class="imgPrincipal" alt="imgMarcas">
                <div class="carousel-caption d-none d-md-block me-5">
                    <h2 class="titulosImagen">Descubre alguno de nuestros productos</h2>
                    <p class="textoImagen">Visita su canal de youtube y enterate de lo ultimo.</p>
                    <div class="col-12 d-flex justify-content-center">
                        <img src="<?php echo $dir.$trailer2["nombre"] ?>" id="qr" alt="imgMarcas">
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img src="../img/tirot.webp" class="imgPrincipal" alt="imgMarcas">
                <div class="carousel-caption d-none d-md-block me-5">
                    <h2 class="text-center titulosImagen">Descubre alguno de nuestros productos</h2>
                    <p class="text-center textoImagen">Visita su canal de youtube y enterate de lo ultimo.</p>
                    <div class="col-12 d-flex justify-content-center">
                        <img src="<?php echo $dir.$trailer3["nombre"] ?>" id="qr" alt="imgMarcas">
                    </div>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
        </div>
</div>

<script src="../JS/eventoCabecera.js"></script>
<script src="../JS/js/menu.js"></script>
