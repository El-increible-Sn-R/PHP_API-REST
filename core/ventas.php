<?php 
// ini_set("xdebug.var_display_max_children", -1);
// ini_set("xdebug.var_display_max_data", -1);
// ini_set("xdebug.var_display_max_depth", -1);

class ventas {
	//db stuff
	private $conn;
	private $table = 'ventas';
	//post properties
	public $ventas_id;
	public $ventas_nroPedido;
	public $ventas_cliente_nombre;
	public $ventas_moneda;
	public $ventas_importe;
	public $ventas_marca;
	public $ventas_fechatransaccion;
	public $ventas_fechaliquidacion;
	public $ventas_estado;
	public $ventas_codigo_comercio;
	public $ventas_idtransaccion_visanet;
	public $ventas_cliente_email;
	public $ventas_codigo_accion;
	public $ventas_motivo_denegacion;
	public $ventas_fechaanulacion;
	public $ventas_nombre_comercio;
	public $ventas_cliente_documento;
	public $ventas_cliente_tarjeta;
	public $ventas_codigo_autorizacion;
	public $ventas_codigo_eci;
	public $ventas_canal;
	//constructor with db connection
	public function __construct($db)
	{
		$this->conn=$db;
	}
	// //-----------------------------------------VALIDACIONES Y OTROS----------------------
	// public function validateRequest(){

	// }

	// public function processApi(){

	// }

	// public function validateParameter($fieldName, $value, $dataType, $required){

	// }

	// public function throwError($code,$message){

	// }

	// public function returnResponce(){

	// }

	//-----------------------------------------GLORIOSO CRUD-----------------------------
	public function read(){
		$query='select 
			ventas_id,
			ventas_nroPedido,
			ventas_cliente_nombre,
			ventas_moneda,
			ventas_importe,
			ventas_marca,
			ventas_fechatransaccion,
			ventas_fechaliquidacion,
			ventas_estado,
			ventas_codigo_comercio,
			ventas_idtransaccion_visanet,
			ventas_cliente_email,
			ventas_codigo_accion,
			ventas_motivo_denegacion,
			ventas_fechaanulacion,
			ventas_nombre_comercio,
			ventas_cliente_documento,
			ventas_cliente_tarjeta,
			ventas_codigo_autorizacion,
			ventas_codigo_eci,
			ventas_canal
			from 
			'.$this->table;
		//prepare statement
		$stmt = $this->conn->prepare($query);
		//execute query
		$stmt->execute();

		return $stmt;
	}

	public function read_single(){
		$query='select 
			ventas_id,
			ventas_nroPedido,
			ventas_cliente_nombre,
			ventas_moneda,
			ventas_importe,
			ventas_marca,
			ventas_fechatransaccion,
			ventas_fechaliquidacion,
			ventas_estado,
			ventas_codigo_comercio,
			ventas_idtransaccion_visanet,
			ventas_cliente_email,
			ventas_codigo_accion,
			ventas_motivo_denegacion,
			ventas_fechaanulacion,
			ventas_nombre_comercio,
			ventas_cliente_documento,
			ventas_cliente_tarjeta,
			ventas_codigo_autorizacion,
			ventas_codigo_eci,
			ventas_canal
			from 
			'.$this->table;
		//prepare statement
		$stmt = $this->conn->prepare($query);
		//binding param
		$stmt->bindParam(1,$this->ventas_id);
		//execute the query
		$stmt->execute();

		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		$this->ventas_id=$row['ventas_id'];
		$this->ventas_nroPedido=$row['ventas_nroPedido'];
		$this->ventas_cliente_nombre=$row['ventas_cliente_nombre'];
		$this->ventas_moneda=$row['ventas_moneda'];
		$this->ventas_importe=$row['ventas_importe'];
		$this->ventas_marca=$row['ventas_marca'];
		$this->ventas_fechatransaccion=$row['ventas_fechatransaccion'];
		$this->ventas_fechaliquidacion=$row['ventas_fechaliquidacion'];
		$this->ventas_estado=$row['ventas_estado'];
		$this->ventas_codigo_comercio=$row['ventas_codigo_comercio'];
		$this->ventas_idtransaccion_visanet=$row['ventas_idtransaccion_visanet'];
		$this->ventas_cliente_email=$row['ventas_cliente_email'];
		$this->ventas_codigo_accion=$row['ventas_codigo_accion'];
		$this->ventas_motivo_denegacion=$row['ventas_motivo_denegacion'];
		$this->ventas_fechaanulacion=$row['ventas_fechaanulacion'];
		$this->ventas_nombre_comercio=$row['ventas_nombre_comercio'];
		$this->ventas_cliente_documento=$row['ventas_cliente_documento'];
		$this->ventas_cliente_tarjeta=$row['ventas_cliente_tarjeta'];
		$this->ventas_codigo_autorizacion=$row['ventas_codigo_autorizacion'];
		$this->ventas_codigo_eci=$row['ventas_codigo_eci'];
		$this->ventas_canal=$row['ventas_canal'];
	}

