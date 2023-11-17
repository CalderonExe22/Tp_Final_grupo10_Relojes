<?php
    $Titulo = "Iniciar Sesion";
    $libre = true;
    include_once '../Estructura/cabecera.php';
?>
<!-- MD5 -->
<script src="../JS/md5.js"></script>
<!--VALIDADOR -->
<script src="../JS/validaciones.js"></script>

<div id="contenedor" class="container p-4 d-flex justify-content-center">
    <form action="" method="post" name="login" id="login" accept-charset="utf-8" class="mb-3 w-25">

        <h1 class="text-center">Iniciar Sesion</h1>
        <p class="mt-4 text-center">Mantente conectado con nosotros</p>
        <hr>
    <!-- INICIO FORMULARIO INICIAR SESIÓN -->
        <div class="form-group mb-3" >
            <label for="usnombre" class="form-label">Nombre de Usuario: </label>
            <input type="text" class="form-control" id="usnombre" name="usnombre" autocomplete="off">
        </div>
        <div class="form-group mb-3">
            <label for="uspass" class="form-label">Contraseña: </label>
            <input type="password" class="form-control" id="uspass" name="uspass" autocomplete="off">
        </div>
        <button id="enviar" type="submit" class="btn btn-outline-primary">Ingresar</button>
    </form>
    <!-- FIN FORMULARIO INICIAR SESIÓN 
    <div class="p3">
        No est&aacute; registrado?
        <a href="registro.php">Registrarse</a>
    </div>-->
</div>

<script src="../JS/js/login.js"></script>

<?php include_once '../Estructura/pie.php'; ?>