<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO empleado (nombre, email, sexo, area_id, boletin,descripcion) VALUES (:Nombre, :Email, :Sexo, :Area_id, :Boletin, :Descripcion)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':Nombre' => $_POST['txtnom'] , ':Email' => $_POST['txtmail'] , ':Sexo' => $_POST['sex'], ':Area_id' => $_POST['Area'], ':Boletin' => $_POST['chkboletin'], ':Descripcion' => $_POST['txtarea'])) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: index.php');
	
?>