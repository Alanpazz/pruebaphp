<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Agregar Empleado</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="AgregarNuevo.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombre Completo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="txtnom" placeholder="Nombre completo del empleado">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Correo Electronico:</label>
					</div>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="txtmail" placeholder="Correo Electronico">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Sexo:</label>

					</div>
					<div class="col-sm-10">
						<input type="radio" name="sex" value="M">Masculino <br>
                    <input type="radio" name="sex" value="F">Femenino
               			
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Area:</label>
					</div>
					<div class="col-sm-10">
						
							<select class="form-select" name="Area">
                        <option value="0">Seleccione:</option>
                        <?php

                        include_once('../model/dbconect.php');

                        $database = new Connection();
                        $db = $database->open();
                        try {
                            $sql = 'SELECT * FROM areas';
                            foreach ($db->query($sql) as $row) {

                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                echo '<option value="' . $row[id] . '">' . $row[nombre] . '</option>';
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
						<label class="control-label" style="position:relative; top:7px;">Descripcion:</label>
					</div>
					<div class="col-sm-10">
						<textarea class="form-control" name="txtarea"></textarea>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;"></label>
					</div>
					<div class="col-sm-10">
						<input type="checkbox" name="chkboletin" value="1" checked="checked" id="chkboletin">  Deseo recibir boletin informativo
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Roles:</label>
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
<script>
        $('#chkboletin').on('change', function() {
            this.value = this.checked ? 1 : 0;

        }).change();
    </script>