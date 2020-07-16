<?php  

//headers:
header('access-control-allow-origin: *');
header('content-type: application/json');
header('access-control-allow-methods:PUT');
header('access-control-allow-headers:access-control-allow-headers,content-type,access-control-allow-methods,authorization,x-requested-with');
//inicializamos nuestra api
include_once('../core/initialize.php');
//cree una instancias de la clase ventas
$ventas=new ventas($db);
//obtenemos los datos de post sin procesar
$data=json_decode(file_get_contents("php://input"));

// die(var_dump($data));
$ventas->ventas_id										=$data->ventas_id;
$ventas->ventas_nroPedido							=(isset($data->ventas_nroPedido))?$data->ventas_nroPedido:null;
$ventas->ventas_cliente_nombre				=(isset($data->ventas_cliente_nombre))?$data->ventas_cliente_nombre:null;
$ventas->ventas_moneda								=(isset($data->ventas_moneda))?$data->ventas_moneda:null;
$ventas->ventas_importe								=(isset($data->ventas_importe))?$data->ventas_importe:null;
$ventas->ventas_marca									=(isset($data->ventas_marca))?$data->ventas_marca:null;
$ventas->ventas_fechatransaccion			=(isset($data->ventas_fechatransaccion))?$data->ventas_fechatransaccion:NULL;
$ventas->ventas_fechaliquidacion			=(isset($data->ventas_fechaliquidacion))?$data->ventas_fechaliquidacion:null;
$ventas->ventas_estado								=(isset($data->ventas_estado))?$data->ventas_estado:null;
$ventas->ventas_codigo_comercio				=(isset($data->ventas_codigo_comercio))?$data->ventas_codigo_comercio:null;
$ventas->ventas_idtransaccion_visanet	=(isset($data->ventas_idtransaccion_visanet))?$data->ventas_idtransaccion_visanet:null;
$ventas->ventas_cliente_email					=(isset($data->ventas_cliente_email))?$data->ventas_cliente_email:null;
$ventas->ventas_codigo_accion					=(isset($data->ventas_codigo_accion))?$data->ventas_codigo_accion:null;
$ventas->ventas_motivo_denegacion			=(isset($data->ventas_motivo_denegacion))?$data->ventas_motivo_denegacion:null;
$ventas->ventas_fechaanulacion				=(isset($data->ventas_fechaanulacion))?$data->ventas_fechaanulacion:null;
$ventas->ventas_nombre_comercio				=(isset($data->ventas_nombre_comercio))?$data->ventas_nombre_comercio:null;
$ventas->ventas_cliente_documento			=(isset($data->ventas_cliente_documento))?$data->ventas_cliente_documento:null;
$ventas->ventas_cliente_tarjeta				=(isset($data->ventas_cliente_tarjeta))?$data->ventas_cliente_tarjeta:null;
$ventas->ventas_codigo_autorizacion		=(isset($data->ventas_codigo_autorizacion))?$data->ventas_codigo_autorizacion:null;
$ventas->ventas_codigo_eci						=(isset($data->ventas_codigo_eci))?$data->ventas_codigo_eci:null;
$ventas->ventas_canal									=(isset($data->ventas_canal))?$data->ventas_canal:null;
// die(var_dump($ventas));

if ($ventas->update()) {
	echo json_encode( array('message' => 'Post update')  );
}else{
	echo json_encode( array('message' => 'Post not updated')  );
}

?>