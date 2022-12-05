<?php
	$id = $_POST['pasi'];
	include ('databaseconnect.php');
	$sql = "UPDATE pasillo SET cantidad_reportes=0 WHERE Id_pasillo=$id";

	if ($conn->query($sql) === TRUE) {
		$conn->query($sqli);
		header("Location: indexAdmin.html?creado=1");
	  } else {
		echo "Error updating record: " . $conn->error;
	  }
	  
	  $conn->close();

?>