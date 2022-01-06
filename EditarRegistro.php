<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			//Obtenemos los datos con el 'id' para realizar la actualización
			$Id = $_GET['id'];
			$Nombres = $_POST['txtnom'];
			$Emails = $_POST['txtmail'];
			$Sexo = $_POST['sex'];
			$Area_id = $_POST['Area'];
			$Descripcion = $_POST['Descripcion'];
			$Boletin = $_POST['chkboletin'];
			

			$sql = "UPDATE empleado SET nombre = '$Nombres', email = '$Emails', sexo = '$Sexo', area_id = '$Area_id', boletin = '$Boletin' , descripcion = '$Descripcion' WHERE id= '$Id'";		
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Empleado actualizado correctamente' : 'No se pudo actualizar empleado';

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
