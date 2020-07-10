<?php 

//headers:
header('access-control-allow-origin: *');
header('content-type: application/json');
//initialize our api
include_once('../core/initialize.php');
//instancie post
$ventas=new ventas($db);
//blog post query
$result=$ventas->read();
//get the row count
$num=$result->rowCount();

if ($num>0) {
	$post_arr=array();
	$post_arr['data']=array();
	while ($row=$result->fetch(pdo::FETCH_ASSOC)) {	
		extract($row);
		$post_item = array(
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
		array_push($post_arr['data'],$post_item);
	}
	//convert to json and output
	echo json_encode($post_arr);
}else{
	echo json_encode(array('message'=>'no ventas found'));
}

?>