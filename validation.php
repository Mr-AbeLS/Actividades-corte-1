<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Sanitización de espaciados
    $data = [
        "username"  => trim($_POST["username"] ?? ""),
        "firstName" => trim($_POST["firstName"] ?? ""),
        "lastName"  => trim($_POST["lastName"] ?? ""),
        "email"     => trim($_POST["email"] ?? ""),
        "password"  => trim($_POST["password"] ?? "")
    ];

    $errors = [];

    //Validación usando ciclo + regex
    foreach ($data as $key => $value) {
        if (empty($value)) {
            $errors[] = "El key $key es obligatorio.";
        }
    }

    //Validación específica por key usando regex y condicionales
    //Username solo letras, números y guiones bajos
    if (!preg_match("/^[a-zA-Z0-9_]{4,15}$/", $data["username"])) {
        $errors[] = "El username debe tener entre 4 y 20 caracteres y sin símbolos especiales.";
    }

    //Nombre y apellido solo letrs y espacios
    if (!preg_match("/^[a-zA-Z ]+$/", $data["firstName"])) {
        $errors[] = "El nombre solo puede contener letras.";
    }
    if (!preg_match("/^[a-zA-Z ]+$/", $data["lastName"])) {
        $errors[] = "El apellido solo puede contener letras.";
    }

    // Email
    if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El correo no tiene un formato válido.";
    }

    //Password mínmo 8 caracteres, 1 mayúscula, 1 número
    if (!preg_match("/^(?=.*[A-Z])(?=.*\d).{8,}$/", $data["password"])) {
        $errors[] = "La contraseña debe tener mínimo 8 caracteres, una mayúscula y un número.";
    }

    //Si no hay errors => logrado
    if (empty($errors)) {
        echo "Datos validados correctamente. Listo para insertarse en la BD.</p>";
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        //aquí se ejecutaría un INSERT 
    } else { //gg
        echo "Se encontraron errors:</p><ul>";
        foreach ($errors as $e) {
            echo "<li>$e</li>";
        }
        echo "</ul>";
    
    }
}
?>
<a href="index.html">volver</a>