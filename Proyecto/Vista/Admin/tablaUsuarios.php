<?php
    $Titulo = "Tabla Usuarios";
    //$permitirAcceso = '../Admin/tablaUsuarios.php';
    include_once '../Estructura/cabecera.php';
    /*if (!$sesion->verificarPermiso('../Admin/tablaUsuarios.php')) {
        $mensaje = "No tiene permiso para acceder a este sitio.";
        echo "<script> window.location.href='../Home/index.php?mensaje=" . urlencode($mensaje) . "'</script>";
    } else {*/
    $objUsuarios = new abmUsuario();
    $listaUsuario = $objUsuarios->buscar(null);
    $objRol = new abmRol();
    $listaRoles = $objRol->buscar(null);
    if (count($listaUsuario) > 0) {
?>
<script src="../JS/md5.js"></script>
        <div id="contenedor" class="container">
            <div class="table-responsive">
                <table class="table table-hover caption-top align-middle text-center" id="tablaUsuarios">

                    <thead class="table-dark">
                        <tr>
                            <th width="70">ID</th>
                            <th>Nombre</th>
                            <th>Mail</th>
                            <th>Deshabilitado</th>
                            <th width="125">Roles</th>
                            <th width="425">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <!-- AQUI SE AÑADEN LOS USUARIOS DINÁMICAMENTE -->
                    </tbody>
                </table>
            </div>

            
        </div>

        <script src="../JS/js/funcionesABMUsuario.js"></script>
    <?php } else {
    ?>
        <div class="container p-2">
            <div class="alert alert-info" role="alert">
                No hay usuarios cargados!
            </div>
        </div>
<?php
    }
    include_once '../Estructura/pie.php';
/*}*/ ?>