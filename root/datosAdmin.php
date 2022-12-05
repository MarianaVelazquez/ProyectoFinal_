<!DOCTYPE HTML>

<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<title>CUCEI-GO</title>
	</head>
	<body>
		<!-- LIMPIAR -->
		<div class="ventana" id="vent">
			<form  action="limpiar.php" method="POST">
				<div id="cerrar">
					<a href="javascript:cerrar()"><img src="salir.png"></a>
				</div>
				<br>
                <form  action="datosUser.php" method="POST" >
 			        <select class="pasi" name="pasi" onclick="javascript:info()" style="margin: right 50px;">
						<?php
							$x=1;
							include ('databaseconnect.php');
							$res = $conn->query('SELECT * FROM pasillo');
							$pasillos = $res->fetch_object();
							while ($pasillos != null){
   								echo"<option value=$x>$pasillos->Nombre</option>";
   		 						$pasillos = $res->fetch_object();
		 						$x=$x+1;
							}
						?>
					</select>
					<center>
					<input type="submit" value="Reportar" style="margin:0; width=30%; margin-top:5px;"></center>
            </form>
		</div>
		<!-- ACABA LIMPIAR-->

		<div id="General">
			<div class="nav">
				<ul>
					<a href="indexAdmin.html"><li class="Menu">Inicio</li></a>
					<a href="index.html"><li class="Menu">Cerrar sesión</li></a>
					<a href="javascript:abrir()"><li class="Menu">Limpiar</li></a>
				</ul>
				<h1>CUCEI_GO!</h1>
			</div>
			<!-- Contenido de la página -->
			<div id="Contenedor" style="overflow-y: scroll; max-height: 80%;">
				<div id="Contenido"  >
					<div class="pa" >
						<?php

							include ('databaseconnect.php');
							$re = $conn->query('SELECT * FROM pasillo');
							$pasillo = $re->fetch_object();
							while ($pasillo != null){
								echo"
									<h2>$pasillo->Nombre</h2><hr>
									<b><p>Ubicacion: </p></b><p>	$pasillo->Ubicacion</p>
									<b><p>Reportes: $pasillo->Cantidad_reportes</p></b>";
							    $pasillo = $re->fetch_object();
							}	
						?>
					</div>
					
				</div>
			</div>
			
		</div>
		<div class="footer">
				<h6> CUCEI-GO! | Todos los derechos reservados</h6>
		</div>
		
		<script>
			function abrir(){
				document.getElementById('vent').style.display="block";
			}
			function cerrar(){
				document.getElementById('vent').style.display="none";
			}

		</script>
	</body>

</html>