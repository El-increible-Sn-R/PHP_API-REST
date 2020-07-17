<?php 

//headers:
header('access-control-allow-origin: *');
header('content-type: application/json');
//inicializamos nuestra api
include_once('../core/initialize.php');
//cree una instancias de la clase ventas
$ventas=new ventas($db);

$ventas->ventas_id=isset($_GET['id'])? $_GET['id']:die();

// die(var_dump($ventas));

$ventas->read_single();
$post_arr=array(
			'ventas_id'=>$ventas->ventas_id,
			'ventas_nroPedido'=>$ventas->ventas_nroPedido,
			'ventas_cliente_nombre'=>$ventas->ventas_cliente_nombre,
			'ventas_moneda'=>$ventas->ventas_moneda,
			'ventas_importe'=>$ventas->ventas_importe,
			'ventas_marca'=>$ventas->ventas_marca,
			'ventas_fechatransaccion'=>$ventas->ventas_fechatransaccion,
			'ventas_fechaliquidacion'=>$ventas->ventas_fechaliquidacion,
			'ventas_estado'=>$ventas->ventas_estado,
			'ventas_codigo_comercio'=>$ventas->ventas_codigo_comercio,
			'ventas_idtransaccion_visanet'=>$ventas->ventas_idtransaccion_visanet,
			'ventas_cliente_email'=>$ventas->ventas_cliente_email,
			'ventas_codigo_accion'=>$ventas->ventas_codigo_accion,
			'ventas_motivo_denegacion'=>$ventas->ventas_motivo_denegacion,
			'ventas_fechaanulacion'=>$ventas->ventas_fechaanulacion,
			'ventas_nombre_comercio'=>$ventas->ventas_nombre_comercio,
			'ventas_cliente_documento'=>$ventas->ventas_cliente_documento,
			'ventas_cliente_tarjeta'=>$ventas->ventas_cliente_tarjeta,
			'ventas_codigo_autorizacion'=>$ventas->ventas_codigo_autorizacion,
			'ventas_codigo_eci'=>$ventas->ventas_codigo_eci,
			'ventas_canal'=>$ventas->ventas_canal
);
//make json
print_r(json_encode($post_arr));

?>