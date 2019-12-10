<?php
session_start();
include('admin/config/dpelicula.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Cine</title>
    <link rel="icon" href="imagens/Utiles/Logo.ico" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/cine.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Public+Sans:700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,800&display=swap" rel="stylesheet">
  </head>
  <body class="body">
    <div class="todo">
    <header class="header"> <!--CLASE header-->
      <div class="contienebar inicio">
        <div class="barra navlogo">
          <b class="logotipo" href="index.html">
            <img class="logo2" src="imagens/Utiles/Logo.png" height="35" alt="Logo Peliculon"/>
            <img class="logo1" src="imagens/Utiles/Logopeliculondark.png" height="40" alt="Logo Peliculon"/>
          </b>
          <div class="hamburguesa">
            <!--Creando hamburguesa como dijo JOsue >:V -->
            <spam class="bar bar1"></spam>
            <spam class="bar bar2"></spam>
            <spam class="bar bar3"></spam>
          </div>
          <nav class="navigation">
            <ul>
              <li><a id="an" class="luz" href="home.php">Películas </a></li>
              <li><a id="an" class="luz" href="cine.php">Cines</a></li>
              <li><a id="an" class="luz" href="Confiteria.html">Confitería</a></li>
              <?php 
     if(!empty($_SESSION['name'])){  
    ?>
        <li class="active"><button class="login register" ><i class="fa fa-user"></i> <?php } ?><?php 
     if(!empty($_SESSION['name'])){
       $usu = $_SESSION['name'];
       echo $usu;
     }  
    ?></button>
  </li>
    <li><a href="login/logout.php" title="Cerrar Sesion"><i class="fa fa-power-off"></i> </a></li>
      </ul>
          </nav>
        </div>
      </div>
      <div class="hero-image"></div>
      <div class="rellax parallax-el" data-rellax-speed="5"></div>
      <div class="rellax text" data-rellax-speed="10"></div>
      <div class="rellax clouds" data-rellax-speed="8"></div>
      <div class="whitespace"></div>
      <div class="content">

<!-------------------------GALERIA DE CONFITERIA-------------------------------->

    <div class="Titulo">
        <h1 class="cinestxt">Nuestros Cines </h1>
    </div>
    <div class="linea"></div>
<div class="galeria">
    <div class="carta carta1">
        <div class="foto">
            <img class="animo" src="imagens/cines/plus.jpg" alt="project img">
        </div>    
        <div class="descripcion">
          <h1>C. Peliculón - La Victoria </h1>
          <h2>Av. Oracle 1290</h2>
          <h3>2D | 3D | Plus | Vip</h3>
        </div>  
    </div>

    <div class="carta carta2">
        <div class="foto">
            <img class="animo" src="imagens/cines/plus2.jpg" alt="project img">
        </div>    
        <div class="descripcion">
            <h1>C. Peliculón - La Molina</h1>
            <h2>Av. Laravel 235</h2>
            <h3>2D | 3D | Plus | Vip</h3>
          <br>
        </div>  
    </div>

    <div class="carta carta2">
        <div class="foto">
            <img class="animo" src="imagens/cines/1cine.jpg" alt="project img">
        </div>    
        <div class="descripcion">
            <h1>C. Peliculón - Huachipa</h1>
            <h2>Av. Bica 2ciclo</h2>
            <h3>2D | 3D | Plus | Vip</h3>
          <br>
        </div>  
    </div>

    <div class="carta carta2">
        <div class="foto">
            <img class="animo" src="imagens/cines/2cine.jpg" alt="project img">
        </div>    
        <div class="descripcion">
            <h1>C. Peliculón - Chosica</h1>
            <h2>Av. No duermo 1355</h2>
            <h3>2D | 3D | Plus | Vip</h3>
          <br>
        </div>  
    </div>

    <div class="carta carta2">
        <div class="foto">
            <img class="animo" src="imagens/cines/3cine.jpg" alt="project img">
        </div>    
        <div class="descripcion">
            <h1>C. Peliculón - Ate</h1>
            <h2>Av. Trica POO</h2>
            <h3>2D | 3D | Plus | Vip</h3>
          <br>
        </div>  
    </div>

    <div class="carta carta2">
        <div class="foto">
            <img class="animo" src="imagens/cines/4cine.jpg" alt="project img">
        </div>    
        <div class="descripcion">
            <h1>C. Peliculón - Tecsup</h1>
            <h2>Av. Android flooter</h2>
            <h3>2D | 3D | Plus | Vip</h3>
          <br>
        </div>  
    </div>

    <div class="carta carta2">
        <div class="foto">
            <img class="animo" src="imagens/cines/5cine.jpg" alt="project img">
        </div>    
        <div class="descripcion">
            <h1>C. Peliculón - Breña</h1>
            <h2>Av. My SQL 235</h2>
            <h3>2D | 3D | Plus | Vip</h3>
          <br>
        </div>  
    </div>

    <div class="carta carta2">
        <div class="foto">
            <img class="animo" src="imagens/cines/6cine.jpg" alt="project img">
        </div>    
        <div class="descripcion">
            <h1>C. Peliculón - Puruchuco</h1>
            <h2>Av. TODO YO SOLO :'V</h2>
            <h3>2D | 3D | Plus | Vip</h3>
          <br>
        </div>  
    </div>

    <div class="carta carta3">
          <div class="foto">
              <img class="animo" src="imagens/cines/nani.jpg" alt="project img">
          </div>    
          <div class="descripcion">
              <h1>Su Corazón</h1>
              <h2>Av Nunca jamas</h2>
              <h3>2D | 3D | 4D | 5D</h3>
            <br>
          </div>  
    </div>

    <div class="carta carta4">
        <div class="foto">
            <img class="animo" src="imagens/cines/nani2.jpg" alt="project img">
        </div>
        <div class="descripcion">
            <h1>Un futuro con ella</h1>
            <h2>Av. Muy muy lejano</h2>
            <h3>2D | 3D | Plus | Vip</h3>
          <br>
        </div>
    </div>
</div>
</div>
</header>
</body>
<!--------------------------------------------------------->
<footer class="footer">
  <div class="footer-cuerpo">
    <div class="footer-top">
        <li> Powered by Almeyda <i class="fas fa-bolt"></i> @COMANDODESIGN</li>
    </div>
    <div class="inner-footer">
      <div class="footer-items">
        <h1><img class="logo3" src="imagens/Utiles/Logopeliculondark.png" height="49" alt="Logo Peliculon"/> &reg;</h1>
        <P class="frase">Descubre la mejor Experiencia del Cine aquí.</P>
        <p class="pronto">Muy pronto:</p>
        <i class="coming-soon fab fa-google-play"></i>
        <i class="coming-soon fab fa-apple"></i>
      </div>
      <div class="footer-items">
          <h2>Peliculón</h2>
          <div class="border"></div>
          <ul>
            <a href=""><li>Inicio</li></a>
            <a href=""><li>Nosotros</li></a>
            <a href=""><li>Servicios</li></a>
            <a href=""><li>Libro de Reclamaciones</li></a>
            <a href=""><li>Dile NO a la bica</li></a>
          </ul>
      </div>

      <div class="footer-items">
          <h2>Legal</h2>
          <div class="border"></div>
          <ul>
            <a href=""><li>Términos y condiciones</li></a>
            <a href=""><li>Acuerdo de licencia</li></a>
            <a href=""><li>Politicia de privacidad</li></a>
            <a href=""><li>100% Legal no fake</li></a>
            <a href=""><li>Información registrada</li></a>
          </ul>
      </div>

      <div class="footer-items">
          <h2>Contacto</h2>
          <div class="border"></div>
          <ul>
            <li><i class="fas fa-map-marker-alt"></i> Tecsup, C24-B</li>
            <li><i class="fas fa-phone-alt"></i> 310416</li>
            <li><i class="fas fa-envelope"></i> Anderson.Almeyda@Tecsup.edu.pe</li>
            <li><i class="fab fa-whatsapp"></i> 927 974 418 </li>
          </ul>
          <div class="social-media">
              <a href="https://www.facebook.com/anderson.almeydatorres" target="_blank"><i class="fab fa-facebook"></i></a>
              <a href="http://img2.wikia.nocookie.net/__cb20110123071544/inciclopedia/images/1/14/Aqu%C3%AD_no_hay_nada.PNG" target="_blank"><i class="fab fa-twitter"></i></a>
              <a href="https://cdn.memegenerator.es/imagenes/memes/full/22/2/22023224.jpg" target="_blank"><i class="fab fa-instagram"></i></a>
              <a href="https://www.youtube.com/channel/UCkS3rZ53w8Wj4FdPTtKZcqg?view_as=subscriber " target="_blank"><i class="fab fa-youtube"></i></a>
          </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="uno">Copyright &copy;2019 Peliculon, Proyect C-24B Todos los derechos reservados.</div>
    <div class="dos">Peliculon &reg; V.2.01 </div>
  </div>
</div>
</footer>
      <script src="js/confiteria.js"></script>
      <script type="text/javascript">
            var rellax = new Rellax('.rellax');
      </script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/swiper.min.js"></script>
  <script src="js/scriptbarra.js"></script>
  <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
  <script type="text/javascript">
    window.sr = ScrollReveal();
    sr.reveal('.anim');
  </script>

  <!--<script>
    $(document).ready(function(){
  var altura = $('.body').offset.top-$('footer-top').offset().top;
  alert(altura);
	});-->
 
  </script>
</html>
