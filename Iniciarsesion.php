<?php

include("conexion.php");


session_start(); // Iniciar sesión

// Verificar si se enviaron los datos del formulario
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar las credenciales en la base de datos
    $identificar = "SELECT acapulco_password FROM acapulco_user WHERE acapulco_user= '$username'";
    $result = $conn->query($identificar);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passwordbd = $row['acapulco_password'];

        

        // Verificar la contraseña (debes tener cuidado con la forma de almacenarla y compararla)
        if (password_verify($password, $row['contrasena']) && hash('sha256', $password) == $passwordbd ) {
            // Credenciales correctas, iniciar sesión
            $_SESSION['username'] = $username;
            header("Location: index.html"); // Redirigir a la página de inicio después del inicio de sesión exitoso
            exit();
        } else {
            // Contraseña incorrecta
            echo "<script> alert('La contraseña esta incorrecta ');</script>";
            header("Location: inicio.html"); // Redirigir a la página de inicio después del inicio de sesión exitoso
        }
    } else {
        // Usuario no encontrado
        echo "<script> alert('El usuario no existe');
        window.location = 'index.html'</script>"; // Redirigir a la página de inicio después del inicio de sesión exitoso
    }


}
?>
