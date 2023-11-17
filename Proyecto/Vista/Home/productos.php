<?php
        $Titulo = "Productos";
        $libre = true;
        include_once '../Estructura/cabecera.php';
?>

<div class="container-fluid  d-flex justify-content-center align-items-center imgPrincipalPro">
        <div class="col-12 text-center p-5">
                <h2 class="titulosImagen">Descubre que tenemos para ti</h2>
                <p class="textoImagen">Explora los productos que tenemos disponibles en este momento.</p>
        </div>
</div>


<div id="contenedor" class="container py-4" id="contenedorProductos">
        <div class="row" id="filaProductos"></div>
</div>

<script src="../JS/js/listarProductos.js"></script>
<script src="../JS/eventoCabecera.js"></script>

<?php include_once '../Estructura/pie.php' ?>