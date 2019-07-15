<?php
    include("../conexion/conexion.php");
    include("../sesiones/verificar_sesion.php");
    $id_usuario =$_SESSION["idUsuario"]; 

    $consulta=mysql_query("SELECT usuarios.id_usuario, 
                                  personas.nombre, 
                                  personas.ap_paterno,
                                  personas.ap_materno,
                                  personas.direccion,
                                  personas.sexo, 
                                  personas.telefono,
                                  personas.fecha_nacimiento, 
                                  personas.correo,
                                  personas.id_persona,
                                  usuarios.pvez 
              FROM usuarios 
              INNER JOIN personas ON usuarios.id_persona = personas.id_persona
              WHERE usuarios.id_usuario='$id_usuario'",$conexion) or die (mysql_error());
              $row = mysql_fetch_array($consulta);
              $array  = array( 
                              $row[1],// $nombre 
                              $row[2],// $paterno 
                              $row[3],  //$materno 
                              $row[4],//$direccion  
                              $row[5], // $sexo   
                              $row[6], //$telefono
                              $row[7],  // $fecha_nac 
                              $row[8] //$correo 
                              );


                                         
                                        
                                        
 echo json_encode($array);
    
 ?>