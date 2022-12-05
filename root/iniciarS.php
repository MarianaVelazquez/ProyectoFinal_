<?php
	//Obtiene los datos ingresados
	$codigo = $_POST['cod'];
	$contra1 = $_POST['pas'];
	//Obtiene los datos de referencia
	include ('databaseconnect.php');
	$res = $conn->query('SELECT * FROM usuario');
	$user = $res->fetch_object();
	//Comprueba los datos
	while ($user != null){
		if($user->NRC == $codigo){
			if($user->contra == $contra1){
				if($user->Rol == "Admin"){
					header("Location: indexAdmin.html");//Relocaliza la página
					die();
					mysqli_close($conn);//cierra la conexión
				}else{
					header("Location: indexUser.html?id='$user->Id_usuario");//Relocaliza la página
					die();
					mysqli_close($conn);//cierra la conexión
				}
			}
		}
   		$user = $res->fetch_object();
	}
	echo'<script> alert("Contraseña o usuario incorrecto") </script>';
	header( "refresh:1;url=index.html" );

?>

<!--  -->