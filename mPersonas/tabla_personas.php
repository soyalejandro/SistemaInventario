<?php 
    // Conexion a la base de datos
    include'../conexion/conexion.php';

    // Codificacion de lenguaje
    mysql_query("SET NAMES utf8");

    // Consulta a la base de datos
    $consulta=mysql_query("SELECT
                                id_persona,
                                activo,
                                CONCAT(ap_paterno,' ',ap_materno,' ',nombre) AS Persona,
                                sexo,
                                direccion,
                                telefono,
                                fecha_nacimiento,
                                correo,
                                tipo_persona,
                                nombre,
                                ap_paterno,
                                ap_materno,
                                (SELECT nombre FROM sedes WHERE sedes.id_sede = personas.id_sede)
                            FROM
                                personas",$conexion) or die (mysql_error());
    // $row=mysql_fetch_row($consulta)

    $cuerpo = "";
    $numero = 1;
    $sexo = "";

    while ($row = mysql_fetch_array($consulta)) 
    {
        $sexo=($row[3]=='M')?'<span><i class="fas fa-male fa-lg"></i></span>':'<span><i class="fas fa-female fa-lg"></i></span>';
        $renglon = "
        {
        \"#\": \"$numero\",
        \"Nombre\": \"$row[2]\",
        \"Correo\": \"$row[7]\",
        \"Telefono\": \"$row[5]\",
        \"Genero\": \"$sexo\",
        \"Editar\": \"$row[5]\",
        \"Estatus\": \"$row[6]\"
        },";
        $cuerpo = $cuerpo.$renglon;
        $numero ++;
    }
    $cuerpo2 = trim($cuerpo,','); ///Quitarle la coma
    $tabla = "
        ["
        .$cuerpo2.
        "]
        ";
    echo $tabla;
 ?>