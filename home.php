<?php
session_start();
include('admin/config/dpelicula.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Peliculón | films</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="icon" href="imagensUtiles/Logo.ico">
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Public+Sans:700,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<header class="header">
  <div class="contienebar inicio">
    <div class="barra navlogo">
      <b class="logotipo" href="index.html">
        <img class="logo2" src="imagens/Utiles/Logo.png" height="35" alt="Logo Peliculon">
        <img class="logo1" src="imagens/Utiles/Logopeliculondark.png" height="40" alt="Logo Peliculon">
      </b>
      
      <div class="hamburguesa">
        <!--Creando hamburguesa como dijo JOsue >:V -->
        <spam class="bar bar1"></spam>
        <spam class="bar bar2"></spam>
        <spam class="bar bar3"></spam>
      </div>
      <nav class="navigation">
        <ul>
          <li><a id="an" class="luz" href="home.php">Películas</a></li>
          <li><a id="an" class="luz" href="cine.php">Cines</a></li>
          <!--Se borro promociones-->
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
</header>

<body>
  <section class="Panel">
    <section class="barremenu">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img class="deslis" src="imagens/0.jpg" alt="" class="src" href="#"></div>
          <div class="swiper-slide"><img class="deslis" src="imagens/1.jpg" alt="" class="src" href="#"></div>
          <div class="swiper-slide"><img class="deslis" src="imagens/2.jpg" alt="" class="src" href="#"></div>
          <div class="swiper-slide"><img class="deslis" src="imagens/3.jpg" alt="" class="src" href="#"></div>
          <div class="swiper-slide"><img class="deslis" src="imagens/4.jpg" alt="" class="src" href="#"></div>
          <div class="swiper-slide"><img class="deslis" src="imagens/5.jpg" alt="" class="src" href="#"></div>
          <div class="swiper-slide"><img class="deslis" src="imagens/7.jpg" alt="" class="src" href="#"></div>
          <div class="swiper-slide"><img class="deslis" src="imagens/confiteria/PUBLI3.jpg" alt="" class="src" href="#"></div>
          <div class="swiper-slide"><img class="deslis" src="imagens/6.jpg" alt="" class="src" href="#"></div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section>
  </section>
  <div class="container-general"><!--wrap-->
    <h1 class="peliculas">Películas</h1>
    <div class="linea"></div>
    <div class="container"><!--store-wrapper-->     <!--galeria-->
      <div class="category_list">
        <p class="letra"> <i class="fas fa-sliders-h"></i>Filtrar por:</p>
        <a href="home.php" class="category_item" category="all">Todo</a>
        <?php
  
    $pdo = conexion::connect();
   $sql = "SELECT * FROM categoria where tipo_cat ='PRODUCTO' order by id_cat ASC ";
   $plus="";
   if(isset($_GET['search'])){
     $plus="&search=".$_GET['search'];
   }
      foreach ($pdo->query($sql) as $row) { 
                      ?>
            <a class="category_item" href="home.php?cat=<?php echo $row['id_cat'].$plus; ?>">
      <span class="text-link"><?php echo $row['nombre_cat']; ?></span>
      </a>             

          <?php
           
            }
        conexion::disconnect();
       ?>
      </div>
      <div class="galeria"><!--products-list-->     <!--contenedor-imagenes-->
        <?php
  
 
   $sql = " select * from pelicula ".$criterio." limit ".$inicio .",". $TAMANO_PAGINA ;
   
     
      
       foreach ($pdo->query($sql) as $row) {

                      ?>
                   <div class="imagen" category="ciencia-ficcion">
          <img src="img/<?php echo $row['url_pelicula']; ?>" alt="pelicula">
          <div class="overlay">
            <h2><?php echo $row['nombre_pel']; ?></h2>
            <h3><?php echo $row['disponible']; ?></h3>
            <h4><?php echo $row['tiempo']; ?> | <?php echo $row['apto']; ?></h4>
            <div class="botones">
              <!--ANTES LLAMADO COMO PLUSSS CORREGIRR!!!!-->
              <a class="btn btn4"><i class="fas fa-ticket-alt"></i> Comprar</a>
              <a class="btn btn3" style="text-decoration:none;" href="detalle-pelicula.php?id_pelicula=<?php echo $row['id_pel']; ?>"><i class="fas fa-plus"></i> Detalles</a>
            </div>
          </div>
        </div>    
          <?php
           
            }
        conexion::disconnect();
       ?>
      </div>
    </div>
  </div>
  </div>
</body>
<footer class="footer">
  <div class="footer-cuerpo">
    <div class="footer-top">
      <li> Powered by Almeyda <i class="fas fa-bolt"></i> @COMANDODESIGN</li>
    </div>
    <div class="inner-footer">
      <div class="footer-items">
        <h1><img class="logo3" src="imagens/Utiles/Logopeliculondark.png" height="49" alt="Logo Peliculon" /> &reg;</h1>
        <P class="frase">Descubre la mejor Experiencia del Cine aquí.</P>
        <p class="pronto">Muy pronto:</p>
        <i class="coming-soon fab fa-google-play"></i>
        <i class="coming-soon fab fa-apple"></i>
      </div>
      <div class="footer-items">
        <h2>Peliculón</h2>
        <div class="border"></div>
        <ul>
          <a href="">
            <li>Inicio</li>
          </a>
          <a href="">
            <li>Nosotros</li>
          </a>
          <a href="">
            <li>Servicios</li>
          </a>
          <a href="">
            <li>Libro de Reclamaciones</li>
          </a>
          <a href="">
            <li>Dile NO a la bica</li>
          </a>
        </ul>
      </div>

      <div class="footer-items">
        <h2>Legal</h2>
        <div class="border"></div>
        <ul>
          <a href="">
            <li>Términos y condiciones</li>
          </a>
          <a href="">
            <li>Acuerdo de licencia</li>
          </a>
          <a href="">
            <li>Politicia de privacidad</li>
          </a>
          <a href="">
            <li>100% Legal no fake</li>
          </a>
          <a href="">
            <li>Información registrada</li>
          </a>
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
          <a href="https://www.facebook.com/anderson.almeydatorres"><i class="fab fa-facebook"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
          <a href="https://cdn.memegenerator.es/imagenes/memes/full/22/2/22023224.jpg"><i
              class="fab fa-instagram"></i></a>
          <a href="https://www.youtube.com/channel/UCkS3rZ53w8Wj4FdPTtKZcqg?view_as=subscriber"><i
              class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="uno">Copyright &copy;2019 Peliculon, Proyect C-24B Todos los derechos reservados.</div>
      <div class="dos">Peliculon &reg; V.2.01 </div>
    </div>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/categoria.js"></script>
<script>
  var swiper = new Swiper('.swiper-container', {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>
<script src="js/jquery-3.2.1.js"></script>
<script src="js/scriptbarra.js"></script>

</html>