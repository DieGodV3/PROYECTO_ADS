<?php
class LoginFormulario
{
    private function formHtml($titulo)
    {
        ?>
        <html>

        <head>
            <title>
                <?php echo strtoupper($titulo) ?>
            </title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <style>
                .container {
                    margin-top: 50px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                }

                .logo {
                    margin-bottom: 5px;
                }

                .form-table {
                    text-align: center;
                }
            </style>
        </head>

        <body>
            <div class="container">
                <div class="logo">
                    <img src="LogoVarsa (1).png" alt="Logo">
                </div>
                <form name='form1' method='post' action='procesarLogin.php'>
                    <table class="form-table" border='0' align='center'>
                        <tr>
                            <td>Usuario:</td>
                            <td><input name='txtusuario' type='text' /></td>
                        </tr>
                        <tr>
                            <td>Contraseña:</td>
                            <td><input name='txtcontrasena' type='password' /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input name='btnIngresar' type='submit' value='Ingresar' /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </body>

        </html>
        <?php
    }

    public function mostrarFormulario()
    {
        $this->formHtml('Inicio de Sesión');
    }
}
?>