<?php 
// Conexion a la base de datos
include'../conexion/conexion.php';
// Codificacion de lenguaje
mysql_query("SET NAMES utf8");
// Consulta a la base de datos
$consulta=mysql_query("SELECT 
					   id_usuario,
					   usuario,
					   contra, 
					   activo,
					   (SELECT personas.nombre FROM personas WHERE personas.id_persona=usuarios.id_persona) AS nAlumno,
					   (SELECT personas.ap_paterno FROM personas WHERE personas.id_persona=usuarios.id_persona) AS pAlumno,
					   (SELECT personas.ap_materno FROM personas WHERE personas.id_persona=usuarios.id_persona) AS mAlumno,
						 (SELECT personas.sexo FROM personas WHERE personas.id_persona=usuarios.id_persona) AS sexo
					  	 FROM usuarios
					   		WHERE activo = 1  ",$conexion) or die (mysql_error());
// $row=mysql_fetch_row($consulta)
 ?>
				            <div class="table-responsive">
				                <table id="example1" class="table table-responsive table-condensed table-bordered table-striped">

				                    <thead align="center">
				                      <tr class="info" >
				                        <th>#</th>
				                        <th>Nombre</th>
				                        <th>Usuario</th>
				                        <th>Verificación</th>
				                        <th>Subir/Acualizar</th>
				                      </tr>
				                    </thead>

				                    <tbody align="center">
				                    <?php 
				                    $n=1;
				                    while ($row=mysql_fetch_row($consulta)) {
															$idUsuario          = $row[0];	
															$activo            = $row[4];
															$nomUsuarioCompleto = $row[5].' '.$row[6].' '.$row[4];
															$usuario        = $row[1];
															$sexo              = $row[7];

															$foto ='../images/'.$usuario.'.jpg';
															if (file_exists($foto)){
																$Icono="<i class='fas fa-check-circle fa-lg'></i>";
																$imagen=$foto;
														 }else{
																$Icono="<i class='fas fa-times-circle fa-lg'></i>";
																if ($sexo=='M') {
																	$imagen='../images/hombre.jpg';
																}else{
																	$imagen='../images/mujer.jpg';
																}
														 }
														?>

				                      <tr>
				                        <td >
				                          <p id="<?php echo "tConsecutivo".$n; ?>">
				                          	<?php echo "$n"; ?>
				                          </p>
				                        </td>
				                        <td>
										   <p id="<?php echo "tnomUsuarioCompleto".$n; ?>" >
				                          	<?php echo $nomUsuarioCompleto; ?>
				                          </p>
				                        </td>
				                        <td>
										   <p id="<?php echo "tusuario".$n; ?>">
				                          	<?php echo $usuario; ?>
				                          </p>
				                        </td>	
				                        <td>
											<a class="sb btn btn-login btn-sm" href="<?php echo $imagen ?>" title="<?php echo $nomUsuarioCompleto ?>" ><?php echo $Icono ?></a>

				                        </td>
				                        <td>
											<button class="btn btn-login btn-sm" onclick="abrirModalSubir('<?php echo $usuario ?> ')">
												<i class="fas fa-upload"></i>
											</button>
				                        </td>
				                      </tr>
				                      <?php
				                      $n++;
				                    }
				                     ?>

				                    </tbody>

				                    <tfoot align="center">
				                      <tr class="info">
										<th>#</th>
				                        <th>Nombre</th>
				                        <th>Usuario</th>
				                        <th>Verificación</th>
				                        <th>Subir/Acualizar</th>
				                      </tr>
				                    </tfoot>
				                </table>
				            </div>
			
      <script type="text/javascript">
        $(document).ready(function() {
              $('#example1').DataTable( {
                 "language": {
                         // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                          "url": "../plugins/datatables/langauge/Spanish.json"
                      },
                 "order": [[ 0, "asc" ]],
                 "paging":   true,
                 "ordering": true,
                 "info":     true,
                 "responsive": true,
                 "searching": true,
                 stateSave: false,
                  dom: 'Bfrtip',
                  lengthMenu: [
                      [ 10, 25, 50, -1 ],
                      [ '10 Registros', '25 Registros', '50 Registros', 'Todos' ],
                  ],
                 columnDefs: [ {
                      // targets: 0,
                      // visible: false
                  }],
                  buttons: [

                  ]
              } );
          } );
      </script>
      <script>
            $(".interruptor").bootstrapToggle('destroy');
            $(".interruptor").bootstrapToggle();
      </script>

<script>

$("#image").fileinput({
		theme: 'fas',
		language: 'es',
		showUpload: false,
		showCaption: true,
		showCancel: false,
		showRemove: true,
		browseClass: "btn btn-login",
		fileType: "jpg",
		allowedFileExtensions: ['jpg'],
		overwriteInitial: false,
		maxFileSize: 3000,
		maxFilesNum: 10
});

</script>

<script type="text/javascript" src="../plugins/Smoothbox-master/js/smoothbox.min.js"></script>