<?php 
session_start();

    include("connection.php");
    include("function.php");

    $user_data = check_login($conn);

?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/booking.css'>
    <script src='main.js'></script>
    <style>
redireccionar {
 position: relative;
 display: inline-block;
 cursor: pointer;
 outline: none;
 border: 0;
 vertical-align: middle;
 text-decoration: none;
 background: transparent;
 padding: 0;
 font-size: inherit;
 font-family: inherit;
  margin-top: 20px;
}

redireccionar.learn-more {
 width: 12rem;
 height: auto;
}

redireccionar.learn-more .circle {
 transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
 position: relative;
 display: block;
 margin: 0;
 width: 3rem;
 height: 3rem;
 background: #282936;
 border-radius: 1.625rem;
}

redireccionar.learn-more .circle .icon {
 transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
 position: absolute;
 top: 0;
 bottom: 0;
 margin: auto;
 background: #fff;
}

redireccionar.learn-more .circle .icon.arrow {
 transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
 left: 0.625rem;
 width: 1.125rem;
 height: 0.125rem;
 background: none;
}

redireccionar.learn-more .circle .icon.arrow::before {
 position: absolute;
 content: "";
 top: -0.29rem;
 right: 0.0625rem;
 width: 0.625rem;
 height: 0.625rem;
 border-top: 0.125rem solid #fff;
 border-right: 0.125rem solid #fff;
 transform: rotate(45deg);
}

redireccionar.learn-more .button-text {
 transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
 position: absolute;
 top: 0;
 left: 0;
 right: 0;
 bottom: 0;
 padding: 0.75rem 0;
 margin: 0 0 0 1.85rem;
 color: #282936;
 font-weight: 700;
 line-height: 1.6;
 text-align: center;
 text-transform: uppercase;
}

redireccionar:hover .circle {
 width: 100%;
}

redireccionar:hover .circle .icon.arrow {
 background: #fff;
 transform: translate(1rem, 0);
}

redireccionar:hover .button-text {
 color: #fff;
}
.container {
  position: fixed; 
  top: 0;
  left: 0;
  width: 100vw; 
  height: 100vh; 
  z-index: -1; 
  --s: 75px; /* Tamaño ajustado */
  --c1: #f7855f;
  --c2: #00bffe;
  --c3: #dadee2;

  --_c: 75%, var(--c3) 52.72deg, #0000 0;
  --_g1: conic-gradient(from -116.36deg at 25% var(--_c));
  --_g2: conic-gradient(from 63.43deg at 75% var(--_c));
  background: var(--_g1), var(--_g1) calc(3 * var(--s)) calc(var(--s) / 2),
    var(--_g2), var(--_g2) calc(3 * var(--s)) calc(var(--s) / 2),
    conic-gradient(
      var(--c2) 63.43deg,
      var(--c1) 0 116.36deg,
      var(--c2) 0 180deg,
      var(--c1) 0 243.43deg,
      var(--c2) 0 296.15deg,
      var(--c1) 0
    );
  background-size: calc(2 * var(--s)) var(--s);
  animation: cloudMovement 50s linear infinite;
}
@keyframes cloudMovement {
  0% {
    background-position: 0% 0%;
  }
  50% {
    background-position: 100% 100%;
  }
  100% {
    background-position: 0% 0%;
  }
}
.container::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.3); /* Sombreado negro con transparencia */
  z-index: -1; /* Coloca esta capa sobre el fondo pero detrás del contenido */
  pointer-events: none; /* Ignora eventos para no bloquear interacciones */
}

.category_card {
  position: relative;
  top: 10%; /* Centrando verticalmente */
  left: 50%;
  width: 1300px;
  height: 650px;
  transform: translate(-50%, -65%);
  border-radius: 4px;
  background: rgba(255, 255, 255, 0.9); /* Color con opacidad */
  display: flex;
  gap: 10px;
  padding: 0.4em;
  margin-bottom: -400px;
}

