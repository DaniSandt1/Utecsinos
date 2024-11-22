    <?php

    session_start();

    // Si existe la sesión de usuario, destrúyela
    if (isset($_SESSION['user_id'])) {
        unset($_SESSION['user_id']);
    }

    // Mensaje de confirmación y redirección a la página principal (index.php)
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Has cerrado sesión exitosamente.');
        window.location.href='index.php';
        </script>");

    // Redundancia en caso de que el script JavaScript no funcione
    header("Location: index.php");
    exit;

    ?>
