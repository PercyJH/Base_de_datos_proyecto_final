<?php
session_start();
    require '../../config/conexion.php';
 
    $id_tramite = null;
    if ( !empty($_GET['id_tramite'])) {
        $id_tramite = $_REQUEST['id_tramite'];
    }
     
    if ( null==$id_tramite ) {
        header("Location: listar.php");
    }
     
    if ( !empty($_POST)) {

      $msg='';
       
        $target = "../../../img/".basename($_FILES['imagen']['name']);
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion =  $_POST['descripcion'];
        $director = $_POST['director'];
        $apto = $_POST['apto'];
        $tiempo = $_POST['tiempo'];
        $disponible = $_POST['disponible'];
        $sub = $_POST['sub'];
        $dob = $_POST['dob'];
        $link = $_POST['link'];
        $idcate =  $_POST['idcat'];
        $imagen = $_FILES['imagen']['name'];

		if(empty($imagen)){
           $imagen =$_POST['imant'];
        }else{
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target)) {
            $imagenError =  "Image uploaded successfully";
          }
		}
        
        }
		$msg='';
        // validate input
        $valid = true;
        if (empty($nom_tramite)) {
             $msg .= 'Please enter Name';
            $valid = false;
        }
         
        if (empty($descripcion)) {
            $msg .=  'Please enter descripcion';
            $valid = false;
        }
         if (empty($idcate)) {
            $msg .=  'Please enter idcate';
            $valid = false;
        }    
        
       
        
        
     error_reporting(E_ALL);
     
         
        // update data
        if ($valid) {
            $pdo = conexion::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " UPDATE pelicula set nombre_pel = ?, descripcion = ?, director = ?, tiempo = ?,disponible = ?,url_pelicula=?, sub = ?, dob = ?,apto=?,link=?,categoria_idcate =?  WHERE id_pel = ?";

            $q = $pdo->prepare($sql);
            $q->execute(array($nom_tramite,$descripcion,$director,$tiempo,$disponible,$imagen,$sub,$dob,$apto,$link, $idcate, $id_tramite));
            conexion::disconnect();
            header("Location: listar.php");
			
        }
     else {
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM pelicula where id_pel = ? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_tramite));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nom_tramite = $data['nombre_pel'];
        $descripcion = $data['descripcion'];
        $idcatei = $data['categoria_idcate'];
        $imagen = $data['url_pelicula'];
        $director = $data['director'];
        $apto = $data['apto'];
        $tiempo = $data['tiempo'];
        $disponible = $data['disponible'];
        $sub = $data['sub'];
        $dob = $data['dob'];
        $link = $data['link'];
        conexion::disconnect();
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin </title>
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
       Actualizar Pelicula
        <small>Vista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> inico</a></li>
        <li><a href="#">escritorio</a></li>
        <li class="active">actualizar Pelicula</li>
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
              <h3 class="box-title">Datos de la Pelicula</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="editar.php?id_tramite=<?php echo $id_tramite?>" id="frm-tramite"  method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
                <div class="col-lg-12">
                  <!-- /input-group -->
                  <div class="form-group">
                  <label for="exampleInputEmail1">Enlace</label>
                  <input type="text" class="form-control"  placeholder="Nombre del Producto" id="link" name="link" value="<?php echo !empty($link)?$link:'';?>" required>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <!-- /input-group -->
                  <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control"  placeholder="Nombre del Producto" id="nom_tramite" name="nom_tramite" value="<?php echo !empty($nom_tramite)?$nom_tramite:'';?>" required>
                </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                  <!-- /input-group -->
                  <div class="form-group">
              <label for="message">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" type="text"   class="form-control" required><?php echo !empty($descripcion)?$descripcion:'';?></textarea>
            </div> 
                </div>
                <!-- /.col-lg-6 -->
              </div>
               
                <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                  <label for="exampleInputPassword1">Director</label>
                  <input type="text" value="<?php echo !empty($director)?$director:'';?>" class="form-control"  placeholder="" id="director" name="director" required>
                </div>
                  <!-- /input-group -->
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                  <label for="exampleInputPassword1">Apto</label>
                  <input type="text" class="form-control"  value="<?php echo !empty($apto)?$apto:'';?>"  id="apto" name="apto" >
                </div>
                  <!-- /input-group -->
                </div>
                <div class="col-lg-2">
                  <div class="form-group">
                  <label>SUB</label> <br>
                   <select name="sub" class="form-control" required>
                    <option>-SELECIONE-</option>
                   <option value="1"<?php if($sub==1){echo "selected";} ?>>SI</option>
                 <option value="0"<?php if($sub==0){echo "selected";} ?>>NO</option>
                  </select>
                  <!-- /input-group -->
                </div>
              </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-2">
                  <div class="form-group">
                  <label>DOB</label> <br>
                   <select name="dob" class="form-control" required>
                    <option>-SELECIONE-</option>
                   <option value="1"<?php if($dob==1){echo "selected";} ?>>SI</option>
                 <option value="0"<?php if($dob==0){echo "selected";} ?>>NO</option>
                  </select>
                  <!-- /input-group -->
                </div>
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
                  <input type="text" class="form-control"  value="<?php echo !empty($disponible)?$disponible:'';?>" id="disponible" name="disponible" required>
                  <!-- /input-group -->
                </div>
              </div>
                <!-- /.col-lg-6 -->
                 <div class="col-lg-4">
                    <div class="form-group">
                  <label for="exampleInputPassword1">Duración</label>
                  <input type="texto" class="form-control" value="<?php echo !empty($tiempo)?$tiempo:'';?>" id="tiempo" name="tiempo" required>
                </div>
              </div>
                <!-- /.col-lg-6 -->
              </div>
                <div class="row">
                <div class="col-lg-6">
                                <div class="form-group">
                  <label>Categoria</label>
                  <select name="idcat" class="form-control" required="true">
                  <?php
                    $pdo = conexion::connect();
                   $sql2 = "SELECT * FROM categoria where tipo_cat='PRODUCTO' ORDER BY id_cat ASC ";
  
                   $st = "";
                   $sel='';
                     foreach ($pdo->query($sql2) as $row2) {
                      if($idcatei==$row2['id_cat']){
                        $sel = 'selected="true" ';
                      }
                         
            $st.= "<option ".$sel."  value='".$row2['id_cat']."' >".$row2['nombre_cat']."</option> ";
                $sel='';
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
                  <label for="name">Seleccionar Imagen</label>
                  <input id="imagen" name="imagen"  type="file" onchange="return validarExt()">
                </div>
            <input type="hidden" name="imant" value="<?php echo !empty($imagen)?$imagen:'';?>" />
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
                <button type="submit" name="actualizar" class="btn btn-success pull-right"><i class="fa fa-rotate-left"></i> Actualizar</button>
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
    var archivoInput = document.getElementById('imagen');
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