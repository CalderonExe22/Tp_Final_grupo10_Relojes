<?php
    include_once '../../configuracion.php';
    include_once "../../Utiles/class/phpqrcode/qrlib.php"
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title><?php echo $Titulo; ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- JQUERY -->
    <script type="text/javascript" src="../JS/jquery-3.6.1/jquery.min.js"></script>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="../CSS/bootstrap_css/bootstrap.min.css">
    <script src="../JS/bootstrap_js/bootstrap.bundle.min.js"></script>
    <!-- BOOTSTRAP VALIDATOR -->
    <script src="../JS/bootstrap/js/bootstrapValidator.min.js"></script>
    <script src="../JS/bootstrap/js/mensajesBVes_ES.js"></script>
    <!-- BOOTBOXJS LIBRERIA NOTIFICACIONES -->
    <script type="text/javascript" src="../JS/bootboxjs-5.5.2/bootbox.min.js"></script>
    <!-- FONTAWESOME LIBRERIA ICONOS -->
    <script src="../JS/Iconos/FontAwesomeKit.js"></script>

    <!-- Estiolos css -->
    <link rel="stylesheet" href="../CSS/styleGeneral.css">
    <link rel="stylesheet" href="../CSS/cssEfectos.css">    
    <link rel="stylesheet" href="../CSS/estiloCabeceraPie.css">

    <!-- ICON -->
    <link rel="icon" type="image/x-icon" href="../img/icon.ico">
    <!-- MENU -->
    <!--<script src="..\..\Utiles\js\menu.js"></script>-->
    
</head>
<!-- <?php /*include_once("../../Vista/Estructura/menu.php") */?>
FIN CABECERA -->
<body>

<?php
//---------Verificamos que la sesion del usuario este abierta---------\\
$session = new Session();
$resultado = $session->sesionActiva();
$abmMenuRol = new AbmMenuRol();
$usDesha = $session->getUsuarioDeshabilitado();
$abmRol = new AbmRol();
$menus = array();

if(!isset($libre)){

if($resultado){
$permitirAcceso=$session->verificarPermisoCabecera();
$accesoDeslogeado=false;
}else{
    $accesoDeslogeado=false;
    $permitirAcceso=false;
}
}else{
    $permitirAcceso=true;
    $accesoDeslogeado=true;
}

if ($resultado  && $permitirAcceso ||$accesoDeslogeado){
        if($resultado){
            $rolUsuario =  convert_array($session->getRoles());//mos retorna una coleccion de obj UsuarioRol
            
            if(count($rolUsuario) > 1){
                $abmRol = new AbmRol();
                    $rolActual = $session->getRolActivo();
                    $param["idrol"] = $rolActual["id"];               
                    $rol = convert_array($abmRol->buscar($param));
                    $idrol["idrol"] = $rol[0]["idrol"];
                    $listaMenuUsuario =convert_array($abmMenuRol->buscar($idrol));
                    for($e = 0; $e < count($listaMenuUsuario); $e++){
                        $menus[] = dismount($listaMenuUsuario[$e]["objmenu"]);
                    }
                    $cambiarRoles = true;      
            }else{
                $rolActual = $session->getRolActivo();
                if(count($rolActual) > 0){
                    $param["idrol"] = $rolActual["id"];
                    $abmRol = new AbmRol();
                    $rol = convert_array($abmRol->buscar($param));
                    $idrol["idrol"] = $rol[0]["idrol"];
                    $listaMenuUsuario =convert_array($abmMenuRol->buscar($param));
                    for($e = 0; $e < count($listaMenuUsuario); $e++){
                        $menus[] = dismount($listaMenuUsuario[$e]["objmenu"]);
                    }

                    $cambiarRoles = false; 
                }       
            }
            $logeado = true;
        }else{
            $param["rodescripcion"] = "deslogeado";
            $abmRol = new AbmRol();
            $rol = convert_array($abmRol->buscar($param));
            //print_r($rol);
            $idrol["idrol"] = $rol[0]["idrol"];
            $listaMenuUsuario =convert_array($abmMenuRol->buscar($idrol));
            for($e = 0; $e < count($listaMenuUsuario); $e++){
                $menus[] = dismount($listaMenuUsuario[$e]["objmenu"]);
            }

            $cambiarRoles = false;
            $logeado = false;
        }
}else{
    header("location:../Home/index.php");
}
//---------Si la sesion del usuario esta abierta, procedemos a mostrar un menu segun el tipo de usuario logeado---------\\


