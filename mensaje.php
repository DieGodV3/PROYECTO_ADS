<?php
 class mensaje
 {
        public function mensaje($mensajeEnviado)
        {
		?>
                 <html>
                 <head>
			<title> MENSAJE DEL SISTEMA </title>
                 </head>
                 <body>
                    <center><strong> <?php echo strtoupper($mensajeEnviado) ?></strong</center>
                    <p><center><a href='index.php'>inicio</a></center></p>
                 </body>
                 </html>
                <?php
	}	

        
 }
?>