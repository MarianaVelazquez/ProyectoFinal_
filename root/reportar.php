<?php
	$id = $_POST['pasi'];
	include ('databaseconnect.php');
	//Inserta a la base de datos
	$sql = "UPDATE pasillo SET cantidad_reportes=cantidad_reportes+1 WHERE Id_pasillo=$id";
	$sqli = "INSERT into reporte (Fecha, Hora, Id_pasillo) VALUES (CURDATE(), CURTIME(), '$id')";

	if ($conn->query($sql) === TRUE) {
		$conn->query($sqli);
		header("Location: indexUser.html?creado=1");
	  } else {
		echo "Error updating record: " . $conn->error;
	  }
	  
	  $conn->close();

?>