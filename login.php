<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        // Procesa el inicio de sesión
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
            $query = "SELECT * FROM users WHERE username = '$user_name' LIMIT 1";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {
                    // Establece el estado de sesión para el usuario autenticado
                    $_SESSION['user_id'] = $user_data['user_id'];
                    $_SESSION['logged_in'] = true;

                    header("Location: booking.php");
                    exit;
                }
            }
            echo "<script>alert('¡Nombre de usuario o contraseña incorrectos!');</script>";
        }
    }else if (isset($_POST['signup'])) {
      // Procesa la creación de una nueva cuenta
      $user_name = $_POST['signup_user_name'];
      $fname = $_POST['signup_fname'];
      $lname = $_POST['signup_lname'];
      $email = $_POST['signup_email'];
      $password = $_POST['signup_password'];
      $confirm_password = $_POST['signup_cpassword'];
  
      // Validar contraseña segura
      $password_regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
  
      if (!empty($user_name) && !empty($email) && !empty($password) && !empty($fname) && !empty($lname) && !is_numeric($user_name)) {
          // Validar que el correo termine en @utec.edu.pe
          if (!preg_match('/@utec\.edu\.pe$/', $email)) {
              echo "<script>alert('El correo electrónico debe ser una dirección @utec.edu.pe');</script>";
          }
          // Validar la seguridad de la contraseña
          else if (!preg_match($password_regex, $password)) {
              echo "<script>alert('La contraseña debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula, un número y un carácter especial.');</script>";
          }
          // Validar que las contraseñas coincidan
          else if ($password !== $confirm_password) {
              echo "<script>alert('La confirmación de la contraseña no coincide.');</script>";
          } else {
              // Guardar el usuario en la base de datos
              $user_id = random_num(20); // Genera un ID de usuario único
              $query = "INSERT INTO users (user_id, First_Name, Last_Name, username, email, password) VALUES ('$user_id', '$fname', '$lname', '$user_name', '$email', '$password')";
  
              if (mysqli_query($conn, $query)) {
                  echo "<script>alert('Registro exitoso, ahora inicia sesión');</script>";
              } else {
                  echo "<script>alert('Error al registrar. Por favor, intenta de nuevo.');</script>";
              }
          }
      } else {
          echo "<script>alert('Por favor, completa todos los campos');</script>";
      }
  }
  
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Iniciar Sesión</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='login.css'>
    <link rel="stylesheet" type="text/css" href="login.css"/>
    <script src='main.js'></script>
</head>
<style>
 @import url("https://fonts.googleapis.com/css2?family=Lisu+Bosa:wght@600;800&family=Poppins:wght@400;500;600;700&display=swap");

body {
    background-image: linear-gradient(to top, rgba(0, 191, 254, 1), rgba(0, 191, 254, 0.3), rgba(0, 191, 254, 0.1), rgba(0, 191, 254, 0)), 
                      url("assets/2utec.jpg"); /* Asegúrate de que la ruta de la imagen es correcta */
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 100vh;
    font-family: "Poppins", sans-serif; /* Fuente general */
}

.wrapper {
  --input-focus: #2d8cf0;
  --font-color: #323232;
  --font-color-sub: #666;
  --bg-color: #fff;
  --bg-color-alt: #666;
  --main-color: #323232;
}

.title {
  font-family: "Lisu Bosa", serif; /* Usa la misma fuente para títulos */
  margin: 20px 0;
  font-size: 25px;
  font-weight: 900;
  text-align: center;
  color: var(--main-color);
}
/* switch card */
.switch {
  transform: translateY(-250px);
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 30px;
  width: 50px;
  height: 20px;
}
.toggle {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  box-sizing: border-box;
  border-radius: 5px;
  border: 2px solid var(--main-color);
  box-shadow: 4px 4px var(--main-color);
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: var(--bg-color);
  transition: 0.3s;
}

