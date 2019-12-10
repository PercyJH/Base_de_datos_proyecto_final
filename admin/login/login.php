<?php
session_start();
include '../config/conexion.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $res=   userLogin($email, $password);
    if($res=='exitoso'){
		// = $_POST['tipo_usuario'];
		$_SESSION['dato']=$_POST['email'];
			header('location:../pages/index/index.php'); 
	}
        else
            if($res=='invalido'){header('location: index.php?error="error"');
	    }
        
        
}
function userLogin($usernameEmail,$password)
{    $retorno ='';
try{
    $db = conexion::connect();
    //(email=:usernameEmail or email=:usernameEmail)
    
    $stmt = $db->prepare("SELECT id_user,tipo_usuario FROM usuario WHERE email=:usernameEmail  AND  password=:hash_password");
    $stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
    $stmt->bindParam("hash_password", $password,PDO::PARAM_STR) ;
    $stmt->execute();
    $count=$stmt->rowCount();
    $data=$stmt->fetch(PDO::FETCH_OBJ);
    $db = null;
    if($count)
    {   //crear sesion codigo
        $_SESSION['codigo']=$data->id_admin; // Storing user session value
        //return true;
        $retorno='exitoso';
    }
    else
    {
        //return false;
        $retorno='invalido';
        
    }
}
catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}';
    $retorno='error';
}

return $retorno;

}

?>