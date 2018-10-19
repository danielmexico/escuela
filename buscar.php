<?php
$estatus = $_GET['es'];
buscarDatos($estatus)
?>

<?php
function buscarDatos($estatus)
{
	include 'credenciales.php';
	$conn =new mysql($host_name, $user_name, $password, $database);
	
	if($conn->connect_error){
		die('<p>Error al conectar con servidor MySQL: '.mysqli_connect_error().'</p>');
	}else{

	}

	if($estatus == "todos")
	{
		$sql = "SELECT * FROM clientes";
	}
	else
	{
		$sql = "SELECT * FROM clientes WHERE estatus = '$estatus";
	}

	$result = $conn->query($sql);

	while ($valores = mysqli_fetch_array($result))
	{

		$datos[]=array('ID'=>$valores[0], 'Nombre'=>$valores[1], 'Apellidos'=>$valores[2],
		 'Direccion'=>$valores[3], 'CP'=>$valores[4], 'Localidad'=>$valores[5], 
		 'Telefono'=>$valores[6], 'Email'=>$valores[7], 'Razon_Social'=>$valores[8], 
		 'RFC'=>$valores[9], 'Estatus'=>$valores[10,);
	}

	$myJSON = json_encode($datos);
	echo $myJSON;
	
	$conn->close();
}
?>