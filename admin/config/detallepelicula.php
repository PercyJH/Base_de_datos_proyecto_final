<?php
    require_once 'conexion.php';
 
    $id_pelicula = null;
    if ( !empty($_GET['id_pelicula'])) {
        $id_pelicula = $_REQUEST['id_pelicula'];
    }
     
    if ( null==$id_pelicula ) {
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
            $sql = " UPDATE pelicula set nombre_pel = ?, descripcion = ?, director = ?, tiempo = ?,disponible = ?,url_pelicula=?, sub = ?, dob = ?,apto=?,categoria_idcate =?  WHERE id_pel = ?";

            $q = $pdo->prepare($sql);
            $q->execute(array($nom_tramite,$descripcion,$director,$tiempo,$disponible,$imagen,$sub,$dob,$apto, $idcate, $id_pelicula));
            conexion::disconnect();
            header("Location: listar.php");
            
        }
     else {
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM pelicula where id_pel = ? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_pelicula));
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