	public function create(){
		//create query
		//die(var_dump($this));
		$ventas_fechatransaccion=(is_null($this->ventas_fechatransaccion))?'':"\n".'ventas_fechatransaccion=:ventas_fechatransaccion,';
		$ventas_fechaliquidacion=(is_null($this->ventas_fechaliquidacion))?'':"\n".'ventas_fechaliquidacion=:ventas_fechaliquidacion,';
		$ventas_estado=(is_null($this->ventas_estado))?'':"\n".'ventas_estado=:ventas_estado,';
		$ventas_fechaanulacion=(is_null($this->ventas_fechaanulacion))?'':"\n".'ventas_fechaanulacion=:ventas_fechaanulacion,';

		$query='INSERT INTO '.$this->table.' set
			ventas_nroPedido=:ventas_nroPedido,
			ventas_cliente_nombre=:ventas_cliente_nombre,
			ventas_moneda=:ventas_moneda,
			ventas_importe=:ventas_importe,
			ventas_marca=:ventas_marca,'.
			$ventas_fechatransaccion.
			$ventas_fechaliquidacion.
			$ventas_estado.
			'ventas_codigo_comercio=:ventas_codigo_comercio,
			ventas_idtransaccion_visanet=:ventas_idtransaccion_visanet,
			ventas_cliente_email=:ventas_cliente_email,
			ventas_codigo_accion=:ventas_codigo_accion,
			ventas_motivo_denegacion=:ventas_motivo_denegacion,'.
			$ventas_fechaanulacion.
			'ventas_nombre_comercio=:ventas_nombre_comercio,
			ventas_cliente_documento=:ventas_cliente_documento,
			ventas_cliente_tarjeta=:ventas_cliente_tarjeta,
			ventas_codigo_autorizacion=:ventas_codigo_autorizacion,
			ventas_codigo_eci=:ventas_codigo_eci,
			ventas_canal=:ventas_canal';
		// die(var_dump($query));
		//prepare statement
		$stmt=$this->conn->prepare($query);
		//clear data
		$this->ventas_nroPedido=htmlspecialchars(strip_tags($this->ventas_nroPedido));
		$this->ventas_cliente_nombre=htmlspecialchars(strip_tags($this->ventas_cliente_nombre));
		$this->ventas_moneda=htmlspecialchars(strip_tags($this->ventas_moneda));
		$this->ventas_importe=htmlspecialchars(strip_tags($this->ventas_importe));
		$this->ventas_marca=htmlspecialchars(strip_tags($this->ventas_marca));
		$this->ventas_fechatransaccion=htmlspecialchars(strip_tags($this->ventas_fechatransaccion));
		$this->ventas_fechaliquidacion=htmlspecialchars(strip_tags($this->ventas_fechaliquidacion));
		$this->ventas_estado=htmlspecialchars(strip_tags($this->ventas_estado));
		$this->ventas_codigo_comercio=htmlspecialchars(strip_tags($this->ventas_codigo_comercio));
		$this->ventas_idtransaccion_visanet=htmlspecialchars(strip_tags($this->ventas_idtransaccion_visanet));
		$this->ventas_cliente_email=htmlspecialchars(strip_tags($this->ventas_cliente_email));
		$this->ventas_codigo_accion=htmlspecialchars(strip_tags($this->ventas_codigo_accion));
		$this->ventas_motivo_denegacion=htmlspecialchars(strip_tags($this->ventas_motivo_denegacion));
		$this->ventas_fechaanulacion=htmlspecialchars(strip_tags($this->ventas_fechaanulacion));
		$this->ventas_nombre_comercio=htmlspecialchars(strip_tags($this->ventas_nombre_comercio));
		$this->ventas_cliente_documento=htmlspecialchars(strip_tags($this->ventas_cliente_documento));
		$this->ventas_cliente_tarjeta=htmlspecialchars(strip_tags($this->ventas_cliente_tarjeta));
		$this->ventas_codigo_autorizacion=htmlspecialchars(strip_tags($this->ventas_codigo_autorizacion));
		$this->ventas_codigo_eci=htmlspecialchars(strip_tags($this->ventas_codigo_eci));
		$this->ventas_canal=htmlspecialchars(strip_tags($this->ventas_canal));

		//binding of parameters
		$stmt->bindParam(':ventas_nroPedido',$this->ventas_nroPedido);
		$stmt->bindParam(':ventas_cliente_nombre',$this->ventas_cliente_nombre);
		$stmt->bindParam(':ventas_moneda',$this->ventas_moneda);
		$stmt->bindParam(':ventas_importe',$this->ventas_importe);
		$stmt->bindParam(':ventas_marca',$this->ventas_marca);
		if ($this->ventas_fechatransaccion != null) {
			$stmt->bindParam(':ventas_fechatransaccion',$this->ventas_fechatransaccion);
		}
		if ($this->ventas_fechaliquidacion != null) {
			$stmt->bindParam(':ventas_fechaliquidacion',$this->ventas_fechaliquidacion);
		}
		if ($this->ventas_estado != null) {
			$stmt->bindParam(':ventas_estado',$this->ventas_estado);
		}
		$stmt->bindParam(':ventas_codigo_comercio',$this->ventas_codigo_comercio);
		$stmt->bindParam(':ventas_idtransaccion_visanet',$this->ventas_idtransaccion_visanet);
		$stmt->bindParam(':ventas_cliente_email',$this->ventas_cliente_email);
		$stmt->bindParam(':ventas_codigo_accion',$this->ventas_codigo_accion);
		$stmt->bindParam(':ventas_motivo_denegacion',$this->ventas_motivo_denegacion);
		if ($this->ventas_fechaanulacion != null) {
			$stmt->bindParam(':ventas_fechaanulacion',$this->ventas_fechaanulacion);
		}
		$stmt->bindParam(':ventas_nombre_comercio',$this->ventas_nombre_comercio);
		$stmt->bindParam(':ventas_cliente_documento',$this->ventas_cliente_documento);
		$stmt->bindParam(':ventas_cliente_tarjeta',$this->ventas_cliente_tarjeta);
		$stmt->bindParam(':ventas_codigo_autorizacion',$this->ventas_codigo_autorizacion);
		$stmt->bindParam(':ventas_codigo_eci',$this->ventas_codigo_eci);
		$stmt->bindParam(':ventas_canal',$this->ventas_canal);
		// die(var_dump($stmt));

		//execute the queery
		if ($stmt->execute()) {
			return true;
		}
		//print error if something goes wrong
		printf('error %s. \n',$stmt->error);
		return false;
	}

