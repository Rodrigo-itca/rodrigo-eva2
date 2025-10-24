<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 flex items-center justify-center min-h-screen">
        <main class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center">
            <h1 class="text-2xl font-bold mb-6">Bienvenido, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>
            <div class="space-y-4">
                <a href="logout.php" class="block w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700">Salir de la aplicación</a>
                <a href="ejercicio2.php" class="block w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Ir al ejercicio 2</a>
                <a href="ejercicio3.php" class="block w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700">Ir al ejercicio 3</a>
            </div>
        </main>
    </body>
</html>