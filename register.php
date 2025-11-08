<?php
//conexion a la base de datos
require_once "DatabaseConnection.php";

$db = new DatabaseConnection();
$connection = $db->conn;

?>

<!--Register.html-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de usuario</title>
</head>

<body>
    <div>
        <div>
<!--Formulario con los imputs de username, firstName, lastName, email, password-->
            <form action="validation.php" method="post">
                <div>
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" name="username" id="username">
                </div>
                <div>
                    <label for="firstName">Nombre</label>
                    <input type="text" name="firstName" id="firstName">
                </div>
                <div>
                    <label for="lastName">Apellido</label>
                    <input type="text" name="lastName" id="lastName">
                </div>
                <div>
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </div>
        <a href="index.html">Landing Page</a>
    </div>
</body>

</html>