	public function update(){
		$NombreDeLaColumnaConOsinComa = array('ventas_nroPedido' => '', 
			'ventas_cliente_nombre' => '',
			'ventas_moneda' => '',
			'ventas_importe' => '',
			'ventas_marca' => '',
			'ventas_fechatransaccion' => '',
			'ventas_fechaliquidacion' => '',
			'ventas_estado' => '',
			'ventas_codigo_comercio' => '',
			'ventas_idtransaccion_visanet' => '',
			'ventas_cliente_email' => '',
			'ventas_codigo_accion' => '',
			'ventas_motivo_denegacion' => '',
			'ventas_fechaanulacion' => '',
			'ventas_nombre_comercio' => '',
			'ventas_cliente_documento' => '',
			'ventas_cliente_tarjeta' => '',
			'ventas_codigo_autorizacion' => '',
			'ventas_codigo_eci' => '',
			'ventas_canal' => '',
		);

		// $ventas_nroPedido='';
		// $ventas_cliente_nombre='';
		// $ventas_moneda='';
		// $ventas_importe='';
		// $ventas_marca='';
		// $ventas_fechatransaccion='';
		// $ventas_fechaliquidacion='';
		// $ventas_estado='';
		// $ventas_codigo_comercio='';
		// $ventas_idtransaccion_visanet='';
		// $ventas_cliente_email='';
		// $ventas_codigo_accion='';
		// $ventas_motivo_denegacion='';
		// $ventas_fechaanulacion='';
		// $ventas_nombre_comercio='';
		// $ventas_cliente_documento='';
		// $ventas_cliente_tarjeta='';
		// $ventas_codigo_autorizacion='';
		// $ventas_codigo_eci='';
		// $ventas_canal='';
		$contador=0;

		foreach ($this as $PropiedadDeLaClaseVenta => $NulloDataPost) {
			foreach ($NombreDeLaColumnaConOsinComa as $Columna => $ColumnaValue) {
				if ($PropiedadDeLaClaseVenta==$Columna) {
					if (is_null($NulloDataPost) == false) {
						if (1 <= $contador) {
							$NombreDeLaColumnaConOsinComa[$Columna]="\n".",$PropiedadDeLaClaseVenta=:$PropiedadDeLaClaseVenta";
						}else{
							$NombreDeLaColumnaConOsinComa[$Columna]="\n"."$PropiedadDeLaClaseVenta=:$PropiedadDeLaClaseVenta";
						}
						$contador=$contador+1;
						// die("$ColumnaValue"."-dentro del if");
					}	
				}
			}
			// if ($key!='conn' && $key!='table' && $key!='ventas_id') {
			// 	if (is_null($key) == false) {
			// 		if (1 <= $contador) {
			// 			$ventas_nroPedido="\n".",$key=:$key";
			// 		}else{
			// 			$ventas_nroPedido="\n"."$key=:$key";
			// 		}
			// 		$contador=$contador+1;
			// 		die("$ventas_nroPedido"."-dentro del if");
			// 	}			
			// 	// print_r("$key: $value"."</br>");
			// }
		}
		// die(var_dump($NombreDeLaColumnaConOsinComa));

		// if (is_null($this->ventas_nroPedido) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_nroPedido="\n".',ventas_nroPedido=:ventas_nroPedido';
		// 	}else{
		// 		$ventas_nroPedido="\n".'ventas_nroPedido=:ventas_nroPedido';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_cliente_nombre) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_cliente_nombre="\n".',ventas_cliente_nombre=:ventas_cliente_nombre';
		// 	}else{
		// 		$ventas_cliente_nombre="\n".'ventas_cliente_nombre=:ventas_cliente_nombre';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_moneda) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_moneda="\n".',ventas_moneda=:ventas_moneda';
		// 	}else{
		// 		$ventas_moneda="\n".'ventas_moneda=:ventas_moneda';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_importe) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_importe="\n".',ventas_importe=:ventas_importe';
		// 	}else{
		// 		$ventas_importe="\n".'ventas_importe=:ventas_importe';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_marca) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_marca="\n".',ventas_marca=:ventas_marca';
		// 	}else{
		// 		$ventas_marca="\n".'ventas_marca=:ventas_marca';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_fechatransaccion) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_fechatransaccion="\n".',ventas_fechatransaccion=:ventas_fechatransaccion';
		// 	}else{
		// 		$ventas_fechatransaccion="\n".'ventas_fechatransaccion=:ventas_fechatransaccion';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_fechaliquidacion) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_fechaliquidacion="\n".',ventas_fechaliquidacion=:ventas_fechaliquidacion';
		// 	}else{
		// 		$ventas_fechaliquidacion="\n".'ventas_fechaliquidacion=:ventas_fechaliquidacion';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_estado) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_estado="\n".',ventas_estado=:ventas_estado';
		// 	}else{
		// 		$ventas_estado="\n".'ventas_estado=:ventas_estado';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_codigo_comercio) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_codigo_comercio="\n".',ventas_codigo_comercio=:ventas_codigo_comercio';
		// 	}else{
		// 		$ventas_codigo_comercio="\n".'ventas_codigo_comercio=:ventas_codigo_comercio';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_idtransaccion_visanet) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_idtransaccion_visanet="\n".',ventas_idtransaccion_visanet=:ventas_idtransaccion_visanet';
		// 	}else{
		// 		$ventas_idtransaccion_visanet="\n".'ventas_idtransaccion_visanet=:ventas_idtransaccion_visanet';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_cliente_email) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_cliente_email="\n".',ventas_cliente_email=:ventas_cliente_email';
		// 	}else{
		// 		$ventas_cliente_email="\n".'ventas_cliente_email=:ventas_cliente_email';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_codigo_accion) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_codigo_accion="\n".',ventas_codigo_accion=:ventas_codigo_accion';
		// 	}else{
		// 		$ventas_codigo_accion="\n".'ventas_codigo_accion=:ventas_codigo_accion';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_motivo_denegacion) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_motivo_denegacion="\n".',ventas_motivo_denegacion=:ventas_motivo_denegacion';
		// 	}else{
		// 		$ventas_motivo_denegacion="\n".'ventas_motivo_denegacion=:ventas_motivo_denegacion';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_fechaanulacion) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_fechaanulacion="\n".',ventas_fechaanulacion=:ventas_fechaanulacion';
		// 	}else{
		// 		$ventas_fechaanulacion="\n".'ventas_fechaanulacion=:ventas_fechaanulacion';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_nombre_comercio) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_nombre_comercio="\n".',ventas_nombre_comercio=:ventas_nombre_comercio';
		// 	}else{
		// 		$ventas_nombre_comercio="\n".'ventas_nombre_comercio=:ventas_nombre_comercio';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_cliente_documento) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_cliente_documento="\n".',ventas_cliente_documento=:ventas_cliente_documento';
		// 	}else{
		// 		$ventas_cliente_documento="\n".'ventas_cliente_documento=:ventas_cliente_documento';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_cliente_tarjeta) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_cliente_tarjeta="\n".',ventas_cliente_tarjeta=:ventas_cliente_tarjeta';
		// 	}else{
		// 		$ventas_cliente_tarjeta="\n".'ventas_cliente_tarjeta=:ventas_cliente_tarjeta';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_codigo_autorizacion) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_codigo_autorizacion="\n".',ventas_codigo_autorizacion=:ventas_cliente_tarjeta';
		// 	}else{
		// 		$ventas_codigo_autorizacion="\n".'ventas_codigo_autorizacion=:ventas_cliente_tarjeta';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_codigo_eci) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_codigo_eci="\n".',ventas_codigo_eci=:ventas_codigo_eci';
		// 	}else{
		// 		$ventas_codigo_eci="\n".'ventas_codigo_eci=:ventas_codigo_eci';
		// 	}
		// 	$contador=$contador+1;
		// }
		// if (is_null($this->ventas_canal) == false) {
		// 	if (1 <= $contador) {
		// 		$ventas_canal="\n".',ventas_canal=:ventas_canal';
		// 	}else{
		// 		$ventas_canal="\n".'ventas_canal=:ventas_canal';
		// 	}
		// 	$contador=$contador+1;
		// }

		// $ventas_nroPedido=(is_null($this->ventas_nroPedido))?'':"\n".'ventas_nroPedido=:ventas_nroPedido';
		// $ventas_cliente_nombre=(is_null($this->ventas_cliente_nombre))?'':"\n".'ventas_cliente_nombre=:ventas_cliente_nombre';
		// $ventas_moneda=(is_null($this->ventas_moneda))?'':"\n".'ventas_moneda=:ventas_moneda';
		// $ventas_importe=(is_null($this->ventas_importe))?'':"\n".'ventas_importe=:ventas_importe';
		// $ventas_marca=(is_null($this->ventas_marca))?'':"\n".'ventas_marca=:ventas_marca';
		// $ventas_fechatransaccion=(is_null($this->ventas_fechatransaccion))?'':"\n".'ventas_fechatransaccion=:ventas_fechatransaccion';
		// $ventas_fechaliquidacion=(is_null($this->ventas_fechaliquidacion))?'':"\n".'ventas_fechaliquidacion=:ventas_fechaliquidacion';
		// $ventas_estado=(is_null($this->ventas_estado))?'':"\n".'ventas_estado=:ventas_estado';
		// $ventas_codigo_comercio=(is_null($this->ventas_codigo_comercio))?'':"\n".'ventas_codigo_comercio=:ventas_codigo_comercio';
		// $ventas_idtransaccion_visanet=(is_null($this->ventas_idtransaccion_visanet))?'':"\n".'ventas_idtransaccion_visanet=:ventas_idtransaccion_visanet';
		// $ventas_cliente_email=(is_null($this->ventas_cliente_email))?'':"\n".'ventas_cliente_email=:ventas_cliente_email';
		// $ventas_codigo_accion=(is_null($this->ventas_codigo_accion))?'':"\n".'ventas_codigo_accion=:ventas_codigo_accion';
		// $ventas_motivo_denegacion=(is_null($this->ventas_motivo_denegacion))?'':"\n".'ventas_motivo_denegacion=:ventas_motivo_denegacion';
		// $ventas_fechaanulacion=(is_null($this->ventas_fechaanulacion))?'':"\n".'ventas_fechaanulacion=:ventas_fechaanulacion';
		// $ventas_nombre_comercio=(is_null($this->ventas_nombre_comercio))?'':"\n".'ventas_nombre_comercio=:ventas_nombre_comercio';
		// $ventas_cliente_documento=(is_null($this->ventas_cliente_documento))?'':"\n".'ventas_cliente_documento=:ventas_cliente_documento';
		// $ventas_cliente_tarjeta=(is_null($this->ventas_cliente_tarjeta))?'':"\n".'ventas_cliente_tarjeta=:ventas_cliente_tarjeta';
		// $ventas_codigo_autorizacion=(is_null($this->ventas_codigo_autorizacion))?'':"\n".'ventas_codigo_autorizacion=:ventas_codigo_autorizacion';
		// $ventas_codigo_eci=(is_null($this->ventas_codigo_eci))?'':"\n".'ventas_codigo_eci=:ventas_codigo_eci';
		// $ventas_canal=(is_null($this->ventas_canal))?'':"\n".'ventas_canal=:ventas_canal';

		//create query
		$query='UPDATE '.$this->table.' set '.
			// $ventas_nroPedido.
			// $ventas_cliente_nombre.
			// $ventas_moneda.
			// $ventas_importe.
			// $ventas_marca.
			// $ventas_fechatransaccion.
			// $ventas_fechaliquidacion.
			// $ventas_estado.
			// $ventas_codigo_comercio.
			// $ventas_idtransaccion_visanet.
			// $ventas_cliente_email.
			// $ventas_codigo_accion.
			// $ventas_motivo_denegacion.
			// $ventas_fechaanulacion.
			// $ventas_nombre_comercio.
			// $ventas_cliente_documento.
			// $ventas_cliente_tarjeta.
			// $ventas_codigo_autorizacion.
			// $ventas_codigo_eci.
			// $ventas_canal.
			// ' where ventas_id=:ventas_id';
			$NombreDeLaColumnaConOsinComa['ventas_nroPedido'].
			$NombreDeLaColumnaConOsinComa['ventas_cliente_nombre'].
			$NombreDeLaColumnaConOsinComa['ventas_moneda'].
			$NombreDeLaColumnaConOsinComa['ventas_importe'].
			$NombreDeLaColumnaConOsinComa['ventas_marca'].
			$NombreDeLaColumnaConOsinComa['ventas_fechatransaccion'].
			$NombreDeLaColumnaConOsinComa['ventas_fechaliquidacion'].
			$NombreDeLaColumnaConOsinComa['ventas_estado'].
			$NombreDeLaColumnaConOsinComa['ventas_codigo_comercio'].
			$NombreDeLaColumnaConOsinComa['ventas_idtransaccion_visanet'].
			$NombreDeLaColumnaConOsinComa['ventas_cliente_email'].
			$NombreDeLaColumnaConOsinComa['ventas_codigo_accion'].
			$NombreDeLaColumnaConOsinComa['ventas_motivo_denegacion'].
			$NombreDeLaColumnaConOsinComa['ventas_fechaanulacion'].
			$NombreDeLaColumnaConOsinComa['ventas_nombre_comercio'].
			$NombreDeLaColumnaConOsinComa['ventas_cliente_documento'].
			$NombreDeLaColumnaConOsinComa['ventas_cliente_tarjeta'].
			$NombreDeLaColumnaConOsinComa['ventas_codigo_autorizacion'].
			$NombreDeLaColumnaConOsinComa['ventas_codigo_eci'].
			$NombreDeLaColumnaConOsinComa['ventas_canal'].
			' where ventas_id=:ventas_id';

		// die(var_dump($query));
		//prepare statement		
		$stmt=$this->conn->prepare($query);
		//clear data
		// $this->ventas_nroPedido=htmlspecialchars(strip_tags($this->ventas_nroPedido));
		// $this->ventas_cliente_nombre=htmlspecialchars(strip_tags($this->ventas_cliente_nombre));
		// $this->ventas_moneda=htmlspecialchars(strip_tags($this->ventas_moneda));
		// $this->ventas_importe=htmlspecialchars(strip_tags($this->ventas_importe));
		// $this->ventas_marca=htmlspecialchars(strip_tags($this->ventas_marca));
		// $this->ventas_fechatransaccion=htmlspecialchars(strip_tags($this->ventas_fechatransaccion));
		// $this->ventas_fechaliquidacion=htmlspecialchars(strip_tags($this->ventas_fechaliquidacion));
		// $this->ventas_estado=htmlspecialchars(strip_tags($this->ventas_estado));
		// $this->ventas_codigo_comercio=htmlspecialchars(strip_tags($this->ventas_codigo_comercio));
		// $this->ventas_idtransaccion_visanet=htmlspecialchars(strip_tags($this->ventas_idtransaccion_visanet));
		// $this->ventas_cliente_email=htmlspecialchars(strip_tags($this->ventas_cliente_email));
		// $this->ventas_codigo_accion=htmlspecialchars(strip_tags($this->ventas_codigo_accion));
		// $this->ventas_motivo_denegacion=htmlspecialchars(strip_tags($this->ventas_motivo_denegacion));
		// $this->ventas_fechaanulacion=htmlspecialchars(strip_tags($this->ventas_fechaanulacion));
		// $this->ventas_nombre_comercio=htmlspecialchars(strip_tags($this->ventas_nombre_comercio));
		// $this->ventas_cliente_documento=htmlspecialchars(strip_tags($this->ventas_cliente_documento));
		// $this->ventas_cliente_tarjeta=htmlspecialchars(strip_tags($this->ventas_cliente_tarjeta));
		// $this->ventas_codigo_autorizacion=htmlspecialchars(strip_tags($this->ventas_codigo_autorizacion));
		// $this->ventas_codigo_eci=htmlspecialchars(strip_tags($this->ventas_codigo_eci));
		// $this->ventas_canal=htmlspecialchars(strip_tags($this->ventas_canal));
		// $this->ventas_id=htmlspecialchars(strip_tags($this->ventas_id));

		//binding of parameters
		if (is_null($this->ventas_nroPedido) == false) {
			$stmt->bindParam(':ventas_nroPedido',$this->ventas_nroPedido);
		}
		if (is_null($this->ventas_cliente_nombre) == false) {
			$stmt->bindParam(':ventas_cliente_nombre',$this->ventas_cliente_nombre);
		}	
		if (is_null($this->ventas_moneda) == false) {
			$stmt->bindParam(':ventas_moneda',$this->ventas_moneda);
		}		
		if (is_null($this->ventas_importe) == false) {
			$stmt->bindParam(':ventas_importe',$this->ventas_importe);
			$contador=$contador+1;
		}	
		if (is_null($this->ventas_marca) == false) {
			$stmt->bindParam(':ventas_marca',$this->ventas_marca);
		}		
		if (is_null($this->ventas_fechatransaccion) == false) {
			$stmt->bindParam(':ventas_fechatransaccion',$this->ventas_fechatransaccion);
		}
		if (is_null($this->ventas_fechaliquidacion) == false) {
			$stmt->bindParam(':ventas_fechaliquidacion',$this->ventas_fechaliquidacion);
		}
		if (is_null($this->ventas_estado) == false) {
			$stmt->bindParam(':ventas_estado',$this->ventas_estado);
		}
		if (is_null($this->ventas_codigo_comercio) == false) {
			$stmt->bindParam(':ventas_codigo_comercio',$this->ventas_codigo_comercio);
		}
		if (is_null($this->ventas_idtransaccion_visanet) == false) {
			$stmt->bindParam(':ventas_idtransaccion_visanet',$this->ventas_idtransaccion_visanet);
		}
		if (is_null($this->ventas_cliente_email) == false) {
			$stmt->bindParam(':ventas_cliente_email',$this->ventas_cliente_email);
		}
		if (is_null($this->ventas_codigo_accion) == false) {
			$stmt->bindParam(':ventas_codigo_accion',$this->ventas_codigo_accion);
		}
		if (is_null($this->ventas_motivo_denegacion) == false) {
			$stmt->bindParam(':ventas_motivo_denegacion',$this->ventas_motivo_denegacion);
		}
		if (is_null($this->ventas_fechaanulacion) == false) {
			$stmt->bindParam(':ventas_fechaanulacion',$this->ventas_fechaanulacion);
		}
		if (is_null($this->ventas_nombre_comercio) == false) {
			$stmt->bindParam(':ventas_nombre_comercio',$this->ventas_nombre_comercio);
		}
		if (is_null($this->ventas_cliente_documento) == false) {
			$stmt->bindParam(':ventas_cliente_documento',$this->ventas_cliente_documento);
		}
		if (is_null($this->ventas_cliente_tarjeta) == false) {
			$stmt->bindParam(':ventas_cliente_tarjeta',$this->ventas_cliente_tarjeta);
		}
		if (is_null($this->ventas_codigo_autorizacion) == false) {
			$stmt->bindParam(':ventas_codigo_autorizacion',$this->ventas_codigo_autorizacion);
		}
		if (is_null($this->ventas_codigo_eci) == false) {
			$stmt->bindParam(':ventas_codigo_eci',$this->ventas_codigo_eci);
		}
		if (is_null($this->ventas_canal) == false) {
			$stmt->bindParam(':ventas_canal',$this->ventas_canal);
		}		
		$stmt->bindParam(':ventas_id',$this->ventas_id);
		// die(var_dump($stmt));

		//execute the queery
		if ($stmt->execute()) {
			return true;
		}
		//print error if something goes wrong
		printf('error %s. \n',$stmt->error);
		return false;
	}

	public function delete(){
		$query = 'delete from '.$this->table.' where ventas_id=:p_ventas_id';
		$stmt = $this->conn->prepare($query);
		// $this->id=htmlspecialchars(strip_tags($this->id));
		$stmt->bindParam(':p_ventas_id',$this->ventas_id);
		if ($stmt->execute()) {
			return true;
		}
		printf('error %s. \n', $stmt->error);
		return false;		
	}
}

?>