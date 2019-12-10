<!DOCTYPE html>
<html lang="es">
<head>
<title>LOGIN - ADMINISTRADOR</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
<body>
    <div class="loginbox">
    <img src="Logo.png" class="avatar">
        <h1>Durazno Admin</h1>
        <form id="login" method="post"  action="login.php" class="well" >
            <p>Usuario</p>
            <input type="email" name="email" placeholder="Ingrese su Email" required>
            <p>Contraseña</p>
            <input type="password" name="password" placeholder="Contraseña" required>
            
            <!--<input type="submit" name="" value="Login">-->
            <button type="submit"  class="btn btn-primary btn-block" name="login">Acceder</button>
            <?php  
			 
			if ( !empty($_GET['error'])) {   
				echo "<center><p style='color:#fff;font-size:12px;margin-top:20px;'>Usuario o Contraseña incorrecto</p></center>";
            }
			
			?>
        </form>
        
    </div>
</body>
</head>
</html>