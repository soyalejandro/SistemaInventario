<br>
<form id="frmAlta">
	<div class="row">
		<div class="container-fluid">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
				<div class="form-group">
					<label for="nombre">Nombre de la Persona:</label>
					<input type="text" id="nombre" class="form-control " name="nombre" autofocus="" required="" placeholder="Escribe el nombre">
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
				<div class="form-group">
					<label for="paterno">Apellido Paterno:</label>
					<input type="text" id="paterno" class="form-control " name="paterno" required="" placeholder="Escribe el apellido">
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
				<div class="form-group">
					<label for="materno">Apellido Materno:</label>
					<input type="text" id="materno" class="form-control " name="materno" required="" placeholder="Escribe el apellido">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="form-group">
					<label for="direccion">Dirección:</label>
					<input type="text" id="direccion" class="form-control " name="direccion" required="" placeholder="Escribe la dirección completo">
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				<div class="form-group">
					<label for="sexo">Sexo:</label>
					<select  id="sexo" class="select2 form-control " name="sexo" style="width: 100%">
						<option value="M">Masculino</option>
						<option value="F">Femenino</option>
					</select>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				<div class="form-group">
					<label for="Telefono">Teléfono:</label>
					<input type="text" id="telefono" class="form-control " name="telefono" required="" placeholder="Escribe el telefono">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="form-group">
					<label for="fecha_nac">Fecha de Nacimiento:</label>
					<input type="date" id="fecha_nac" class="form-control " name="fecha_nac" required="" placeholder="yyyy-mm-dd" value="<?php echo $fecha;?>">
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
				<div class="form-group">
					<label for="correo">Correo:</label>
					<input type="text" id="correo" class="form-control " name="correo" required="" placeholder="email">
				</div>
			</div>
			<hr class="linea">
		</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Guardar Información" onclick="actualiza_datos()">										
			</div>
		</div>
	
</form>
<script src="../js/inicio.js"></script>

