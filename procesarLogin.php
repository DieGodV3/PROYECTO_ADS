<?php
function validarTexto($nombre,$apellido)
{
    $nombre = trim($nombre);
    $apellido = trim ($apellido);

    if(strlen($nombre) >= 3 and strlen($apellido)>=3 )
        return true;
    else
        return false;
}

//AQUI EMPIEZA A CORRER

if(isset($_POST['btnIngresar']))
{
    if(validarTexto($_POST['txtusuario'],$_POST['txtcontrasena']))
    {
        //Inicio Cargar archive
        include_once('mensaje.php');
        include_once('control.php');
        //Termino Cargar archive
        $user = trim($_POST['txtusuario']);
        $pswrd = trim ($_POST['txtcontrasena']);
        //
        //$objMensaje = new mensaje("aqui");
        /*-metodo-*/$objControl = new control();
        /*-metodo-*/$objControl -> control2($user,$pswrd);

    }
    else
    {
        //Inicio Cargar archive
        include_once('mensaje.php');
        //Termino Cargar archive
        
        /*-metodo-*/$objMensaje = new mensaje("Error, datos no validos");        
    }
}
else
{
        //Inicio Cargar archive
        include_once('mensaje.php');
        //Termino Cargar archive
        /*-metodo-*/$objMensaje = new mensaje("te crees hacker????");

    
}
?>