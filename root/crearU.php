<?php
	// Pasamos las variables
	$codigo = $_POST['code'];
	$nombre = $_POST['name'];
	$apellido1 = $_POST['ap'];
	$apellido2 = $_POST['am'];
	$telef = $_POST['tel'];
	$correo = $_POST['mail'];
	if($_POST['ro']==1){
		$role = "Alumno";
	} else{
		$role = "Maestro";
	}
	$contra1 = $_POST['pass'];
	$contra2 = $_POST['pass2'];

	//COMPROBAMOS DATOS Y LOS INSERTAMOS
	if($contra1==$contra2){
		include ('databaseconnect.php');
		$sql = "INSERT INTO usuario (Nrc, Nombre_usuario, A_paterno, A_materno, Telefono, Correo, Rol, contra) 
			VALUES ('$codigo', '$nombre','$apellido1', '$apellido2', '$telef', '$correo','$role', '$contra1')";
		$a = "INSERT INTO alumno (NRC_alumno) VALUES ('$codigo')";
		if (mysqli_query($conn, $sql)) {
			if($role=='Alumno'){
				mysqli_query($conn, $a);
			}
      		header("Location: indexUserNuevo.html?creado=1");
			die();
			mysqli_close($conn);
		} else {
      		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}else{
		echo'<script>alert("La contraseña no es la misma")</script>';
		header( "refresh:3;url=index.html" );
	}

?>