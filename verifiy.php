<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $verification_code = $_POST['verification_code'];

    $query = "SELECT * FROM users WHERE email = '$email' AND verification_code = '$verification_code' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $query = "UPDATE users SET is_verified = 1 WHERE email = '$email'";
        mysqli_query($conn, $query);
        echo "<script>alert('Verificación exitosa. Ahora puedes iniciar sesión.');</script>";
        header("Location: login.php");
    } else {
        echo "<script>alert('Código incorrecto.');</script>";
    }
}
?>
<form action="verify.php" method="POST">
    <input type="email" name="email" placeholder="Correo electrónico" required>
    <input type="text" name="verification_code" placeholder="Código de verificación" required>
    <button type="submit">Verificar</button>
</form>
