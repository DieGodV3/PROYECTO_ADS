<?php

class personas
{

  public function AutenticarPersona($user, $pswrd)
  {
    //Inicio Cargar archive
    include_once('mensaje.php');
    include_once('connect.php');
    include_once('disconnect.php');
    include_once('Privilegios.php');

    //Termino Cargar archive

    /*-metodo-*/$objconect = new conectx();
    /*-metodo-*/$objdisconect = new disconectx();
    /*-metodo-*/$objprivilegios = new privilegio();
    /*-metodo-*/$conn = $objconect->arr();


    $query = "SELECT * FROM usuario WHERE nombre_usuario = ?";
    $stmt = $conn->prepare($query);

    $stmt->bind_param("s", $nombre_usuario);
    $nombre_usuario = $user;
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
      $fila = $resultado->fetch_assoc();
      $contraseña_hash = $fila["contraseña"];
      $hash = password_hash($contraseña_hash, PASSWORD_DEFAULT);

      // Verifica si la contraseña proporcionada coincide con la contraseña almacenada
      if (password_verify($pswrd, $hash)) {
        // Autenticación exitosa, el usuario ha proporcionado credenciales válidas

        /*-metodo-*/ $objprivilegios->ConectarPrivilegio($user);
        // Puedes redirigir al usuario a la página principal u otras funcionalidades
        /*-metodo-*/$objMensaje = new mensaje("iniciaste sesion correctamente");
        $stmt->close();
        return true;
      } else {
        // Contraseña incorrecta
        /*-metodo-*/$objMensaje = new mensaje("no es la contrasseña");
        echo $user;
        echo $pswrd;
        echo $contraseña_hash;
        $stmt->close();
        return false;
      }
    } else {
      // El usuario no existe
      /*-metodo-*/$objMensaje = new mensaje("no encoontro la linea");
      $stmt->close();
      return false;
    }

    //$stmt->close();
 


  }
}
?>