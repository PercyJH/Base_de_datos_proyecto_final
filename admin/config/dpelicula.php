<?php 
require_once 'conexion.php';


//inicializo el criterio y recibo cualquier cadena que se desee buscar 
$criterio = ""; 
if(isset($_GET["search"])){
if ($_GET["search"]!=""){ 
    $txt_criterio = $_GET["search"]; 
    $criterio = " where nombre_pro like '%" . $txt_criterio . "%' "; 

}

}

if(isset($_GET["cat"])){
if ($_GET["cat"]!=""){ 
    $txt_criterio = $_GET["cat"]; 
    $criterio = " where categoria_idcate = " . $txt_criterio . " "; 

}

}

if(isset($_GET["cat"]) && isset($_GET["search"])){
if ($_GET["cat"]!="" && $_GET["search"]!="" ){ 
    $op1 = $_GET["cat"]; 
    $op2 = $_GET["search"]; 
    $criterio = " where  (categoria_idcate = ". $op1 .") and  (nombre_pro like '%" .$op2. "%') "; 

}

}




   $pdo = conexion::connect();
    $sqlc="SELECT COUNT(*)   from pelicula ".$criterio ;
    $stmt=$pdo->prepare($sqlc);
    $filas=$stmt->execute();
    $filas=$stmt->fetchColumn();
     $num_total_registros =$filas;
//Limito la busqueda 
$TAMANO_PAGINA = 16; 

//examino la página a mostrar y el inicio del registro a mostrar 

$pagina =1;



if(isset($_GET["pagina"])){
    $pagina = $_GET["pagina"];
}
if (!$pagina) { 
    $inicio = 0; 
    $pagina=1; 
} 
else { 
    $inicio = ($pagina - 1) * $TAMANO_PAGINA; 
}

//calculo el total de páginas 
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 

//next y prev





?>