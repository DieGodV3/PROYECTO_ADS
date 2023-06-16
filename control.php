<?php
class control
{
    private function almacenaDatos($user,$pswrd)
    {
        //Inicio Cargar archive
        include_once('mensaje.php');
        include_once('persona.php');
        //Termino Cargar archive

        /*Instancia*/$objetoPersona = new personas();
      
        /*-metodo-*/$respuesta = $objetoPersona -> AutenticarPersona($user,$pswrd);

        if($respuesta)
        {   
        return true;
        }
        else
        {     
        /*-metodo-*/$objMensaje = new mensaje("nogo");
        return false;
        }

    }

    public function control2($user,$pswrd)
    {
        //Inicio Cargar archive
        include_once('mensaje.php'); 
        //Termino Cargar archive

        if($this->almacenaDatos($user,$pswrd))
            {
               
               /*-metodo-*/$objMensaje = new mensaje("Bienvenido al sistema");
            }
            else
            {
                
                /*-metodo-*/$objMensaje = new mensaje("Ha ocurrido un error al entrar");
                
            } 
    }

}
?>