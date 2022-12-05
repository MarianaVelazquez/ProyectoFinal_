<!DOCTYPE HTML>

<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<title>CUCEI-GO</title>
	</head>
	<body>
		<!-- REPORTE -->
		<div class="ventana" id="vent">
			<form  action="reportar.php" method="POST">
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
		<!-- ACABA REPORTE-->

		<div id="General">
			<div class="nav">
				<ul>
					<a href="indexUser.html"><li class="Menu">Inicio</li></a>
					<a href="index.html"><li class="Menu">Cerrar sesión</li></a>
					<a href="javascript:abrir()"><li class="Menu">Reportar</li></a>
				</ul>
				<h1>CUCEI_GO!</h1>
			</div>
			<!-- Contenido de la página -->
			<div id="Contenedor">
				<div id="Contenido">
					<form  action="datosUser.php" method="POST" >
 			               <select class="pasi" name="pasillo" onclick="javascript:info()">
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
							<input type="submit" value="Ver pasillo" style=" width=30%; margin: 0;margin-top:5px;"></center>
            			</form>
					<div class="pa">
						<img src="pasillo.jpg" align="right" alt="fotografia del pasillo" style="height: 350px; margin-top:0;">
						<?php
						if ( isset($_POST['pasillo']) ) {
							$y = $_POST['pasillo'];
							include ('databaseconnect.php');
							$re = $conn->query('SELECT * FROM pasillo');
							$pasillo = $re->fetch_object();
							while ($pasillo != null){
								if($pasillo->Id_pasillo == $y){
									echo"
										<h2>$pasillo->Nombre</h2><hr>
										<b><p>Ubicacion: </p></b><p>	$pasillo->Ubicacion</p>
										<b><p>ESTADO:</p></b>";
										if($pasillo->Estado == 0){
											echo"<p>      Sin problemas</p>";
										}else{
											echo"<p>      El pasillo está bloqueado</p>";
										}
								}
								    $pasillo = $re->fetch_object();
							}

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