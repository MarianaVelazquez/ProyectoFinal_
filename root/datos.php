<!DOCTYPE HTML>

<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<title>CUCEI-GO</title>
	</head>
	<body>
		<!-- CREACION DE USUARIO -->
		<div class="ventana" id="vent">
			<form action="crearU.php" method="POST">
				<div id="cerrar">
					<a href="javascript:cerrar()"><img src="salir.png"></a>
				</div>
                <h2>Crear usuario</h2>
                <input type="text" placeholder="Ingresa tu codigo UDG..." name="code"/>
                <input type="text" placeholder="Ingresa tu nombre" name="name"/>
                <input type="text" placeholder="Ingresa tu apellido paterno..." name="ap"/>
                <input type="text" placeholder="Ingresa tu apellido materno..." name="am"/>
                <input type="text" placeholder="Ingresa tu numero de telefono..." name="tel"/>
                <input type="email" placeholder="Ingresa tu correo..." name="mail"/>
                <input type="password" placeholder="Ingresa tu contraseña..." name="pass"/>
                <input type="password" placeholder="Confirma tu contraseña" name="pass2"/>
                <select class="selector" name="ro">
   	            	<option value="0">Elegir rol</option>
                    <option value="1">Alumno</option>
                    <option value="2">Maestro</option>
                </select>
                <input type="submit" value="Crear cuenta"/>
             </form>
		</div>
		<!-- ACABA CREACION DE USUARIO -->

		<!-- INICIO DE SESION -->
		<div class="ventana" id="ventS">
			<form  action="iniciarS.php" method="POST">
				<div id="cerrar">
					<a href="javascript:cerrarS()"><img src="salir.png"></a>
				</div>
                <h2>Iniciar sesión</h2>
                <input type="text" placeholder="Ingresa tu codigo UDG..." name="cod">
                <input type="password" placeholder="Ingresa tu contraseña..." name="pas">
                <input type="submit" value="Ingresar">
            </form>
		</div>
		<!-- ACABA INICIO DE SESION -->

		<div id="General">
			<div class="nav">
				<ul>
					<a href="javascript:abrirS()"><li class="Menu">Iniciar sesión</li></a>
					<a href="javascript:abrir()"><li class="Menu">Crear cuenta </li></a>
					<a href="index.html"><li class="Menu">Inicio</li></a>
				</ul>
				<h1>CUCEI_GO!</h1>
			</div>
			<!-- Contenido de la página -->
			<div id="Contenedor">
				<div id="Contenido">
					<form  action="datos.php" method="POST" >
 			               <select class="pasi" name="pasillo" onclick="javascript:info()" style="margin: right 50px;">
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
						<input type="submit" value="Ver pasillo" style="margin-bottom:0; width=30%;">
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
				document.getElementById('ventS').style.display="none";
				document.getElementById('vent').style.display="block";
			}
			function cerrar(){
				document.getElementById('vent').style.display="none";
			}
			function abrirS(){
				document.getElementById('vent').style.display="none";
				document.getElementById('ventS').style.display="block";
			}
			function cerrarS(){
				document.getElementById('ventS').style.display="none";
			}
		</script>

	</body>

</html>