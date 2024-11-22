<?php 
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($conn);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mi Perfil</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <style> 
        /* Fondo y estilo de la página */
        body {
            background-image: url("./assets/blog-4.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Contenedor de perfil */
        .profile-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        /* Título del perfil */
        .profile-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #004c66;
        }

        /* Imagen de perfil */
        .my-profile-png {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            object-fit: cover;
        }

        /* Atributos del perfil */
        .attribute-of-profile {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .box-1 {
            margin-bottom: 15px;
            font-size: 16px;
        }

        /* Botones de acción */
        .update-profile-button, .profile-button-logout, .profile-button-home {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
            width: 100%;
            color: white;
        }

        .update-profile-button {
            background-color: #00bffe;
        }

        .profile-button-logout {
            background-color: #f44336;
        }

        .profile-button-home {
            background-color: #4CAF50;
        }

        /* Efecto hover para los botones */
        .update-profile-button:hover {
            background-color: #008fbf;
        }

        .profile-button-logout:hover {
            background-color: #d32f2f;
        }

        .profile-button-home:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>

    <!-- Contenedor del perfil -->
    <div class="profile-container">
        <h3 class="profile-title">Mi Perfil</h3>
        
        <!-- Imagen de perfil -->
        <div class="box-1-dp">
            <img src="./img/profile.png" alt="Imagen de perfil" class="my-profile-png"/>
        </div>

        <!-- Información del usuario -->
        <div class="box-1">
            <h4 class="attribute-of-profile">Usuario</h4>
            <p><?php echo $user_data['username']; ?></p>
        </div>
        
        <div class="box-1">
            <h4 class="attribute-of-profile">Correo Electrónico</h4>
            <p><?php echo $user_data['email']; ?></p>
        </div>
        
        <!-- Botón de actualizar perfil -->
        <div class="box-1">
            <input type="submit" class="update-profile-button" value="Actualizar Perfil">
        </div>
        
        <!-- Botón de cerrar sesión -->
        <div class="box-1">
            <input type="submit" class="profile-button-logout" value="Cerrar Sesión" onclick="logout()">
        </div>

        <!-- Botón para regresar a la página principal -->
        <div class="box-1">
            <a href="booking.php">
                <input type="button" class="profile-button-home" value="Página Principal">
            </a>
        </div>
    </div>

    <!-- JavaScript para el botón de cerrar sesión -->
    <script>
        function logout() {
            // Aquí puedes agregar la lógica de cierre de sesión
            window.location.href = "logout.php"; // Asegúrate de tener un archivo logout.php para manejar el cierre de sesión
        }
    </script>

</body>
</html>
