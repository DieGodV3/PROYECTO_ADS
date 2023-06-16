CREATE TABLE usuario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre_usuario VARCHAR(50) NOT NULL,
  contraseña VARCHAR(255) NOT NULL,
  activado BOOLEAN DEFAULT FALSE
);
CREATE TABLE privilegios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre_privilegio VARCHAR(50) NOT NULL
);
CREATE TABLE usuario_privilegio (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  privilegio_id INT,
  FOREIGN KEY (usuario_id) REFERENCES usuario(id),
  FOREIGN KEY (privilegio_id) REFERENCES privilegios(id)
);


<?php


//para insertar usuarios y contraseñas, ESTA HASHEADO PARA LEER LAS CONTRASEÑAS PREGUNTAR A DIEGO

class personas 
{

    public function registrarPersona($user,$pswrd)
    {  
      //Inicio Cargar archive
      include_once('mensaje.php');
      include_once('connect.php');
      include_once('disconnect.php');
      //Termino Cargar archive

      /*-metodo-*/$objconect = new conectx();
      /*-metodo-*/$objdisconect = new disconectx();
      /*-metodo-*/$conn = $objconect ->arr();
      

      // Preparar la consulta con parámetros
      $query = "INSERT INTO usuario (nombre_usuario, contraseña, activado) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ssi", $nombre_usuario, $contraseña, $activado);
      
      $nombre_usuario = $user;
      $contraseña = $pswrd;
      $activado = 1;   
      // Ejecutar la consulta
      $resultado = $stmt->execute();
  

      // Verificar si la inserción fue exitosa
      if ($resultado) {
          $filas = $stmt->affected_rows;
          $stmt->close();
          /*-metodo-*/$objdisconect->cerrarConexion($conn);
          if ($filas == 1) {
              return true;
          } else {
              return false;
          }
      } else {
          $stmt->close();
          /*-metodo-*/$objdisconect->cerrarConexion($conn);
          return false;
      }
       
      

  }
}
?>



para ver los privilegios


$nombre_usuario = "nombre_de_usuario"; // Reemplaza "nombre_de_usuario" por el nombre de usuario proporcionado en el formulario de inicio de sesión

// Consulta para obtener los datos del usuario y su privilegio
$query = "SELECT usuarios.nombre_usuario, privilegios.nombre_privilegio
          FROM usuarios
          INNER JOIN usuario_privilegio ON usuarios.id = usuario_privilegio.usuario_id
          INNER JOIN privilegios ON usuario_privilegio.privilegio_id = privilegios.id
          WHERE usuarios.nombre_usuario = ?";

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