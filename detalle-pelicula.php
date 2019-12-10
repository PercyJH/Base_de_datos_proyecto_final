<?php
session_start();
include('admin/config/dpelicula.php');
include('admin/config/detallepelicula.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Pelicula</title>
    <link rel="icon" href="imagens/Utiles/Logo.ico" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/seleccion.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Public+Sans:700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
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
              <li><a id="an" class="luz" href="cine.html">Cines</a></li>
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

             <!--div class="search-box"><input class="search-txt" type="text" name="" placeholder="Type to search">
                <a href="#" class="luzon search-btn">
                    <i class="fas fa-search"></i>
               
              </div>-->
            </ul>
          </nav>
        </div>
      </div>
<!-----------------------------Trailer---------------------------------------->
<div class="contenedor-de-contenedor">
    <div class="contenedor-video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  </div>

<?php echo $link; ?>
<!-------------------------GALERIA DE CONFITERIA-------------------------------->
<div class="galeriatotal">
    <div class="Titulo">
        <h1 class="cinestxt"><?php echo $nom_tramite; ?></h1>
        <h2><?php echo $nom_tramite; ?> <span> | </span> <?php echo $tiempo; ?> <span> | </span> APT</h2>
      <!--<div class="clasificacion">
        <h2>Animación</h2>
        <h2>1hrs 50min</h2>
        <h2>Apto</h2>
      </div>-->
    </div>
    <div class="linea"></div>
</div>
</header>
<div class="encaja">
<div class="contenedor"> <!-----blog-post------>
  <div class="imagendentro">   <!-----blog-post_img------>
    <img src="img/<?php echo $imagen;?>" alt="">
  </div>
  <div class="contenido">         <!-----blog-post_info------>
    <h1 class="sinopsis">Sinopsis</h1> <!-----blog-post_tittle------>
    <p class="descripcion"><!-----blog-text------><?php echo $descripcion; ?></p>
    <div class="info">         <!-----blog-post:date------>
      <span>Director</span>
      <p><?php echo $director; ?></p>
      <span>Disponible</span>
      <div class="tipo">
      <p><?php echo $disponible; ?></p>
      </div>
      <span>Idioma</span>
        <div class="idioma">
          <p><?php if($sub==1){echo "SUB";}else{echo "NO SUB";} ?></p>
          <p><?php if($dob==1){echo "DOB";}else{echo "NO DOB";} ?></p>
          <a href="#"><button class="btn btn4"><i class="fas fa-ticket-alt"></i> Comprar</button></a>
        </div>
    </div>
  </div>
</div>
</div>
<!------------------MENU DESPLEGABLE VERTICAL 100 REALNO FEIK----------------->
<div>
  <h1 class="titulomenu">Elige tu cine favorito! </h1>
</div>
<div class="contenedor-acordeon">
  <div class="acordion">

    <h2 class="cine1">C. Peliculón - La Victoria </h2> <!--Nombre de cineeeee esto trauma lo se :c vamos anderson si se puedee-->
    <div class="contenido-cine">  <!-----EL CONTENIDOOOO ESTO SE GUARDAAAA TODO ESO SE GUARDA PERROOOOOOOOOO------->
    <h4 class="servicio-cine"><span>2D</span> REGULAR</h4>  <!------- Tipo de servicio----->
    <div class="horario-cine">
        <a href="butaca.html">2:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">3:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:60pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">6:30pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:50pm <span class="seat">ho</span></a href="butaca.html">
    </div>

    <h4 class="servicio-cine"><span>3D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">7:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"> <!--Display flex de ahi su buen display block prru-->
    </div>
    </div>

    <h2 class="cine1">C. Peliculón - La Molina</h2> 
    <div class="contenido-cine"> 
    <h4 class="servicio-cine"><span>2D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">2:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">3:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:60pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">6:30pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:50pm <span class="seat">ho</span></a href="butaca.html">
    </div>

    <h4 class="servicio-cine"><span>3D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">7:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"> <!--Display flex de ahi su buen display block prru-->
    </div>
    </div>

    <h2 class="cine1">C. Peliculón - Huachipa</h2> 
    <div class="contenido-cine"> 
    <h4 class="servicio-cine"><span>2D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">2:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">3:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:60pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">6:30pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:50pm <span class="seat">ho</span></a href="butaca.html">
    </div>

    <h4 class="servicio-cine"><span>3D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">7:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"> <!--Display flex de ahi su buen display block prru-->
    </div>
    </div>

    <h2 class="cine1">C. Peliculón - Chosica</h2> 
    <div class="contenido-cine"> 
    <h4 class="servicio-cine"><span>2D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">2:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">3:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:60pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">6:30pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:50pm <span class="seat">ho</span></a href="butaca.html">
    </div>

    <h4 class="servicio-cine"><span>3D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">7:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"> <!--Display flex de ahi su buen display block prru-->
    </div>
    </div>

    <h2 class="cine1">C. Peliculón - Ate</h2> 
    <div class="contenido-cine"> 
    <h4 class="servicio-cine"><span>2D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">2:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">3:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:60pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">6:30pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:50pm <span class="seat">ho</span></a href="butaca.html">
    </div>

    <h4 class="servicio-cine"><span>3D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">7:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"> <!--Display flex de ahi su buen display block prru-->
    </div>
    </div>

    <h2 class="cine1">C. Peliculón - Tecsup</h2> 
    <div class="contenido-cine"> 
    <h4 class="servicio-cine"><span>2D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">2:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">3:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:60pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">6:30pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:50pm <span class="seat">ho</span></a href="butaca.html">
    </div>

    <h4 class="servicio-cine"><span>3D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">7:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"> <!--Display flex de ahi su buen display block prru-->
    </div>
    </div>

    <h2 class="cine1">C. Peliculón - Breña</h2> 
    <div class="contenido-cine"> 
    <h4 class="servicio-cine"><span>2D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">2:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">3:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">4:60pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">6:30pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">9:50pm <span class="seat">ho</span></a href="butaca.html">
    </div>

    <h4 class="servicio-cine"><span>3D</span> REGULAR</h4>
    <div class="horario-cine">
        <a href="butaca.html">4:10pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">7:00pm <span class="seat">ho</span></a href="butaca.html"><a href="butaca.html">8:00pm <span class="seat">ho</span></a href="butaca.html"> <!--Display flex de ahi su buen display block prru-->
    </div>
    </div>


</div>
</div>


</body>
<!--------------------------------------------------------->
<footer class="footer">
  <div class="footer-cuerpo">
    <div class="footer-top">
        <li> Powered by Almeyda <i class="fas fa-bolt"></i> @COMANDODESIGN</li>
    </div>
    <div class="inner-footer">
      <div class="footer-items">
        <h1><img class="logo3" src="/imagens/Utiles/Logopeliculondark.png" height="49" alt="Logo Peliculon"/> &reg;</h1>
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
  <script src="js/menuacordion.js"></script>
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
</html>
