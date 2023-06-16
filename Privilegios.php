<?php
class privilegio
{
    public function ConectarPrivilegio($user)
    {
        include_once('connect.php');
        include_once('disconnect.php');

        /*-metodo-*/$objconect = new conectx();
        /*-metodo-*/$objdisconect = new disconectx();
        /*-metodo-*/$conn = $objconect ->arr();
        $nombre_usuario = $user; // Reemplaza "nombre_de_usuario" por el nombre de usuario proporcionado en el formulario de inicio de sesión

        // Consulta para obtener los datos del usuario y su privilegio
        $query = "SELECT usuario.nombre_usuario, privilegios.nombre_privilegio
          FROM usuario
          INNER JOIN usuario_privilegio ON usuario.id = usuario_privilegio.usuario_id
          INNER JOIN privilegios ON usuario_privilegio.privilegio_id = privilegios.id
          WHERE usuario.nombre_usuario = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $nombre_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $fila = $resultado->fetch_assoc();
            $nombreUsuario = $fila['nombre_usuario'];
            $nombrePrivilegio = $fila['nombre_privilegio'];

  echo "¡Inicio de sesión exitoso!";
  echo "Bienvenido, $nombreUsuario. Tu privilegio es: $nombrePrivilegio";
} else {
        echo "Nombre de usuario incorrecto.";
}





    }




}




?>