<?php
 class formulario
 {
        private function formHtml($titulo)
        {
		?>
                 <html>
                 <head>
			<title> <?php echo strtoupper($titulo)?> </title>
            <link rel="stylesheet" type="text/css" href="style.css">    
                 </head>
                 <body>
		    <form name='form1' method='post' action='getDatos.php'>
            <table  border ='0' align='center'>     
                <tr>
                    <td>NOMBRE: </td>
                    <td> <input name='txtnombre' type='text'/></td>
                </tr>
                <tr>
                    <td>APELLIDO: </td>
                    <td> <input name ='txtapellido' type='text' /></td>
                </tr>
                <tr>
                    <td>EDAD: </td>
                    <td> <input name ='txtedad' type='text' /></td>
                </tr>
                <tr>
                    <td> </td>
                    <td> <input name='btnAceptar' type='submit' value='Guardar'/></td>
                </tr>
                  
            </table>
		    </form>
                 </body>
                 </html>
                <?php
	}	

        public function formularioShow()
        {
		/* metodo*/$this->formHtml('PRUEBA POO PHP');
        }
 }
?>