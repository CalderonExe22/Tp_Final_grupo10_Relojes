<?php
$Titulo = "Ingresar Producto";
//$permitirAcceso = "../Deposito/ingresarProducto.php";
include_once("../Estructura/cabecera.php");
?>

<div id="contenedor" class="container">


    <div class="row d-flex justify-content-center align-items-center">

        <form class="w-50" id="formulario" enctype="multipart/form-data">
            <div class="col-12">
                <h1 class="text-center">
                    Ingresar producto
                </h1>
            </div>
            <div id="resultado" class="text-center">

            </div>
            <div class="col-12">
                <input class="mt-4 form-control" type="text" id="pronombre" name="pronombre" placeholder="Ingrese el nombre del producto" required>
            </div>
            
            <div class="col-12">
                <input class="mt-4 form-control" type="number" id="precio" name="precio" placeholder="Ingrese el precio del producto" required>
            </div>

            <div class="col-12">
                <input class="mt-4 form-control" type="number" id="procantstock" name="procantstock" placeholder="Ingrese el cantidad(stock) del producto" required>
            </div>

            <div class="col-12">
                <input class="mt-4 form-control" type="file" accept="image/jpeg, image/png, image/gif, image/svg,image/avif" id="prodetalle" name="prodetalle" placeholder="Ingrese una portada del producto" required>
            </div> 

            <div class="col-12">
                <input id="enviar" class="mt-4" type="submit" value="Subir articulo">
            </div>
            
        </form>
    </div>

</div>
    
 <!-- -->
  <script src="../JS/js/accionDepositos.js"></script>
<?php
include_once("../Estructura/pie.php");
?>