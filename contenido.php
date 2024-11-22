<?php
session_start();

function checkLogin() {
    // Verifica si el usuario está autenticado
    if (!isset($_SESSION['user_id'])) {
        // Si no está autenticado, redirige a login.php
        header("Location: login.php");
        exit(); // Asegura que el script se detenga después de la redirección
    }
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Utecsinos</title>
<style> 
         /* Estilo para el header con imagen y desvanecido */
        header {
            background-image: linear-gradient(to top, rgba(0, 191, 254, 1 ), rgba(0, 191, 254, 0.3), rgba(0, 191, 254, 0.1), rgba(0, 191, 254, 0)), url("assets/contenidoheader.jpg");
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
        .header__container {
  padding: 12rem 1rem;
  text-align: right; /* Alinea el contenido a la derecha */
}

.header__container h1, .header__container h4 {
  margin-left: auto; /* Empuja los elementos hacia la derecha */
}

.header__container .btn {
  margin-left: auto; /* Empuja el botón hacia la derecha */
}
.escuchar {
 padding: 10px 20px;
 border: unset;
 border-radius: 15px;
 color: #000000;
 z-index: 1;
 background: #ffffff;
 position: relative;
 font-weight: 1000;
 font-size: 14px;
 -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 transition: all 250ms;
 overflow: hidden;
 }
  .escuchar a {
  text-decoration: none;
  color: inherit; /* Mantiene el color original del botón */
  display: inline-block;
 }
  .escuchar::before {
 content: "";
 position: absolute;
 top: 0;
 left: 0;
 height: 100%;
 width: 0;
 border-radius: 15px;
 background-color: #FE3F00;
 z-index: -1;
 -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 transition: all 250ms
  }

  .escuchar:hover {
 color: #e8e8e8;
  }

  .escuchar:hover::before {
 width: 100%;
 }
      /* Animación de respiración para la imagen del robot */
      .about__image img {
        max-width: 450px;
        margin: auto;
        animation: breathing 3s ease-in-out infinite;
      }

      @keyframes breathing {
        0%, 100% {
          transform: scale(1);
        }
        50% {
          transform: scale(1.05);
        }
      }
      .contact__card {
  max-width: 250px;
  margin: auto;
  aspect-ratio: 1;
  display: grid;
  place-content: center;
  text-align: center;
  border: 1px solid var(--extra-light);
  border-radius: 100%;
  cursor: pointer;
  transition: transform 0.3s, border-color 0.3s;
  color: white; /* Color blanco para el texto */
 }

  .contact__card span, .contact__card h4 {
  color: white; /* Color blanco para el ícono y el texto */
 }

  .contact__card:hover {
  transform: scale(1.1);
  border-color: var(--secondary-color);
 }

  .contact__card:hover span, .contact__card:hover h4 {
  color: var(--secondary-color); /* Color secundario al hacer hover */
 }

      /* Fondo gradiente con sombreado */
      body {
        background: linear-gradient(#00bffe, #004c66);
        transition: background 1.5s ease; /* Transición más lenta */
      }

      /* Sombreado general para reducir el brillo del fondo */
      .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        pointer-events: none;
        z-index: -1;
      }
      .nav__logo a {
  font-size: 3rem; /* Ajusta el tamaño de la fuente aquí */
  font-weight: 800;
  color: #00bffe; /* Color del texto */
  font-family: "New Time", serif; /* Cambia a una fuente atractiva */
  text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3); /* Sombra para hacer que el texto resalte */
 }
 /* === removing default button style ===*/
  .button {
  margin: 0;
  height: auto;
  background: transparent;
  padding: 0;
  border: none;
  cursor: pointer;
 }

  /* button styling */
  .button {
  --border-right: 6px;
  --text-stroke-color: rgba(255,255,255,0.6);
  --animation-color: #00bffe;
  --fs-size: 2em;
  letter-spacing: 3px;
  text-decoration: none;
  font-size: var(--fs-size);
  font-family: "Arial";
  position: relative;
  text-transform: uppercase;
  color: transparent;
  -webkit-text-stroke: 1px var(--text-stroke-color);
 }
  /* this is the text, when you hover on button */
  .hover-text {
  position: absolute;
  box-sizing: border-box;
  content: attr(data-text);
  color: var(--animation-color);
  width: 0%;
  inset: 0;
  border-right: var(--border-right) solid var(--animation-color);
  overflow: hidden;
  transition: 0.5s;
  -webkit-text-stroke: 1px var(--animation-color);
 }
 /* hover */
  .button:hover .hover-text {
  width: 100%;
  filter: drop-shadow(0 0 23px var(--animation-color))
 }
</style>
  </head>
  <body>
  <script>
      // JavaScript para cambiar el fondo gradiente al hacer scroll
      const colors = ["#4cd2ff", "#19c6ff", "#00bffe", "#0085b2", "#005f7f", "#0085b2"];
      const sections = colors.length;

      window.addEventListener("scroll", () => {
        const scrollPosition = window.scrollY;
        const sectionHeight = document.body.scrollHeight / sections;

        // Determinar el índice de color según la posición de scroll
        const sectionIndex = Math.min(
          sections - 1,
          Math.floor(scrollPosition / sectionHeight)
        );

        // Cambiar el fondo a un gradiente entre el color actual y el siguiente
        document.body.style.background = linear-gradient(${colors[sectionIndex]}, ${colors[(sectionIndex + 1) % colors.length]});
      });
    </script>
<header id="home">
  <nav>
        <div class="nav__bar">
        <div class="nav__logo">
    <button class="button" data-text="UTECSINOS">
        <span class="actual-text">&nbsp;UTECSINOS&nbsp;</span>
        <span aria-hidden="true" class="hover-text">&nbsp;UTECSINOS&nbsp;</span>
    </button>
</div>
          <ul class="nav__links">
            <li class="link"><a href="#home">Inicio</a></li>
            <li class="link"><a href="allvideo.php">Audiolibros</a></li>
            <li class="link"><a href="signup.php">Únete</a></li>
            <li class="link search">
              <span><i class="ri-search-line"></i></span>
            </li>
          </ul>
        </div>
      </nav>
      <div class="section__container header__container">
        <h1>Explora Recursos para tu Aprendizaje</h1>
        <h4>En esta sección encontrarás recursos académicos esenciales para tus estudios en UTEC, organizados por categorías. Accede a documentos de estudio, apuntes de clase y opiniones sobre los cursos y profesores.</h4>
      </div>
    </header>

    <section class="about" id="about">
      <div class="section__container about__container">
        <div class="about__content">
          <h2 class="section__header">Acerca de Nosotros</h2>
          <p class="section__subheader">
            Nuestra misión es facilitar el aprendizaje colaborativo en UTEC, permitiendo a los estudiantes compartir recursos, participar en foros de discusión y acceder a audiolibros académicos. Este espacio fue diseñado para promover el apoyo mutuo y el crecimiento académico.
          </p>
          <div class="about__flex">
            <div class="about__card">
              <h4>268</h4>
              <p>Recursos</p>
            </div>
            <div class="about__card">
              <h4>176</h4>
              <p>Estudiantes Activos</p>
            </div>
            <div class="about__card">
              <h4>153</h4>
              <p>Debates en Foro</p>
            </div>
          </div>
        </div>
        <div class="about__image">
          <img src="assets/about.jpg" alt="acerca de nosotros" />
        </div>
      </div>
    </section>

    <section class="discover" id="discover">
  <div class="section__container discover__container">
    <h2 class="section__header">Explora los Recursos</h2>
    <p class="section__subheader">Conoce algunos de los temas y materiales disponibles.</p>
    <div class="discover__grid">
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-1.jpg" alt="descubre" />
        </div>
        <div class="discover__card__content">
          <h4>Programación</h4>
          <p>Aprende los conceptos básicos de programación y resuelve problemas con código.</p>
          <a href="contenido.php">
            <button class="escuchar">
              Descubre Más <i class="ri-arrow-right-line"></i>
            </button>
          </a>
        </div>
      </div>
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-2.jpg" alt="descubre" />
        </div>
        <div class="discover__card__content">
          <h4>Inglés Académico</h4>
          <p>Mejora tu comprensión del inglés, la lengua base de la mayoría de los recursos académicos.</p>
          <a href="contenido.php">
            <button class="escuchar">
              Descubre Más <i class="ri-arrow-right-line"></i>
            </button>
          </a>
        </div>
      </div>
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-3.jpg" alt="descubre" />
        </div>
        <div class="discover__card__content">
          <h4>Matemáticas</h4>
          <p>Refuerza tus conocimientos en matemáticas a través de ejercicios prácticos.</p>
          <a href="contenido.php">
            <button class="escuchar">
              Descubre Más <i class="ri-arrow-right-line"></i>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="forums" id="forums">
  <div class="section__container forums__container">
    <h2 class="section__header">Foros de Discusión</h2>
    <p class="section__subheader">Comparte y resuelve dudas con la comunidad estudiantil.</p>
    <div class="discover__grid">
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-4.jpg" alt="foro" />
        </div>
        <div class="discover__card__content">
          <h4>Discusión General</h4>
          <p>Participa en debates sobre temas variados y consulta con tus compañeros.</p>
          <a href="forums.php">
            <button class="escuchar">
              Únete al Foro <i class="ri-arrow-right-line"></i>
            </button>
          </a>
        </div>
      </div>
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-5.jpg" alt="foro" />
        </div>
        <div class="discover__card__content">
          <h4>Proyectos en Grupo</h4>
          <p>Encuentra compañeros para colaborar en proyectos académicos.</p>
          <a href="forums.php">
            <button class="escuchar">
              Únete al Foro <i class="ri-arrow-right-line"></i>
            </button>
          </a>
        </div>
      </div>
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-6.jpg" alt="foro" />
        </div>
        <div class="discover__card__content">
          <h4>Preparación de Exámenes</h4>
          <p>Accede a recursos compartidos para mejorar tu preparación.</p>
          <a href="forums.php">
            <button class="escuchar">
              Únete al Foro <i class="ri-arrow-right-line"></i>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

    <section class="audiobooks" id="audiolibros">
  <div class="section__container audiobooks__container">
    <h2 class="section__header">Audiolibros Académicos</h2>
    <p class="section__subheader">Accede a audiolibros de temas clave para complementar tu aprendizaje.</p>
    <div class="discover__grid">
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-7.jpg" alt="audiolibro" />
        </div>
        <div class="discover__card__content">
          <h4>Introducción a la Física</h4>
          <p>Una guía completa de los principios básicos de física.</p>
          <a href="allvideo.php">
            <button class="escuchar">
              Escuchar <i class="ri-play-line"></i>
            </button>
          </a>
        </div>
      </div>
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-8.jpg" alt="audiolibro" />
        </div>
        <div class="discover__card__content">
          <h4>Historia de la Ingeniería</h4>
          <p>Explora la evolución de la ingeniería a través de los siglos.</p>
          <a href="allvideo.php">
            <button class="escuchar">
              Escuchar <i class="ri-play-line"></i>
            </button>
          </a>
        </div>
      </div>
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-9.jpg" alt="audiolibro" />
        </div>
        <div class="discover__card__content">
          <h4>Desarrollo Personal</h4>
          <p>Mejora tus habilidades de gestión del tiempo y productividad.</p>
          <a href="allvideo.php">
            <button class="escuchar">
              Escuchar <i class="ri-play-line"></i>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

  </div>
</section>


    <section class="footer">
      <div class="section__container footer__container">
        <h4>Utecsinos</h4>
        <div class="footer__socials">
          <span><a href="#"><i class="ri-facebook-fill"></i></a></span>
          <span><a href="#"><i class="ri-instagram-fill"></i></a></span>
          <span><a href="#"><i class="ri-twitter-fill"></i></a></span>
          <span><a href="#"><i class="ri-linkedin-fill"></i></a></span>
        </div>
        <p>
          Un espacio colaborativo para el desarrollo académico de los estudiantes de UTEC.
        </p>
      </div>
      <div class="footer__bar">
        Copyright © 2024 Utecsinos. Todos los derechos reservados.
      </div>
    </section>

    <script src="main.js"></script>
  </body>