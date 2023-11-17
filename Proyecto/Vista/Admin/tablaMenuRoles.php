<?php
$Titulo = "Tabla Menu Roles";
//$permitirAcceso = "../Admin/tablaMenuRoles.php";
include_once '../Estructura/cabecera.php';

/*if (!$sesion->verificarPermiso('../Admin/tablaMenuRoles.php')) {
    $mensaje = "No tiene permiso para acceder a este sitio.";
    echo "<script> window.location.href='../Home/index.php?mensaje=" . urlencode($mensaje) . "'</script>";
} else {*/
    $obj_ABM_Menu = new abmMenu();
    $obj_ABM_rol = new abmRol();
    $arrayRol = $obj_ABM_rol->buscar();
    $arrayMenu = $obj_ABM_Menu->ObtenerMenu();

    if (count($arrayMenu) > 0) { ?>

        <div id="contenedor" class="container">
            <div class="table-responsive">
                <table class="table table-hover caption-top align-middle text-center" id="tablaMenu">

                    <thead class="table-dark">
                        <tr>
                            <th width="70">ID</th>
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th width="120">ID Padre</th>
                            <th width="120">ID Rol</th>
                            <th>Deshabilitado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr class="table-active">
                            <td><input class="form-control" type="number" placeholder="#" readonly></td>
                            <td><input class="form-control" type="text" placeholder="Nombre"></td>
                            <td><input class="form-control" type="text" placeholder="Detalle"></td>
                            <td><select class="form-select" name="menuPadre" id="menupadre" >
                                <option selected value="">Elegir Padre...</option>
                                <?php 
                                    foreach ($arrayMenu as $menuobj) {
                                        $menuO = dismount($menuobj->getObjMenu());
                                        
                                    ?>
                                    <option value="<?php echo $menuO["idmenu"]?>"><?php echo $menuO["menombre"]?></option>
                                <?php }?>
                            </select></td>
                            <!-- <td><input class="form-control" type="number" min=0 placeholder="ID Menu Padre"></td> -->
                            <!-- <td><input class="form-control" type="number" min=0 placeholder="ID Rol"></td> -->
                            <td><select class="form-select" name="idrol" id="idrol" >
                                <option selected value="">Elegir Rol...</option>
                                <?php foreach ($arrayRol as $rol) {?>
                                    <option value="<?php echo $rol->getID() ?>"><?php echo $rol->getRolDescripcion() ?></option>
                                <?php }?>
                            </select></td>
                            <td><input class="form-control" type="text" placeholder="Deshabilitado" onlyread></td>
                            <td colspan="2"><a href="#" class="agregar"><button class="btn btn-outline-success col-11"><i class="fa-solid fa-folder-plus"></i></button></a></td>
                        </tr>
                        <?php
                        foreach ($arrayMenu as $objMenu) {
                            $menu = dismount($objMenu->getObjMenu());
                            $rol = dismount($objMenu->getObjRol());
                        ?>

                            <tr>
                                <td><?php echo $menu["idmenu"] ?></td>
                                <td><?php echo $menu["menombre"] ?></td>
                                <td><?php echo $menu["medescripcion"] ?></td>
                                <td><?php echo $menu["objmenupadre"]->getID() == NULL ? "" : $menu["objmenupadre"]->getID() ?></td> <!-- REVISAR ESTA PARTE -->
                                <td><?php echo $rol["rodescripcion"] ?></td>
                                <td><?php echo $menu["medeshabilitado"] == NULL || $menu["medeshabilitado"] == '0000-00-00 00:00:00'  ? 'Habilitado' : 'Desabilitado' ?></td>
                                <td>
                                    <a href="#" class="editar"><button class="btn btn-outline-warning"><i class="fa-solid fa-file-pen mx-2"></i></button></a>
                                    <?php if ($menu["medeshabilitado"] == NULL || $menu["medeshabilitado"] == '0000-00-00 00:00:00') {
                                        echo "<a href='#' class='deshabilitar'><button class='btn btn-outline-danger'><i class='fa-solid fa-trash mx-2'></i></button></a>";
                                    } else {
                                        echo "<a href='#' class='habilitar'><button class='btn btn-outline-success'><i class='fa-solid fa-trash mx-2'></i></button></a> ";
                                    } ?>
                                </td>
                            </tr>
                            <?php
                            
                            $arregloHijos = $obj_ABM_Menu->tieneHijos($menu["idmenu"]);
                            if ($arregloHijos <> null) {

                                foreach ($arregloHijos as $hijo) { 
                                    $arregloHijo = dismount($hijo);
                                    ?>
                                    <tr>
                                        <td><?php echo $arregloHijo["idmenu"] ?></td>
                                        <td><?php echo $arregloHijo["menombre"] ?></td>
                                        <td><?php echo $arregloHijo["medescripcion"] ?></td>
                                        <td><?php echo $menu["idmenu"] != $arregloHijo["idmenu"] ? $menu["idmenu"] : 'NULL'  ?></td>
                                        <td></td>
                                        <td><?php echo $arregloHijo["medeshabilitado"] == NULL || $arregloHijo["medeshabilitado"] == '0000-00-00 00:00:00' ? 'Habilitado' : 'Desabilitado' ?></td>
                                        <td>
                                            <a href="#" class="editar"><button class="btn btn-outline-warning"><i class="fa-solid fa-file-pen mx-2"></i></button></a>
                                            <?php if ($arregloHijo["medeshabilitado"] == NULL || $arregloHijo["medeshabilitado"] == '0000-00-00 00:00:00') {
                                                echo "<a href='#' class='deshabilitar'><button class='btn btn-outline-danger'><i class='fa-solid fa-trash mx-2'></i></button></a> ";
                                            } else {
                                                echo "<a href='#' class='habilitar'><button class='btn btn-outline-success'><i class='fa-solid fa-trash mx-2'></i></button></a> ";
                                            } ?>
                                        </td>
                                    </tr>
                                <?php
                                }


                                ?>

                        <?php


                            } else {
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="position-fixed top-50 start-50 translate-middle">
                <div class="container-fluid p-4 mt-5 border border-2 rounded-2 bg-light shadow-lg p-3 mb-5 d-none" d-none style="width: 350px;" id='editarMenu'>
                    <h5 class="text-center"><i class="fa-solid fa-file-pen me-2"></i>Actualizar Producto</h5>
                    <hr>
                    <form action="../accion/editarMenu.php" method="post" name="editarP" id="editarM" accept-charset="utf-8" class="mb-3">
                        <div class="form-group mb-3">
                            <div class="col-lg-7 col-12" id='mostrarId'></div>
                            <label for="idmenu" class="form-label">ID: </label>
                            <input type="number" class="form-control" id="idmenu" name="idmenu" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="menombre" class="form-label">Nombre del Menu: </label>
                            <input type="text" class="form-control" id="menombre" name="menombre" autocomplete="off">
                        </div>
                        <div class="form-group mb-3">
                            <label for="medescripcion" class="form-label">Descripción del Menu: </label>
                            <input type="text" class="form-control" id="medescripcion" name="medescripcion" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="medeshabiltado" class="form-label">Deshabilitado: </label>
                            <input type="text" class="form-control" id="medeshabilitado" name="medeshabilitado" autocomplete="off" readonly>
                        </div>
                        <div class="form-group mb-3 " id='padre'>

                            <label for="idpadre" class="form-label">Menu Padre </label>
                            <input type="text" class="form-control" id="idpadre" name="idpadre" autocomplete="off">

                        </div>
                        <div class="form-group mb-3 " id="selecRol">

                            <label for="idrol" class="form-label">Menu Roles </label>
                            <select class="form-select" id="idrol" name="idrol" aria-label="Default select example">
                                <option selected disabled>Elegir...</option>
                                <option value="1">Administrador</option>
                                <option value="2">Deposito</option>
                                <option value="3">Cliente</option>
                            </select>
                        </div>
                        <button class="btn btn-outline-warning" type="submit" name="boton_enviar" id="boton_enviar">Modificar</button>
                        <button class="btn btn-outline-danger mx-2" name="cancelar" type="button" id="cancelar">Cancelar</button>
                    </form>
                </div>
            </div>
            <script src="../JS/js/funcionesABMMenu.js"></script>
        </div>
    <?php } else { ?>
        <div class="container p-2">
            <div class="alert alert-info" role="alert">
                No hay menuroles cargados
            </div>
        </div>
<?php  }
/*}*/
include_once '../Estructura/pie.php'; ?>
<?php

// Relacionar cada menu con un rol, modificar la relacion menurol

?>