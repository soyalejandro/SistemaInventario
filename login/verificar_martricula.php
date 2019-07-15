<?php
	include("../conexion/conexion.php");
	
	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	$matricula = $_POST['matricula'];
	$cadena = mysql_query("SELECT
							id_alumno,
							CONCAT(
								personas.nombre,
								' ',
								personas.ap_paterno,
								' ',
								personas.ap_materno
							),
							no_control,
							(
								SELECT
									nombre
								FROM
									carreras
								WHERE
									carreras.id_carrera = alumnos.id_carrera
							),
							personas.sexo
						FROM alumnos
						INNER JOIN personas ON personas.id_persona = alumnos.id_persona
						WHERE alumnos.activo = '1'
						AND no_control = '$matricula'",$conexion);
	$row = mysql_fetch_array($cadena);
	$existe = mysql_num_rows($cadena);
	if($existe != 0){
		$foto ='../images/'.$row[2].'.jpg';
		if (file_exists($foto)){
			$imagen=$foto;
		}else{
			if ($row[4]=='M') {
				$imagen='../images/hombre.jpg';
			}else{
				$imagen='../images/mujer.jpg';
			}
		}
		$cadena_entrada = mysql_query("SELECT id_registro, fecha_ingreso, hora_ingreso 
		FROM registros WHERE id_alumno = '$row[0]' AND fecha_ingreso = '$fecha' AND activo = '1'",$conexion);
		$existe_entrada = mysql_num_rows($cadena_entrada);
		$row_entrada = mysql_fetch_array($cadena_entrada);
		
		if($existe_entrada == 0){
			$cadena_insertar = "INSERT INTO registros (id_alumno, matricula, fecha_ingreso, hora_ingreso, activo,
				fecha_actualiza, hora_actualiza)
				VALUES('$row[0]','$matricula','$fecha','$hora','1','$fecha','$hora')";
			$texto = "Bienvenido(a)";
		}else{
			$cadena_insertar = "UPDATE registros SET fecha_salida = '$fecha', hora_salida = '$hora',
			 fecha_actualiza = '$fecha', hora_actualiza = '$hora', activo = '2' WHERE id_registro = '$row_entrada[0]'";
			$texto = "Vuelva Pronto";
		}
		$consulta = mysql_query($cadena_insertar,$conexion);

		$array = array($row[0],$row[1],$row[2],$row[3],$imagen,$texto);
		echo json_encode($array);
	}else{
		echo "no";
	}
?>