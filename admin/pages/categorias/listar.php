<?php 
session_start(); 
include '../../config/conexion.php';
    $msg = "";
    if (isset($_POST['registrar'])) {
        $target = "../imagenes/".basename($_FILES['image']['name']);
        $db = conexion::connect();
        $image = $_FILES['image']['name'];
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $oferta = $_POST['oferta'];
        $estado = $_POST['estado'];
        $target2 ="../pdf/".basename($_FILES['fchtecnica']['name']);
        $fchtecnica =$_FILES['fchtecnica']['name'];
        $fchselecion = $_POST['fchselecion'];
        $idcat = $_POST['idcat'];
       
        $sql = "INSERT INTO producto (nombre_pro, descripcion,precio,oferta,estado,url_producto,fchtecnica,fchselecion,categoria_idcate) 
        VALUES ('$nom_tramite', '$descripcion','$precio','$oferta','$estado','$image','$fchtecnica','$fchselecion','$idcat')";
        $db->query($sql);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
            header ("location: listar.php");
        
        }
        else{
            $msg = "Theme was a problem uploading image";
        }
        if (move_uploaded_file($_FILES['fchtecnica']['tmp_name'], $target2)) {
            $msg = "fecha Tecnica uploaded successfully";
            header ("location: listar.php");
        
        }
        else{
            $msg = "Theme was a problem uploading fecha Tecnica";
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
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="wrapper">
  <?php include('../panel/header.php') ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista Categoria
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Escritorio</a></li>
        <li class="active">Lista de productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
              <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nueva Categoria</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" name="nom_cat" class="form-control" id="exampleInputEmail1" placeholder="Nombre de la categoria." required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="registrarCat" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Todas las Categorias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>N°</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <!--archivo php--->
                <?php
    $pdo = conexion::connect();
    $sql = "SELECT * FROM categoria ";
    if(isset ($_POST['buscar']))
    {    $buscar = $_POST["palabra"];
     $sql = "SELECT * FROM categoria WHERE nombre_cat like '%$buscar%'";
    }
      
      
       foreach ($pdo->query($sql) as $row) {
           
          
       ?>
                <?php
                 
                   
               
                            echo '<tr>';
                            echo '<td>'. $row['id_cat'] . '</td>';
                            echo '<td>'. $row['nombre_cat'] . '</td>';
                            echo '<td>'; echo ' <center>';
                            echo '<a class="btn btn-success" href="editar.php?id_tramite='.$row['id_cat'].'"><i class="fa fa-edit"></i>Editar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="eliminar.php?id_tramite='.$row['id_cat'].'"><i class="fa fa-trash"></i>Eliminar</a>';
            echo '</center> ';
                            echo '</td>';
                            echo '</tr>';
                 
                   
                  ?>
                  <?php 
        }
        conexion::disconnect();
    ?>
                <!---------------->
                </tbody>
                <tfoot>
                <tr>
                 <th>N°</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('../panel/footer.php'); ?>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
<script>
    $(document).on("ready",function(){
       listar(); 
    });
    
    var listar = function(){
        var table = $("#example1").DataTable({
           "ajax":{
               "method":"POST",
               "url":"listar.php"
           },
            "colums":[
                {"data":"id"},
                {"data":"imagen"},
                {"data":"nombre"}, 
                {"data":"precio"},
                {"data":"categoria"}
            ],
            "language":
        });
    }
    var idiaoma_espanol={
    "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
}
</script>