.slider:before {
  box-sizing: border-box;
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  border: 2px solid var(--main-color);
  border-radius: 5px;
  left: -2px;
  bottom: 2px;
  background-color: var(--bg-color);
  box-shadow: 0 3px 0 var(--main-color);
  transition: 0.3s;
}

.toggle:checked + .slider {
  background-color: var(--input-focus);
}

.toggle:checked + .slider:before {
  transform: translateX(30px);
}

.toggle:checked ~ .card-side:before {
  text-decoration: none;
}

.toggle:checked ~ .card-side:after {
  text-decoration: underline;
}

/* card */ 
.flip-card__inner {
  width: 300px;
  height: 400px;
  position: relative;
  background-color: transparent;
  perspective: 1000px;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.toggle:checked ~ .flip-card__inner {
  transform: rotateY(180deg);
}

.flip-card__front, .flip-card__back {
  padding: 20px;
  position: absolute;
  display: flex;
  flex-direction: column;
  justify-content: center;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  background: rgba(211, 211, 211, 0.7);;
  gap: 15px;
  border-radius: 5px;
  border: 2px solid var(--main-color);
  box-shadow: 4px 4px var(--main-color);
}

.flip-card__back {
  width: 100%;
  transform: rotateY(180deg);
}

.flip-card__form {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 15px;
}

.title {
  margin: 20px 0;
  font-size: 25px;
  font-weight: 900;
  text-align: center;
  color: var(--main-color);
}

.flip-card__input {
  width: 250px;
  height: 40px;
  border-radius: 5px;
  border: 2px solid var(--main-color);
  background-color: var(--bg-color);
  box-shadow: 4px 4px var(--main-color);
  font-size: 15px;
  font-weight: 600;
  color: var(--font-color);
  padding: 5px 10px;
  outline: none;
}

.flip-card__input::placeholder {
  color: var(--font-color-sub);
  opacity: 0.8;
}

.flip-card__input:focus {
  border: 2px solid var(--input-focus);
}

.flip-card__btn:active {
  box-shadow: 0px 0px var(--main-color);
  transform: translate(3px, 3px);
}

.flip-card__btn {
  width: 120px;
  height: 40px;
  border-radius: 5px;
  border: 2px solid var(--main-color);
  background-color: var(--bg-color);
  box-shadow: 4px 4px var(--main-color);
  font-size: 17px;
  font-weight: 600;
  color: var(--font-color);
  cursor: pointer;
} 
</style>
<body>
  
<div class="wrapper">
    <div class="card-switch">
        <label class="switch">
           <input type="checkbox" class="toggle">
           <span class="slider"></span>
           <span class="card-side"></span>
           <div class="flip-card__inner">
              <!-- Formulario de Iniciar Sesión -->
              <div class="flip-card__front">
                 <div class="title">Iniciar Sesión</div>
                 <form class="flip-card__form" action="" method="POST">
                    <input class="flip-card__input" name="user_name" placeholder="Usuario" type="text" required>
                    <input class="flip-card__input" name="password" placeholder="Contraseña" type="password" required>
                    <button type="submit" name="login" class="flip-card__btn">¡Vamos!</button>
                 </form>
              </div>
              <!-- Formulario de Crear Cuenta -->
              <div class="flip-card__back">
                 <div class="title">Crear Cuenta</div>
                 <form class="flip-card__form" action="" method="POST">
                    <input class="flip-card__input" name="signup_fname" placeholder="Nombre" type="text" required>
                    <input class="flip-card__input" name="signup_lname" placeholder="Apellido" type="text" required>
                    <input class="flip-card__input" name="signup_user_name" placeholder="Usuario" type="text" required>
                    <input class="flip-card__input" name="signup_email" placeholder="Correo" type="email" required>
                    <input class="flip-card__input" name="signup_password" placeholder="Contraseña" type="password" required>
                    <input class="flip-card__input" name="signup_cpassword" placeholder="Confirmar Contraseña" type="password" required>
                    <button type="submit" name="signup" class="flip-card__btn">Confirmar</button>
                 </form>
              </div>
           </div>
        </label>
    </div>   
</div>
</body>
</html>
