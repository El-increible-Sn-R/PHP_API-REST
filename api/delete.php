<?php  

//headers:
header('access-control-allow-origin: *');
header('content-type: application/json');
header('access-control-allow-methods:DELETE');
header('access-control-allow-headers:access-control-allow-headers,content-type,access-control-allow-methods,authorization,x-requested-with');
//inicializamos nuestra api
include_once('../core/initialize.php');
//cree una instancias de la clase ventas
$ventas=new ventas($db);
//obtenemos los datos de post sin procesar
$data=json_decode(file_get_contents("php://input"));
// var_dump($data);
$ventas->ventas_id=$data->ventas_id;
//eliminar la venta
if ($ventas->delete()) {
	echo json_encode( array('message' => 'Post deleted')  );
}else{
	echo json_encode( array('message' => 'Post not deleted')  );
}

?>