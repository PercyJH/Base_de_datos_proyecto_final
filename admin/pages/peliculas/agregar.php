<?php 
session_start(); 
include '../../config/conexion.php';
    $msg = "";
    if (isset($_POST['registrar'])) {
        $target = "../../../img/".basename($_FILES['image']['name']);
        $db = conexion::connect();
        $image = $_FILES['image']['name'];
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion = $_POST['descripcion'];
        $director = $_POST['director'];
        $apto = $_POST['apto'];
        $tiempo = $_POST['tiempo'];
        $disponible = $_POST['disponible'];
        $sub = $_POST['sub'];
        $dob = $_POST['dob'];
        $link = $_POST['link'];
        $idcat = $_POST['idcat'];
       
        $sql = "INSERT INTO pelicula (nombre_pel, descripcion,url_pelicula,director,tiempo,disponible,sub,dob,apto,link,categoria_idcate) 
        VALUES ('$nom_tramite', '$descripcion','$image','$director','$tiempo','$disponible','$sub','$dob','$apto','$link','$idcat')";
        $db->query($sql);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
            header ("location: listar.php");
        }
        else{
            $msg = "Theme was a problem uploading image";
        }
    }
    if (isset($_POST['registrarCat'])) {
       
        $db = conexion::connect();
      
        $nomc = $_POST['nom_cat'];
        $nom_cat= strtoupper ($nomc);
       
       
        $sql = "INSERT INTO categoria (nombre_cat, tipo_cat) VALUES ('$nom_cat','PRODUCTO')";
        $db->query($sql);
        }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="wrapper">
 <?php include('../panel/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Registrar nuevo Producto
        <small>Vista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> inico</a></li>
        <li><a href="#">escritorio</a></li>
        <li class="active">Registrar nuevo Producto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Datos del Producto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="frm-tramite" action="agregar.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
                <div class="col-lg-12">
                  <!-- /input-group -->
                  <div class="form-group">
                  <label for="exampleInputEmail1">Enlace</label>
                  <input type="text" class="form-control"  placeholder="2HVZuCpb7H4" id="link" name="link" required>
                </div>
                </div>
                </div>
              <div class="row">
                <div class="col-lg-6">
                  <!-- /input-group -->
                  <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control"  placeholder="" id="nom_tramite" name="nom_tramite" required>
                </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                  <!-- /input-group -->
                  <div class="form-group">
              <label for="message">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" type="text"   class="form-control" required></textarea>
            </div> 
                </div>
                <!-- /.col-lg-6 -->
              </div>
               
                <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                  <label for="exampleInputPassword1">Director</label>
                  <input type="text" class="form-control"  placeholder="" id="director" name="director" required>
                </div>
                  <!-- /input-group -->
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                  <label for="exampleInputPassword1">Apto</label>
                  <input type="text" class="form-control"  placeholder="" id="apto" name="apto" required>
                </div>
                  <!-- /input-group -->
                </div>
                <div class="col-lg-2">
                  <div class="form-group">
                  <label>SUB</label> <br>
                  <select name="sub" class="form-control" required="true">
                 <option value="0">-SELECCIONAR-</option>
                  <option value="1">SI</option>
                 <option value="0">NO</option>   
          </select>
                </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-2">
                   <div class="form-group">
                   <label>DOB</label> <br>
                  <select name="dob" class="form-control" required="true">
                 <option value="0">-SELECCIONAR-</option>
                  <option value="1">SI</option>
                 <option value="0">NO</option> 
                 </select>
                </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <script>
		function habilitar(value)
		{
			if(value==true)
			{
				// habilitamos
				document.getElementById("entrada").disabled=false;
                document.getElementById("estado").checked=true;
			}else if(value==false){
				// deshabilitamos
				document.getElementById("entrada").disabled=true;
                 document.getElementById("estado").checked=false;
			}
		}
	</script>
              </div>
            
                <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                  <label for="exampleInputPassword1">Disponible</label>
                  <input type="text" class="form-control"  placeholder="" id="disponible" name="disponible" required>
                </div>
                  <!-- /input-group -->
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-4">
                    <div class="form-group">
                  <label for="exampleInputPassword1">Duración</label>
                  <input type="texto" class="form-control"  placeholder="" id="tiempo" name="tiempo" required>
                </div>
              </div>
                  <!-- /input-group -->
                </div>
                <div class="row">
                <div class="col-lg-6">
                                <div class="form-group">
                  <label>Categoria</label>
                  <select name="idcat" class="form-control" required>
                     <?php
                    $pdo = conexion::connect();
                   $sql2 = "SELECT * FROM categoria where tipo_cat='PRODUCTO' ORDER BY id_cat ASC ";
  
                   $st = "<option   value='' selected disabled >-SELECCIONE-</option>";
                     foreach ($pdo->query($sql2) as $row2) {
                         
            $st.= "<option   value='".$row2['id_cat']."' >".$row2['nombre_cat']."</option> ";
              }
            echo $st;

            ?>
                  </select>
                </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-4">
                  <!-- /input-group -->
                   <div class="form-group">
                  <label for="exampleInputFile">Seleccionar Imagen</label>
                  <input type="file" id="image" name="image" onchange="return validarExt()" required>
                </div>
                </div>
                <!-- /.col-lg-6 -->
              </div>
                  <div class="row">
                <!-- /.col-lg-6 -->
                <!-- /.col-lg-6 -->
              </div>
               <div id="visorArchivo">
				<!--Aqui se desplegará el fichero-->
			    </div>
               <style>
               #visorArchivo {
  /*float: right;*/
        position:absolute;
        bottom:60px;
        right:40px;
}
               </style>
              </div>
              <!-- /.box-body -->
 <div class="box-footer">
                <a href="listar.php" class="btn btn-default"><i class="fa fa-list"></i> Ver Lista</a>
                <button type="submit" name="registrar" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Guardar</button>
            </div>
            </form>
          </div>
          <!-- Input addon -->
          <!-- /.box -->
<script>
/* Archivo externo JS */
/*Visitar la web que hay un flejaso de ejemplos*/
// Función de ventana de alerta
function mensaje() {
  swal({
    title: 'Título',
    text: 'Mensaje de texto',
    html: '<p>Mensaje de texto con <strong>formato</strong>.</p>',
    type: 'success',
    timer: 3000,
  });
}
</script>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
     <script>
    $(document).ready(function(){
        $("#frm-tramite").submit(function(){
            return $(this).validate();
        });
    })
</script>
  <!-- /.content-wrapper -->
  <?php include('../panel/footer.php');?>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</body>
</html>


<script type="text/javascript">

function validarExt()
{
    var archivoInput = document.getElementById('image');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.pdf|.png|.PNG|.jpg|.JPG)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado un PDF');
        archivoInput.value = '';
        return false;
    }

    else
    {
        //PRevio del PDF
        if (archivoInput.files && archivoInput.files[0]) 
        {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
                document.getElementById('visorArchivo').innerHTML = 
                '<embed src="'+e.target.result+'" width="150" height="150" />';
            };
            visor.readAsDataURL(archivoInput.files[0]);
        }
    }
}
</script>