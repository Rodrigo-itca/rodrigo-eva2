<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validación de campos vacíos
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Por favor complete todos los campos.";
        header("Location: index.php");
        exit();
    }

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE correo = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si existe el usuario
    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "Correo o contraseña incorrectos.";
        header("Location: index.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
