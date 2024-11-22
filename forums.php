  <?php
  session_start();

  function checkLogin() {
      // Verifica si el usuario está autenticado
      if (!isset($_SESSION['user_id'])) {
          // Si no está autenticado, redirige a login.php
          header("login.php");
          exit(); // Asegura que el script se detenga después de la redirección
      }
  }
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
    .image-slider {
    position: absolute;
    width: 100%;
    height: 500px; /* Ajusta la altura como prefieras */
    top: 85px;
    overflow: hidden;
    margin-top: 1rem; /* Añade espacio si es necesario */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  }

  .image-slider .slides {
    position: relative;
    width: 100%;
    height: 100%;
  }

  .image-slider .slide {
    display: none;
    width: 100%;
    height: 100%;
    position: relative;
  }

  .image-slider .slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .image-slider .caption {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px 20px;
    font-size: 1.2rem;
    border-radius: 5px;
    text-align: center;
    opacity: 0.8;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
  }

  /* Botones de control */
  .image-slider .prev,
  .image-slider .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 2rem;
    cursor: pointer;
    z-index: 10;
    border-radius: 50%;
    transition: background-color 0.3s;
  }

  .image-slider .prev:hover,
  .image-slider .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }

  .image-slider .prev {
    left: 15px;
  }

  .image-slider .next {
    right: 15px;
  }

  /* Indicadores */
  .indicators {
    position: absolute;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
  }

  .indicators .indicator {
    width: 15px;
    height: 15px;
    background: rgba(255, 255, 255, 0.6);
    border-radius: 50%;
    cursor: pointer;
    transition: background 0.3s;
  }

  .indicators .indicator.active {
    background: #00bffe;
  }

  .indicators .indicator:hover {
    background: rgba(255, 255, 255, 1);
  }

    .fondo {
    position: fixed; /* Fija el fondo en su posición */
    top: 0;
    left: 0;
    width: 100vw; /* Asegura que cubra el ancho completo */
    height: 100vh; /* Asegura que cubra la altura completa */
    z-index: -1; /* Lo envía al fondo */
    --s: 65px; /* control the size*/
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
  animation: cloudMovement 50s linear infinite; /* Añade movimiento de nubes */}
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
  /* Contenedor para cambiar entre categorías */
  .category-section {
    display: flex; /* Usa flexbox para alinear elementos en fila */
    justify-content: center; /* Centra los botones horizontalmente */
    align-items: center; /* Asegura alineación vertical */
    gap: 1rem; /* Espaciado entre los botones */
    margin-top: 2rem; /* Espaciado superior */
    margin-bottom: 2rem; /* Espaciado inferior */
}
.category-button {
    padding: 12px 25px;
    background-color: #00bffe;
    color: white;
    font-size: 1rem;
    font-weight: bold;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
    flex-shrink: 0; /* Evita que los botones se reduzcan */
}
  .category-button:hover {
      background-color: #009ace;
  }

  /* Cuadro de contenido transparente */
  .category-container {
      background: rgba(255, 255, 255, 0.4);
      border-radius: 10px;
      padding: 1.5rem;
      margin: 1rem auto;
      margin-top: 80px; /* Ajusta la posición más arriba */
      margin-bottom: 400px; /* Añade espacio debajo del cuadro */
      width: 80%;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  }
  .category-container table tbody tr td {
      color: black; /* Cambia el color del texto a negro */
  }
  .category-container table thead th {
      color: black; /* Cambia el color de los encabezados a negro */
  }

  /* Tablas de Foro y Anuncios */
  table {
      width: 100%;
      border-collapse: collapse;
      margin: 1rem 0;
      background-color: #ffffff;
      border-radius: 5px;
      overflow: hidden;
      font-size: 0.9rem;
  }

  table thead {
      background-color: #00bffe;
      color: white;
      text-transform: uppercase;
  }

  table th, table td {
      padding: 10px;
      text-align: left;
  }

  table tbody tr:nth-child(even) {
      background-color: rgba(0, 191, 254, 0.1);
  }

  table tbody tr:hover {
      background-color: rgba(0, 191, 254, 0.3);
  }

  /* Calendario */
  .calendar-container {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 10px;
      margin-top: 1rem;
  }

  .calendar-day {
    background-color: rgba(0, 191, 254, 0.9); /* Cambia el color de los días del calendario */    border-radius: 5px;
      padding: 15px;
      text-align: center;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s, background-color 0.3s;
  }

  .calendar-day:hover {
      transform: scale(1.1);
      background-color: #00bffe;
      color: white;
  }

  .calendar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
  }

  .calendar-header button {
      padding: 10px 15px;
      background-color: #004c66;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
  }

  .calendar-header button:hover {
      background-color: #003349;
  }

  .fondo::after {
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
    top:50%;
    right: -180px;
    width: 1000px;
    height: 650px;
    border-radius: 4px;
    background: rgba(0, 191, 254, 0.9); /* Color con opacidad */
    display: flex;
    gap: 10px;
    padding: 0.4em;
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
          .about--reverse .about__fondo {
    display: flex;
    text-align: right;
    margin-right: 20px; /* Ajusta la cantidad de sangría a la derecha */
    padding-right: 20px; /* Añade más espacio a la derecha del texto */  
    margin-left: 0px;
    flex-direction: row-reverse; /* Invierte el orden de los elementos */
    gap: 2rem;
  }

  @media (max-width: 768px) {
    .about--reverse .about__fondo {
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
    .buttonlogo {
    margin: 0;
    height: auto;
    background: transparent;
    padding: 0;
    border: none;
    cursor: pointer;
  }

    /* button styling */
    .buttonlogo {
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
    .buttonlogo:hover .hover-text {
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
          .section__container {
            position: relative;

            top: 10%; /* Centrando verticalmente */
            left: 50%;
    transform: translate(-56%, -85%);

    width: 1300px;
    border-radius: 4px;
              margin: 0 auto;
              padding: 2rem;
              margin-bottom: -600px; /* Mueve el contenedor 50px hacia abajo */
          }
          .community__grid {
              display: grid;
              grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
              gap: 1.5rem;
              margin-top: 2rem;
          }
          .community__card {
              background: rgba(0, 191, 254, 0.9);
              border-radius: 10px;
              padding: 1.5rem;
              box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
              transition: transform 0.3s;
          }
          .community__card:hover {
              transform: scale(1.05);
          }

          .community__card h4 {
              color: #fff;
              margin-bottom: 1rem;
          }
          .community__card p {
              color: 
          }
              .button {
              margin-top: 1rem;
              padding: 0.6rem 1.2rem;
              background: #004c66;
              color: #fff;
              border: none;
              border-radius: 5px;
              text-transform: uppercase;
              font-weight: bold;
              cursor: pointer;
              transition: background 0.3s;
          }
          .button:hover {
              background: #003349;
          }   
          
      </style>
      <div class="fondo"></div>
  </head><header id="home">
        <nav>
          <div class="nav__bar">
          <div class="nav__logo">
      <button class="buttonlogo" data-text="UTECSINOS">
          <span class="actual-text">&nbsp;UTECSINOS&nbsp;</span>
          <span aria-hidden="true" class="hover-text">&nbsp;UTECSINOS&nbsp;</span>
      </button>
  </div>
            <ul class="nav__links">
            <li class="link"><a href="booking.php">Inicio</a></li>
              <li class="link"><a href="misesion.php">Mi Sesion</a></li>
            </ul>
      </header>
  <body>
    <!-- Image Slider -->
    <div class="image-slider">
      <div class="slides">
        <div class="slide">
          <img src="assets/tablon1.png" alt="Anuncio 1">
        </div>
        <div class="slide">
          <img src="assets/tablon2.png" alt="Anuncio 2">
        </div>
        <div class="slide">
          <img src="assets/tablon3.png" alt="Anuncio 3">
        </div>
        <div class="slide">
          <img src="assets/tablon4.png" alt="Anuncio 4">
        </div>
        <div class="slide">
          <img src="assets/tablon5.png" alt="Anuncio 5">
        </div>
      </div>
      <!-- Botones de control -->
      <button class="prev" onclick="prevSlide()">&#10094;</button>
      <button class="next" onclick="nextSlide()">&#10095;</button>
      <!-- Indicadores -->
      <div class="indicators"></div>
    </div>

    <div class="category-section">
    <button class="category-button" onclick="switchCategory(0)">Foro</button>
    <button class="category-button" onclick="switchCategory(1)">Anuncios</button>
    <button class="category-button" onclick="switchCategory(2)">Calendario</button>
  </div>

    
    <script>
      function crearForo() {
    alert("Función para crear un nuevo foro en construcción...");
    // Aquí podrías añadir lógica para mostrar un formulario modal o redirigir a otra página
}

      // Variables para el slider
      let currentSlide = 0;
      const slides = document.querySelectorAll('.image-slider .slide');
      const indicatorsContainer = document.querySelector('.indicators');

      // Crear indicadores dinámicos
      slides.forEach((_, index) => {
        const indicator = document.createElement('span');
        indicator.classList.add('indicator');
        indicator.setAttribute('data-slide', index);
        indicator.onclick = () => setSlide(index);
        indicatorsContainer.appendChild(indicator);
      });

      const indicators = document.querySelectorAll('.indicator');
      const totalSlides = slides.length;

      // Función para mostrar la slide actual
      function showSlide(index) {
        slides.forEach((slide, i) => {
          slide.style.display = i === index ? 'block' : 'none';
        });
        indicators.forEach((indicator, i) => {
          indicator.classList.toggle('active', i === index);
        });
      }

      // Mostrar la primera slide al cargar
      showSlide(currentSlide);

      // Avanzar al siguiente slide
      function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
      }

      // Volver al slide anterior
      function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
      }

      // Cambiar a una slide específica
      function setSlide(index) {
        currentSlide = index;
        showSlide(currentSlide);
      }

      // Cambio automático de slides
      setInterval(nextSlide, 5000); // Cambiar cada 5 segundos
    </script>
      <!-- Cuadro blanco transparente -->
      <div class="category-container" id="category-content">
          <!-- Aquí se cargarán dinámicamente las categorías -->
      </div>
      <script>
          let currentCategory = 0;

          const categories = [
              // Categoría 1: Foro
              `
    <h2 style="display: flex; justify-content: space-between; align-items: center;">
        Foro de Discusión Académica
        <button class="category-button" style="font-size: 0.9rem; padding: 10px;" onclick="crearForo()">
            Crear Foro
        </button>
    </h2>
    <table>
        <thead>
            <tr>
                <th>Tópico</th>
                <th>Vistas</th>
                <th>Respuestas</th>
            </tr>
        </thead>
        <tbody>
            <!-- Temas anclados -->
            <tr style="background-color: #ffd700;">
                <td><strong>📌 Tema Anclado: Introducción a la Discusión Académica</strong></td>
                <td>1,200</td>
                <td>
                    85 
                    <i class="ri-chat-3-line" title="Responder" style="margin-left: 10px; cursor: pointer;"></i>
                </td>
            </tr>
            <tr style="background-color: #ffd700;">
                <td><strong>📌 Tema Anclado: Normas de la Comunidad</strong></td>
                <td>800</td>
                <td>
                    50 
                    <i class="ri-chat-3-line" title="Responder" style="margin-left: 10px; cursor: pointer;"></i>
                </td>
            </tr>
            <!-- Más foros -->
            <tr>
                <td><a href="#">¿Cómo preparar un informe técnico eficiente?</a></td>
                <td>120</td>
                <td>
                    15 
                                      <i class="ri-chat-3-line" title="Responder" style="margin-left: 10px; cursor: pointer;"></i>
                </td>
            </tr>
            <tr>
                <td><a href="#">Recomendaciones para manejar el estrés en época de exámenes</a></td>
                <td>80</td>
                <td>
                    10 
                    <i class="ri-chat-3-line" title="Responder" style="margin-left: 10px; cursor: pointer;"></i>
                </td>
            </tr>
            <tr>
                <td><a href="#">¿Qué estrategias funcionan mejor para estudiar cálculo avanzado?</a></td>
                <td>95</td>
                <td>
                    22 
                    <i class="ri-chat-3-line" title="Responder" style="margin-left: 10px; cursor: pointer;"></i>
                </td>
            </tr>
            <tr>
                <td><a href="#">Debate: ¿Es la inteligencia artificial una amenaza o una oportunidad?</a></td>
                <td>150</td>
                <td>
                    30 
                    <i class="ri-chat-3-line" title="Responder" style="margin-left: 10px; cursor: pointer;"></i>
                </td>
            </tr>
            <tr>
                <td><a href="#">Consejos para proyectos de investigación en física cuántica</a></td>
                <td>200</td>
                <td>
                    40 
                    <i class="ri-chat-3-line" title="Responder" style="margin-left: 10px; cursor: pointer;"></i>
                </td>
            </tr>
        </tbody>
    </table>
    `,



              // Categoría 2: Anuncios
              `
              <h2>Anuncios de Grupos y Clubes</h2>
              <table>
                  <thead>
                      <tr>
                          <th>Grupo o Club</th>
                          <th>Descripción</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Club de Robótica UTEC</td>
                          <td>Estamos buscando nuevos miembros interesados en programación y electrónica. Reuniones semanales los sábados.</td>
                      </tr>
                      <tr>
                          <td>Grupo de Estudio de Física Cuántica</td>
                          <td>Únete para profundizar en temas complejos de física con sesiones guiadas por profesores y estudiantes avanzados.</td>
                      </tr>
                      <tr>
                          <td>Club de Voluntariado</td>
                          <td>¡Haz la diferencia! Organizamos actividades para ayudar a la comunidad. Próxima reunión el 28 de noviembre.</td>
                      </tr>
                  </tbody>
              </table>
              `,

              // Categoría 3: Calendario
              `
              <h2>Calendario de Eventos Universitarios</h2>
              <div class="calendar-header">
                  <button onclick="prevMonth()">Anterior</button>
                  <span id="calendar-month">Noviembre 2024</span>
                  <button onclick="nextMonth()">Siguiente</button>
              </div>
              <div class="calendar-container">
                  <div class="calendar-day">1 Nov: Inicio de Inscripciones</div>
                  <div class="calendar-day">15 Nov: Feria de Proyectos</div>
                  <div class="calendar-day">28 Nov: Cierre de Cursos</div>
                  <div class="calendar-day">5 Dic: Presentación de Tesis</div>
                  <div class="calendar-day">20 Dic: Graduación</div>
              </div>
              `
          ];

          function switchCategory(categoryIndex) {
    currentCategory = categoryIndex; // Cambia directamente a la categoría seleccionada
    document.getElementById("category-content").innerHTML = categories[currentCategory];
  }


      // Inicializar con la primera categoría
      document.getElementById("category-content").innerHTML = categories[0];
  </script>
  <p>
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
      </p>

      <script src="main.js"></script>
    </body> 
    </html>