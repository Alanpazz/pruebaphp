<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Editar Empleado</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="EditarRegistro.php?id=<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombre Completo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="txtnom" value="<?php echo $row['nombre']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Correo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="txtmail" value="<?php echo $row['email']; ?>">
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
						<label class="control-label" style="position:relative; top:7px;">Descripcion::</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Descripcion" value="<?php echo $row['descripcion']; ?>">
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
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Borrar -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Borrar Empleado</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrarlo?</p>
				<h2 class="text-center"><?php echo $row['nombre'].' '.$row['email']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>