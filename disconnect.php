<?php 

class disconectx
{
    public function cerrarConexion($conn)
    {
    // Cerrar la conexión
    $conn->close();
    }

}
?>