function tieneSubMenu($id){
    $abmMenu = new AbmMenu();
    $param["idpadre"]=$id;
    $resultado = convert_array($abmMenu->buscar($param));
    $subMenu = "";
    if($resultado > 0){
        for($i = 0; $i < count($resultado); $i++){
            if($resultado[$i]["medeshabilitado"] === NULL || $resultado[$i]["medeshabilitado"] === "0000-00-00 00:00:00"){
                $subMenu.= '<a class="submenus" href="'.$resultado[$i]["medescripcion"].'">'.$resultado[$i]["menombre"].'</a>'; 
            }
        }

    }
    return $subMenu;
}



?>

<header class="transparent-header">

        <div class="row">
            <div id="home" class="col-12 d-flex justify-content-center">
                <div class="text-center logo">
                    <a href="../Home/"><span class="logoHover">Logo</span></a>
                </div>
            </div>
        </div>
        <div id="contenedorMenu" class="row">

            <div id="mostrarMenu" class="col-12 mt-3">
                
                <?php
                if($menus != null){
                    for($i = 0; $i < count($menus); $i++){
                        $menu = $menus[$i];
                        if($menu["medeshabilitado"] === NULL || $menu["medeshabilitado"] === "0000-00-00 00:00:00" ){
                            $subMenus = tieneSubMenu($menu["idmenu"]);
                            if( $subMenus != ""){
                                echo
                                '<div class="contenedorLinks">
                                <a class="links-menu botonActivador" data-bs-toggle="collapse" href="#collapseExample'.$i.'" role="button"  aria-expanded="false" aria-controls="collapseExample">'.$menu["menombre"].'</a>
                                <div class="collapse miCollapse" id="collapseExample'.$i.'">
                                    <div id="desplegable" class="card card-body bg-Light">
                                        '.$subMenus.'
                                    </div>
                                    </div>
                                </div>';
                            }else{
                                echo '<div class="contenedorLinks"><a class="links-menu"  href="'.$menu["medescripcion"].'">'.$menu["menombre"].'</a></div>'; 
                            }    
                        }
                    }
                    if($cambiarRoles){
                        $cambiaR = "";
                        for($i = 0; $i < count($rolUsuario);$i++ ){
                            $rol = $rolUsuario[$i];
                            $cambiaR .= '<div class="contenedorLinks"><a class="cambiarRol"  href="#">'.$rol["rodescripcion"].'</a></div>';
                        }
                        echo
                        '<div class="contenedorLinks">
                        <a class="links-menu botonActivador" data-bs-toggle="collapse" href="#collapseExample" role="button"  aria-expanded="false" aria-controls="collapseExample">Cambiar rol</a>
                        <div class="collapse miCollapse" id="collapseExample">
                            <div id="desplegable" class="card card-body bg-Light">
                                '.$cambiaR.'
                            </div>
                            </div>
                        </div>';
                    }
                    
                    /*if($logeado){
                        echo '<div class="contenedorLinks"><a id="cerrar" class="links-menu" href="../login/accion/cerrarSesion.php">Cerrar sesion</a></div>';
                    }*/
                }else{
                    /*if($logeado){
                        echo '<div class="contenedorLinks"><a id="cerrar" class="links-menu" href="../login/accion/cerrarSesion.php">Cerrar sesion</a></div>';
                    }*/
                }    
                ?>
                
            </div>

           
            </div>
        </div>
    </header>