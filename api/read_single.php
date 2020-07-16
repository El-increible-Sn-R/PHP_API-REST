<?php 

//headers:
header('access-control-allow-origin: *');
header('content-type: application/json');
//inicializamos nuestra api
include_once('../core/initialize.php');
//cree una instancias de la clase ventas
$ventas=new ventas($db);

$ventas->ventas_id=isset($_GET['id'])? $_GET['id']:die();
$ventas->read_single();
$post_arr=array(
			'ventas_id'=>$ventas_id,
			'ventas_nroPedido'=>$ventas_nroPedido,
			'ventas_cliente_nombre'=>$ventas_cliente_nombre,
			'ventas_moneda'=>$ventas_moneda,
			'ventas_importe'=>$ventas_importe,
			'ventas_marca'=>$ventas_marca,
			'ventas_fechatransaccion'=>$ventas_fechatransaccion,
			'ventas_fechaliquidacion'=>$ventas_fechaliquidacion,
			'ventas_estado'=>$ventas_estado,
			'ventas_codigo_comercio'=>$ventas_codigo_comercio,
			'ventas_idtransaccion_visanet'=>$ventas_idtransaccion_visanet,
			'ventas_cliente_email'=>$ventas_cliente_email,
			'ventas_codigo_accion'=>$ventas_codigo_accion,
			'ventas_motivo_denegacion'=>$ventas_motivo_denegacion,
			'ventas_fechaanulacion'=>$ventas_fechaanulacion,
			'ventas_nombre_comercio'=>$ventas_nombre_comercio,
			'ventas_cliente_documento'=>$ventas_cliente_documento,
			'ventas_cliente_tarjeta'=>$ventas_cliente_tarjeta,
			'ventas_codigo_autorizacion'=>$ventas_codigo_autorizacion,
			'ventas_codigo_eci'=>$ventas_codigo_eci,
			'ventas_canal'=>$ventas_canal
);
//make json
print_r(json_encode($post_arr));

?>