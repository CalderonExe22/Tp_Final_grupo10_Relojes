<?php

function data_submitted()
{
    // Función auxiliar para tomar los datos recibidos sin importar el método usado
    $_AAux= array();
    if (!empty($_POST)) {
        $_AAux =$_POST;
    } elseif (!empty($_GET)) {
        $_AAux =$_GET;
    }
    if (count($_AAux)) {
        foreach ($_AAux as $indice => $valor) {
            if ($valor=="") {
                $_AAux[$indice] = 'null';
            }
        }
    }
    return $_AAux;
}

function dismount($object) {
    $reflectionClass = new ReflectionClass(get_class($object));
    $array = array();
    foreach ($reflectionClass->getProperties() as $property) {
        $property->setAccessible(true);
        $array[$property->getName()] = $property->getValue($object);
        $property->setAccessible(false);
    }
    return $array;
}

function convert_array($param) {
    $_AAux= array();
    if (!empty($param)) {
        if (count($param)){
            foreach($param as $obj) {
                array_push($_AAux,dismount($obj));    
            }
        }
    }
    
    return $_AAux;
}

function archivosEnviados(){

    $arrayDatos = array();

    if(!empty($_FILES)){
        $arrayDatos = $_FILES;
    }
    

    if(count($arrayDatos)){
        foreach($arrayDatos as $indice => $valor) {
            if($valor == ""){
                $arrayDatos[$indice] = 'null';
            }
        }
    }

    return $arrayDatos;

}

spl_autoload_register(function ($clase) {
    $directorys = array(
        $GLOBALS['ROOT'].'Modelo/',
        $GLOBALS['ROOT'].'Modelo/conector/',
        $GLOBALS['ROOT'].'Control/',
    );
    foreach ($directorys as $directory) {
        if (file_exists($directory.$clase.'.php')) {
            require_once($directory.$clase.'.php');
            return;
        }
    }
});

function compararPsw($nombre, $psw)
{
    $resul = false;
    $user = new abmUsuario();
    $arreglo = $user->buscar(['usnombre'=>$nombre]);

    if ($psw == $arreglo[0]->getUsPass()) {
        $resul = true;
    }
    return $resul;
}


