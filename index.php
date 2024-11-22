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
            background-image: linear-gradient(to top, rgba(0, 191, 254, 1 ), rgba(0, 191, 254, 0.3), rgba(0, 191, 254, 0.1), rgba(0, 191, 254, 0)), url("assets/header.jpg");
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
            <li class="link"><a href="#about">Acerca de</a></li>
            <li class="link"><a href="#discover">Descubre</a></li>
            <li class="link"><a href="#contact">Contacto</a></li>
            <li class="link"><a href=login.php>Únete</a></li>     
          </ul>
        </div>
      </nav>
      <div class="section__container header__container">
        <h1>Tu espacio para aprender y compartir en UTEC</h1>
        <h4>Descubre y colabora con tus compañeros</h4>
        <button class="escuchar"><a href="login.php"><font color="black">Iniciar Sesión</font></a><i class="ri-arrow-right-line"></i></button>      </div>
    </header>

<section class="about" id="about">
  <div class="section__container about__container">
    <div class="about__content">
      <h2 class="section__header">Nuestra Misión</h2>
      <p class="section__subheader" style="margin-bottom: 2rem;">
        En Utecsinos, creemos en el poder del aprendizaje colaborativo. Nos comprometemos a ofrecerte un espacio donde puedas compartir recursos, participar en debates y colaborar con tus compañeros para desarrollar tus habilidades y conocimientos.
      </p>
      <button class="escuchar">
        Leer Más <i class="ri-arrow-right-line"></i>
      </button>
    </div>
    <div class="about__image">
      <img src="assets/about.jpg" alt="acerca de nosotros" />
    </div>
  </div>
</section>
<section class="about about--reverse" id="about">
  <div class="section__container about__container">
    <div class="about__content">
      <h2 class="section__header"style="margin-bottom: 2rem; margin-right: -15px; padding-right: 20px; text-align: right;">Explora y Colabora</h2>
      <p class="section__subheader" style="margin-bottom: 2rem; margin-right: -15px; padding-right: 20px; text-align: right;">
      Nuestra plataforma está organizada para que encuentres de manera fácil y rápida los recursos que necesitas para tu estudio. Ya sea que estés buscando material para reforzar una asignatura, ejercicios prácticos o simplemente desees colaborar en proyectos académicos, Utecsinos es el lugar ideal para ti.</p>
      <button class="escuchar">
        Leer Más <i class="ri-arrow-right-line"></i>
      </button>
    </div>
    <div class="about__image">
      <img src="assets/indexabout.jpg" alt="acerca de nosotros" />
    </div>
  </div>
</section>

    <section class="discover" id="discover">
  <div class="section__container discover__container">
    <h2 class="section__header">Recursos Destacados</h2>
    <div class="discover__grid">
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-1.jpg" alt="descubre" />
        </div>
        <div class="discover__card__content">
        <h4 style="color: #ffffff;">Audiolibros Académicos</h4>          
        <p>Escucha contenido educativo en formato de audiolibros, perfecto para estudiar mientras realizas otras actividades.</p>
          <a href="login.php">
            <button class="escuchar">
            Escuchar 🎧 </i>
            </button>
          </a>
        </div>
      </div>
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-2.jpg" alt="descubre" />
        </div>
        <div class="discover__card__content">
        <h4 style="color: #ffffff;">Apuntes y Resúmenes</h4>
          <p>Encuentra resúmenes concisos de temas clave, diseñados para ayudarte a estudiar de manera más eficiente.</p>
          <a href="login.php">
            <button class="escuchar">
              Encontrar 📝</i>
            </button>
          </a>
        </div>
      </div>
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-3.jpg" alt="descubre" />
        </div>
        <div class="discover__card__content">
        <h4 style="color: #ffffff;">Guías <br>Interactivas</h4>
          <p>Sumérgete en guías y videos interactivos que hacen más accesibles los temas complejos.</p>
          <a href="login.php">
            <button class="escuchar">
              Mirar ▶️</i>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
    <section class="audiobooks" id="audiolibros">
  <div class="section__container audiobooks__container">
    <h2 class="section__header">Comunidad de Aprendizaje</h2>
    <p class="section__subheader">Utecsinos no es solo un repositorio de recursos; es una comunidad de aprendizaje activa. Aquí puedes:</p>
    <div class="discover__grid">
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-7.jpg" alt="audiolibro" />
        </div>
        <div class="discover__card__content">
        <h4 style="color: #ffffff;">Conectarte con otros estudiantes</h4>
          <p>Únete a foros de discusión donde podrás resolver dudas y compartir conocimientos con tus compañeros.</p>
          <a href="login.php">
            <button class="escuchar">
             Unirse 🗣️</i>
            </button>
          </a>
        </div>
      </div>
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-8.jpg" alt="audiolibro" />
        </div>
        <div class="discover__card__content">
        <h4 style="color: #ffffff;">Participar en Proyectos Colaborativos</h4>
          <p>Forma parte de proyectos académicos en equipo y refuerza tus habilidades en entornos de colaboración.</p>
          <a href="login.php">
            <button class="escuchar">
              Participar 🤝</i>
            </button>
          </a>
        </div>
      </div>
      <div class="discover__card">
        <div class="discover__image">
          <img src="assets/discover-9.jpg" alt="audiolibro" />
        </div>
        <div class="discover__card__content">
        <h4 style="color: #ffffff;">Contribuir a la Plataforma</h4>
          <p>Si tienes apuntes, resúmenes o recursos que puedan ayudar a otros, súbelos y comparte tu conocimiento.</p>
          <a href="login.php">
            <button class="escuchar">
              Contribuir 🫂 </i>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

    <section class="contact" id="contact">
    <div class="section__container contact__container">
    <div class="contact__col">
      <h4>Únete a Utecsinos Hoy</h4>
      <p>No pierdas la oportunidad de mejorar tu experiencia académica en UTEC. En Utecsinos, el conocimiento está al alcance de todos, y tu participación puede marcar la diferencia.</p>
    </div>
    <div class="contact__col">
      <div class="contact__card">
        <span><i class="ri-phone-line"></i></span>
        <h4>Teléfono</h4>
        <h5>+51 963951002</h5>
      </div>
    </div>
    <div class="contact__col">
  <a href="https://mail.google.com/mail/?view=cm&fs=1&to=daniel.sandoval.t@utec.edu.pe&su=Consulta%20desde%20Utecsinos&body=Escribe%20aquí%20tu%20consulta" target="_blank">
    <div class="contact__card">
      <span><i class="ri-mail-line"></i></span>
      <h4>Envíanos una consulta</h4>
    </div>
  </a>
</div>

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
          <li class="footer__link"><a href="#home">Inicio</a></li>
          <li class="footer__link"><a href="#discover">Recursos</a></li>
          <li class="footer__link"><a href="#audiolibros">Comunidad</a></li>
          <li class="footer__link"><a href="#contact">Contacto</a></li>
        </ul>
      </div>
      <div class="footer__bar">
        Copyright © 2024 Utecsinos. Todos los derechos reservados.
      </div>
    </section>

    <script src="main.js"></script>
  </body> 