<?php
$Titulo = "Tabla Productos";
//$permitirAcceso = '../Deposito/tablaProductos.php';
include_once '../Estructura/cabecera.php';
/*if (!$sesion->verificarPermiso('../Deposito/tablaProductos.php')) {
    $mensaje = "No tiene permiso para acceder a este sitio.";
    echo "<script> window.location.href='../Home/index.php?mensaje=" . urlencode($mensaje) . "'</script>";
} else {*/
    $objItems = new abmProducto();
    $listaProds = $objItems->buscar(null);
    if (count($listaProds) > 0) {
?>
<div id="contenedor">

</div>
<div id="contenedor" class="container my-2">
        <div class="table-responsive">
            <table class="table table-hover caption-top align-middle text-center" id="tablaProductos">
                <caption>Productos</caption>
                <thead class="table-dark">
                    <tr>
                        <th width="70">ID</th>
                        <th>Nombre</th>
                        <th>Detalle</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Deshabilitado</th>
                        <th width="200">Acciones</th>
                    </tr>
                </thead>
                <form id="ingresarPro" enctype="multipart/form-data">
                    <tbody class="table-group-divider">
                    <!-- AQUI SE LISTAN LOS PRODUCTOS -->
                    </tbody>
                </form>
            </table>
        </div>

        <div class="position-fixed top-50 start-50 translate-middle">
            <div class="container-fluid p-4 mt-5 border border-2 rounded-2 bg-light bg-light shadow-lg p-3 mb-5 d-none" id='editarProducto'>
                <h5 class="text-center"><i class="fa-solid fa-file-pen me-2"></i>Actualizar Producto</h5>
                <hr>
                <form class="row g-3" name="editarP" id="editarP" accept-charset="utf-8" class="mb-3" enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                        <div class="col-lg-7 col-12" id='mostrarId'></div>
                        <label for="idproducto" class="form-label">ID: </label>
                        <input type="number" class="form-control" id="idproducto" name="idproducto" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pronombre" class="form-label">Nombre del Producto: </label>
                        <input type="text" class="form-control" id="pronombre" name="pronombre" autocomplete="off">
                    </div>

                    <input type="hidden" class="form-control" id="imagen" name="imagen" >

                    <div class="form-group col-md-6">
                        <label for="procantstock" class="form-label">Stock: </label>
                        <input type="number" class="form-control" id="procantstock" name="procantstock" autocomplete="off">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="precio" class="form-label">Precio: </label>
                        <input type="number" class="form-control" id="precio" name="precio" autocomplete="off">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prodeshabilitado" class="form-label">Deshabilitado: </label>
                        <input type="text" class="form-control" id="prodeshabilitado" name="prodeshabilitado" autocomplete="off" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="imagen" class="form-label">Imagen del Producto: </label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/svg,image/avif" class="form-control" id="prodetalle" placeholder="Ingrese nueva imagen" name="prodetalle" autocomplete="off">
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-outline-warning" type="submit" name="boton_enviar" id="boton_enviar">Modificar</button>
                        <button class="btn btn-outline-danger mx-2" name="cancelar" type="button" id="cancelar">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="../JS/js/funcionesABMProducto.js"></script>
</div>
    <?php } else {
    ?>
        <div class="container p-2">
            <div class="alert alert-info" role="alert">
                No hay productos cargados
            </div>
        </div>
<?php
    }
    include_once '../Estructura/pie.php';
/*}*/ ?>