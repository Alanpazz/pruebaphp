<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$Id = $_GET['id'];
			$Nombres = $_POST['nombre'];
			$Emails = $_POST['email'];
			$Sexo = $_POST['sex'];
			$Area_id = $_POST['Area'];
			$Boletin = $_POST['chkboletin'];
			$Descripcion = $_POST['txtarea'];

			$sql = "UPDATE empleados SET nombre = '$Nombres', Emails = '$email', sexo = '$Sexo', area_id = '$Area_id', boletin = '$Boletin' , descripcion = '$Descripcion' WHERE idEMp = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Empleado actualizado correctamente' : 'No se puso actualizar empleado';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: index.php');

?>