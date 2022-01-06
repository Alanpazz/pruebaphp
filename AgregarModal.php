<?php
include_once('dbconect.php'); ?>
<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Agregar Empleado</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form id="form-val" method="POST" action="AgregarNuevo.php" novalidate>
						<div class="alert alert-info">los campos con asteriscos(*) son obligatorios</div>
						<?php
						if (isset($error)) {
						?>
							<tr>
								<td id="error"><?php echo $error; ?></td>
							</tr>
						<?php
						}
						?>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Nombre Completo:*</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="valname" name="txtnom" placeholder="Nombre completo del empleado" value="<?php if (isset($txtnom)) {
																																							echo $txtnom;
																																						} ?>" <?php if (isset($code) && $code == 1) {
																																																		echo "autofocus";
																																																	}  ?> required />
							</div>


						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Correo Electronico:*</label>
							</div>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="txtmail" placeholder="Correo Electronico" value="<?php if (isset($email)) {
																																	echo $email;
																																} ?>" <?php if (isset($code) && $code == 2) {
																																												echo "autofocus";
																																											}  ?> required />
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Sexo:*</label>

							</div>
							<div class="col-sm-10">
								<input type="radio" name="sex" value="M" required>Masculino <br>
								<input type="radio" name="sex" value="F" required>Femenino

							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Area:*</label>
							</div>
							<div class="col-sm-10">

								<select class="form-select" name="Area" required>
									<option selected disabled value="">Seleccione:</option>
									<?php
									$database = new Connection();
									$db = $database->open();
									try {
										$sql = 'SELECT id, Nombre FROM areas';
										foreach ($db->query($sql) as $pow) {

											// En esta sección estamos llenando el select con datos extraidos de la base de datos.
											echo '<option value="' . $pow['id'] . '">' . $pow['Nombre'] . '</option>';
										}

									?>
									<?php
									} catch (PDOException $e) {
										echo "Hubo un problema en la conexión: " . $e->getMessage();
									}
									?>
								</select>



							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Descripcion:*</label>
							</div>
							<div class="col-sm-10">
								<textarea class="form-control" name="txtarea" required></textarea>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;"></label>
							</div>
							<div class="col-sm-10">
								<input type="checkbox" name="chkboletin" value="1" checked="checked" id="chkboletin" required> Deseo recibir boletin informativo
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Roles:*</label>
							</div>
							<div class="col-sm-10">
								<input type="checkbox" name="chkprd" value="5">Profesional de Proyectos- Desarrollador <br>
								<input type="checkbox" name="chkge" value="8">Gerente estrategico <br>
								<input type="checkbox" name="chkAa" value="7">Auxiliar administrativo
							</div>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
				</form>
			</div>

		</div>
	</div>
</div>
<script src="js/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<!--script para la validar datos en el cliente-->
<script src="js/val.js"></script>
<script>
	//script para agregar el boletin si y no
	$('#chkboletin').on('change', function() {
		this.value = this.checked ? 1 : 0;

	}).change();
</script>