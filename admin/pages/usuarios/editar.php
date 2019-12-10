<?php 
    session_start(); 
    require '../../config/conexion.php';
 
    $id_admin = null;
    if ( !empty($_GET['id_admin'])) {
        $id_admin = $_REQUEST['id_admin'];
    }
     
    if ( null==$id_admin ) {
        header("Location: listar.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nombreError = null;
        $apellidosError = null;
        $emailError = null;
        $passwordError = null;
        // keep track post values
        $nombre = $_POST['nombre'];
        $apellidos =  $_POST['apellidos'];
        $email= $_POST['email'];        
        $password = $_POST['password'];
        $tipo_usuario = $_POST['tipo_usuario'];
        // validate input
        $valid = true;
        if (empty($nombre)) {
            $nombreError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($apellidos)) {
            $apellidosError = 'Please enter Name';
            $valid = false;
        }
        
        
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
        
        if (empty($password)) {
            $passwordError = 'Please enter Name';
            $valid = false;
        }
     
         
        // update data
        if ($valid) {
            $pdo = conexion::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE usuario set nombre = ?, apellidos = ?, email = ?, password = md5(? ),tipo_usuario = ? WHERE id_user = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nombre,$apellidos,$email,$password,$tipo_usuario, $id_admin));
            conexion::disconnect();
            header("Location: listar.php");
        }
    } else {
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM usuario where id_user = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_admin));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nombre = $data['nombre'];
        $apellidos = $data['apellidos'];
        $email = $data['email'];
        $password = $data['password'];
        $tipo_usuario = $data ['tipo_usuario'];
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
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
       Actualizar Usuario
        <small>Vista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> inico</a></li>
        <li><a href="#">escritorio</a></li>
        <li class="active"> Actualizar Usuario</li>
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
              <h3 class="box-title">Datos del Usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="editar.php?id_admin=<?php echo $id_admin?>" id="frm-usuario"  method="post" enctype="multipart/form-data">
              <div class="box-body">
               <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input style="font-size: 15px;" id="nombre" name="nombre" value="<?php echo !empty($nombre)?$nombre:'';?>"   class="form-control" required></input>
                <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Apellido</label>
                  <input style="font-size: 15px;" value="<?php echo !empty($apellidos)?$apellidos:'';?>" class="form-control"  id="apellidos" name="apellidos" required></input>
                <?php if (!empty($apellidosError)): ?>
                                <span class="help-inline"><?php echo $apellidosError;?></span>
                            <?php endif; ?>
                </div>
                </div>
              </div>
                <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Correo</label>
                   <input style="font-size: 15px;" id="email" name="email" value="<?php echo !empty($email)?$email:'';?>" type="email"   class="form-control"></input>
              	<?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif; ?>
                </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                <div class="form-group">
                  <label>Tipo de Usuario</label>
                  <select class="form-control" name="tipo_usuario">
                    <option>-SELECCIONE-</option>
                    <option value="Administrador"<?php if($tipo_usuario=='Administrador'){echo "selected";} ?>>Administrador</option>
                 <option value="Trabajador"<?php if($tipo_usuario=='Trabajador'){echo "selected";} ?>>Trabajador</option>
                  </select>
                </div>
                </div>
              </div>
                 
                 <div class="form-group">
                  <label for="exampleInputEmail1">Contraseña</label>
                  <input id="password" name="password" value="<?php echo !empty($password)?$password:'';?>"  type="password"  class="form-control" placeholder="******************" required></input>
              	<?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif; ?>
                </div> 
              </div>
              <!-- /.box-body -->
<div class="box-footer">
                <a href="listar.php" class="btn btn-default"><i class="fa fa-arrow-circle-o-left"></i> Cancel</a>
                <button type="submit" name="actualizar" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Guardar</button>
            </div>
            </form>
          </div>
          <!-- Input addon -->
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
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
</body>
</html>


<script type="text/javascript">

function validarExt()
{
    var archivoInput = document.getElementById('archivoInput');
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
                '<embed src="'+e.target.result+'" width="300" height="300" />';
            };
            visor.readAsDataURL(archivoInput.files[0]);
        }
    }
}
</script>
<script type="text/javascript">
 
      var espacios = false;
var cont = 0;

function validar(){

 var p1 = document.getElementById("passwd").value;
var p2 = document.getElementById("passwd2").value;

while (!espacios && (cont < p1.length)) {
  if (p1.charAt(cont) == " ")
    espacios = true;
  cont++;
}
 
if (espacios) {
  /*alert ("La contraseña no puede contener espacios en blanco");*/
  var str = "La contraseña no puede contener espacios en blanco!";
  var ale = document.getElementById('avi');
  ale.style.display = 'block';
   document.getElementById("msg").innerHTML =str;
   
  return false;
}
if (p1.length == 0 || p2.length == 0) {
/* alert("Los campos de la password no pueden quedar vacios ");  */
  var str = "Los campos de la password no pueden quedar vacios!";
  var ale = document.getElementById('avi');
  ale.style.display = 'block';

   document.getElementById("msg").innerHTML =str;
   
  return false;
}
if (p1 != p2) {
  /*alert("Las passwords deben de coincidir"); */
    var str = "Las passwords deben de coincidir!";
  var ale = document.getElementById('avi');
  ale.style.display = 'block';
   document.getElementById("msg").innerHTML =str;
   
  return false;
} else {
  /*alert("Todo esta correcto"); */
   var str = "Todo esta correcto!";
  var ale = document.getElementById('avi');
  ale.style.display = 'block';
   document.getElementById("msg").innerHTML =str;
   
  return true; 
}
}
</script>