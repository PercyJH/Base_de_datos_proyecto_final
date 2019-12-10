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
        $nom_tramite = $_POST['nom_tramite'];
        $idcate =  $_POST['idcat'];
        // validate input
        $valid = true;
        if (empty($nom_tramite)) {
             $msg .= 'Please enter Name';
            $valid = false;
        }
         
         if (empty($idcate)) {
            $msg .=  'Please enter idcate';
            $valid = false;
        }    
        // update data
        if ($valid) {
            $pdo = conexion::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " UPDATE categoria set nombre_cat = ?,tipo_cat =?  WHERE id_cat = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nom_tramite,$idcate, $id_tramite));
            conexion::disconnect();
            header("Location: listar.php");
        }
    } else {
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM categoria where id_cat = ? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_tramite));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nom_tramite = $data['nombre_cat'];
        //$descripcion = $data['descripcion'];
        $idcatei = $data['tipo_cat'];
       //$imagen = $data['url_producto'];
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
            <form role="form" action="editar.php?id_tramite=<?php echo $id_tramite?>" id="frm-tramite"  method="post" enctype="multipart/form-data" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" name="nom_tramite" value="<?php echo !empty($nom_tramite)?$nom_tramite:'';?>" class="form-control" placeholder="Nombre de la categoria.">
                </div>
            <!--<label class="col-sm-3 control-label">Categoria</label>-->
            <select name="idcat" class="form-control" style="visibility:hidden" required="true">
            <option value="PRODUCTO">PRODUCTO</option>
          </select>  
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                 <button type="submit" name="actualizar" class="btn btn-success "><i class="fa fa-rotate-left"></i> Actualizar</button>
                 <a href="listar.php" class="btn btn-default"><i class="fa fa-mail-reply"></i>Regresar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Todas las productos</h3>
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