.category_card p {
  height: 100%;
  flex: 1;
  overflow: hidden;
  cursor: pointer;
  border-radius: 4px;
  transition: all 0.5s ease-in-out;
  background:rgba(255, 255, 255, 0.4);
  border: 4px solid #000000;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}

.category_card p:hover {
  flex: 4;
background: rgba(255, 255, 255, 0.4); /* Blanco con 80% de opacidad */
}
.category_card p .closed_text {
  position: absolute;
  transform: rotate(-90deg);
  transition: opacity 0.5s ease-in-out;
  color: #000000;
  font-size: 2rem;
  font-weight: 1;
}
.category_card p .open_text {
  display: none;
  font-size: 1.5rem;
  font-weight: 1;
  text-transform: none;
  text-align: center;
  color: #000000;
  animation: fadeIn 1.2s ease-in-out;
}
.category_card p:hover .closed_text {
  opacity: 0;
  visibility: hidden;
}.category_card p:hover .open_text {
  display: block;
}

/* Animación de entrada */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.category_card p img {
  width: 150px;
  height: 90px;
  margin-right: 10px;
  border-radius: 5px;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
  opacity: 0; /* Oculta inicialmente */
  animation: none; /* Sin animación inicialmente */
}

.category_card p:hover img {
  animation: fadeIn 0.5s ease-in-out forwards; /* Activa el efecto fadeIn */
}

.category_card p span {
  min-width: 14em;
  padding: 0.5em;
  text-align: center;
  transform: rotate(-90deg); /* Rota el texto verticalmente */
  transition: all 0.5s;
  text-transform: none;
  color: #000000;
  letter-spacing: 0.1em;
}

.category_card p:hover span {
  transform: rotate(0); /* Rota el texto horizontalmente */
}
         /* Estilo para el header con imagen y desvanecido */
        header {
            background-image: url("assets/sheader.jpg");
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
        .about--reverse .about__container {
  display: flex;
  text-align: right;
  margin-right: 20px; /* Ajusta la cantidad de sangría a la derecha */
  padding-right: 20px; /* Añade más espacio a la derecha del texto */  
  margin-left: 0px;
  flex-direction: row-reverse; /* Invierte el orden de los elementos */
  gap: 2rem;
}

@media (max-width: 768px) {
  .about--reverse .about__container {
    flex-direction: column;
  }
}
  .escuchar {
 padding: 10px 20px;
 border: unset;
 border-radius: 15px;
 color: #000000;
 z-index: 1;
 background: rgba(255, 255, 255, 0.9);
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
        background: linear-gradient(rgba(255, 255, 255, 0.9));
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
        body{
            background-image: url("./assets/blog-4.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0%;
            background-attachment: fixed; 
           }
           header {
            background-image: url("assets/scontenidoheader.jpg");
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
    <div class="container"></div>
</head>
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
            <li class="link"><a href="misesion.php">Mi Sesion</a></li>
          </ul>
    </header>
    <body>

<div class="category_card">
<p>
<span class="closed_text">COMUNIDAD</span>
</a>
  <span class="open_text">
  <a href="forums.php" style="text-decoration: none; color: inherit;">
    <strong style="font-size: 35px; display: block; margin-bottom: 20px;">COMUNIDAD</strong>
    <span class="open_text" style="font-size: 15px; display: flex; align-items: center; margin-bottom: 10px; line-height: 1.8;">
      <img src="assets/SU.jpg" alt="guía de estudio" style="max-width: 180px; height: 110px; border-radius: 5px;">
      <span style="display: flex; flex-direction: column;">
        <strong style="font-size: 16px;">Ganador de la Semana Universitaria</strong>
        <span style="font-size: 13px;">Comparte tus opiniones sobre el equipo que ganó durante la competencia de la Semana Universitaria. ¿Fue justo?</span>
     </span>
    </span>
    
    <span class="open_text" style="font-size: 15px; display: flex; align-items: center; margin-bottom: 10px; line-height: 1.8;">
      <img src="assets/Foro.jpg" alt="biblioteca digital" style="width: 180px; height: 110px; border-radius: 5px;">
      <span style="display: flex; flex-direction: column;">
        <strong style="font-size: 16px;">Foro de Innovación Tecnológica</strong>
        <span style="font-size: 13px;">Explora las propuestas más recientes de estudiantes sobre inteligencia artificial, energías renovables y automatización.</span>
      </span>
    </span>
    
    <span class="open_text" style="font-size: 15px; display: flex; align-items: center; margin-bottom: 10px; line-height: 1.8;">
    <img src="assets/voluntario.jpg" alt="tutoriales online" style="max-width: 180px; height: 110px; border-radius: 5px;">
    <span style="display: flex; flex-direction: column;">
        <strong style="font-size: 16px;">Iniciativas de Voluntariado Universitario</strong>
        <span style="font-size: 13px;">Descubre cómo los estudiantes están marcando la diferencia con proyectos sociales y actividades de impacto en la comunidad local. Comparte tus experiencias y únete al cambio.</span>
      </span>
      </span>
      </a>  

      <p>
  <span class="closed_text">RECURSOS</span>
  <span class="open_text">
  <a href="contenido.php" style="text-decoration: none; color: inherit;">
    <strong style="font-size: 35px; display: block; margin-bottom: 20px;">RECURSOS</strong>
    
    <span class="open_text" style="font-size: 15px; display: flex; align-items: center; margin-bottom: 10px; line-height: 1.8;">
      <img src="assets/guia.jpg" alt="guía de estudio" style="width: 180px; height: 110px; border-radius: 5px;">
      <span style="display: flex; flex-direction: column;">
        <strong style="font-size: 16px;">Guía de estudio para exámenes finales</strong>
        <span style="font-size: 13px;">Descarga esta guía con resúmenes y consejos prácticos para prepararte eficientemente en tus exámenes finales.</span>
      </span>
    </span>
    
    <span class="open_text" style="font-size: 15px; display: flex; align-items: center; margin-bottom: 10px; line-height: 1.8;">
      <img src="assets/biblo.jpg" alt="biblioteca digital" style="width: 180px; height: 110px; border-radius: 5px;">
      <span style="display: flex; flex-direction: column;">
        <strong style="font-size: 16px;">Biblioteca digital UTEC</strong>
        <span style="font-size: 13px;">Accede a miles de libros electrónicos y artículos académicos desde cualquier lugar con tu cuenta universitaria.</span>
      </span>
    </span>
    
    <span class="open_text" style="font-size: 15px; display: flex; align-items: center; margin-bottom: 10px; line-height: 1.8;">
      <img src="assets/tuto.jpg" alt="tutoriales online" style="width: 180px; height: 110px; border-radius: 5px;">
      <span style="display: flex; flex-direction: column;">
        <strong style="font-size: 16px;">Tutoriales online de cálculo</strong>
        <span style="font-size: 13px;">Mira los tutoriales de cálculo avanzado preparados por profesores para reforzar tus conocimientos antes de los exámenes.</span>
      </span>
    </span>
  </span>
  </a>  

<p>

<span class="closed_text">AUDIOLIBROS</span>
  <span class="open_text">
  <a href="allvideo.php" style="text-decoration: none; color: inherit;">
    <strong style="font-size: 35px; display: block; margin-bottom: 20px;">AUDIOLIBROS</strong>
    
    <span class="open_text" style="font-size: 15px; display: flex; align-items: center; margin-bottom: 10px; line-height: 1.8;">
      <img src="assets/historia.jpg" alt="audiolibro historia" style="width: 180px; height: 110px; border-radius: 5px;">
      <span style="display: flex; flex-direction: column;">
        <strong style="font-size: 16px;">Historia del siglo XXI</strong>
        <span style="font-size: 13px;">Explora los eventos clave del siglo pasado en este fascinante audiolibro narrado por expertos en historia.</span>
      </span>
    </span>
    
    <span class="open_text" style="font-size: 15px; display: flex; align-items: center; margin-bottom: 10px; line-height: 1.8;">
      <img src="assets/astro.jpg" alt="audiolibro ciencia" style="width: 180px; height: 110px; border-radius: 5px;">
      <span style="display: flex; flex-direction: column;">
        <strong style="font-size: 16px;">Introducción a la astrofísica</strong>
        <span style="font-size: 13px;">Entiende los fundamentos del universo con este audiolibro lleno de datos y explicaciones claras.</span>
      </span>
    </span>
    
    <span class="open_text" style="font-size: 15px; display: flex; align-items: center; margin-bottom: 10px; line-height: 1.8;">
      <img src="assets/motiv.jpg" alt="audiolibro motivacional" style="width: 180px; height: 110px; border-radius: 5px;">
      <span style="display: flex; flex-direction: column;">
        <strong style="font-size: 16px;">El arte de la motivación</strong>
        <span style="font-size: 13px;">Un audiolibro ideal para aquellos que buscan mejorar su enfoque y productividad personal.</span>
      </span>
    </span>
    
  </span>
  </a>  

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
        <ul class="footer__nav">
          <li class="footer__link"><a href=forums.php>Comunidad</a></li>
          <li class="footer__link"><a href=contenido.php>Recursos</a></li>
          <li class="footer__link"><a href=allvideo.php>Audiolibros</a></li>
        </ul>
      </div>
      <div class="footer__bar">
        Copyright © 2024 Utecsinos. Todos los derechos reservados.
      </div>
    </section>

    <script src="main.js"></script>
  </body> 