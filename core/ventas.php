<?php 
ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);

class ventas {
	//db stuff
	public $conn;
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

	// public function read_single(){
	// 	$query='select 
	// 		c.name as category_name,
	// 		p.id,
	// 		p.category_id,
	// 		p.title,
	// 		p.body,
	// 		p.author,
	// 		p.created_at
	// 		from 
	// 		'.$this->table.' p
	// 		left join
	// 		categories c on p.category_id=c.id
	// 		where p.id=? LIMIT 1';
	// 	//prepare statement
	// 	$stmt = $this->conn->prepare($query);
	// 	//binding param
	// 	$stmt->bindParam(1,$this->id);
	// 	//execute the query
	// 	$stmt->execute();

	// 	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	// 	$this->title=$row['title'];
	// 	$this->body=$row['body'];
	// 	$this->author=$row['author'];
	// 	$this->category_id=$row['category_id'];
	// 	$this->category_name=$row['category_name'];
	// }

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
		// if (is_null($this->ventas_fechatransaccion)==false) {
		// 	die('no es nulo');
		// }else{
		// 	die('es nulo');
		// }

		$ventas_fechatransaccion=(is_null($this->ventas_fechatransaccion))?'':"\n".'ventas_fechatransaccion=:ventas_fechatransaccion,';
		$ventas_fechaliquidacion=(is_null($this->ventas_fechaliquidacion))?'':"\n".'ventas_fechaliquidacion=:ventas_fechaliquidacion,';
		$ventas_estado=(is_null($this->ventas_estado))?'':"\n".'ventas_estado=:ventas_estado,';
		$ventas_fechaanulacion=(is_null($this->ventas_fechaanulacion))?'':"\n".'ventas_fechaanulacion=:ventas_fechaanulacion,';
		//create query
		$query='UPDATE '.$this->table.' set 
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
			ventas_canal=:ventas_canal
			where ventas_id=:ventas_id';
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
		$this->ventas_id=htmlspecialchars(strip_tags($this->ventas_id));

		//binding of parameters
		$stmt->bindParam(':ventas_nroPedido',$this->ventas_nroPedido);
		$stmt->bindParam(':ventas_cliente_nombre',$this->ventas_cliente_nombre);
		$stmt->bindParam(':ventas_moneda',$this->ventas_moneda);
		$stmt->bindParam(':ventas_importe',$this->ventas_importe);
		$stmt->bindParam(':ventas_marca',$this->ventas_marca);
		if (is_null($this->ventas_fechatransaccion)==false) {
			// $stmt->bindParam(':ventas_fechatransaccion',$this->ventas_fechatransaccion);
			die('no es nulo, $stmt...');
		}else{
			die('es nulo continua....');
		}
		// if ($this->ventas_fechaliquidacion != null) {
		// 	$stmt->bindParam(':ventas_fechaliquidacion',$this->ventas_fechaliquidacion);
		// }
		// if ($this->ventas_estado != null) {
		// 	$stmt->bindParam(':ventas_estado',$this->ventas_estado);
		// }
		// $stmt->bindParam(':ventas_fechaliquidacion',$this->ventas_fechaliquidacion);
		// $stmt->bindParam(':ventas_estado',$this->ventas_estado);
		$stmt->bindParam(':ventas_codigo_comercio',$this->ventas_codigo_comercio);
		$stmt->bindParam(':ventas_idtransaccion_visanet',$this->ventas_idtransaccion_visanet);
		$stmt->bindParam(':ventas_cliente_email',$this->ventas_cliente_email);
		$stmt->bindParam(':ventas_codigo_accion',$this->ventas_codigo_accion);
		$stmt->bindParam(':ventas_motivo_denegacion',$this->ventas_motivo_denegacion);
		// if ($this->ventas_fechaanulacion != null) {
		// 	$stmt->bindParam(':ventas_fechaanulacion',$this->ventas_fechaanulacion);
		// }
		// $stmt->bindParam(':ventas_fechaanulacion',$this->ventas_fechaanulacion);
		$stmt->bindParam(':ventas_nombre_comercio',$this->ventas_nombre_comercio);
		$stmt->bindParam(':ventas_cliente_documento',$this->ventas_cliente_documento);
		$stmt->bindParam(':ventas_cliente_tarjeta',$this->ventas_cliente_tarjeta);
		$stmt->bindParam(':ventas_codigo_autorizacion',$this->ventas_codigo_autorizacion);
		$stmt->bindParam(':ventas_codigo_eci',$this->ventas_codigo_eci);
		$stmt->bindParam(':ventas_canal',$this->ventas_canal);
		$stmt->bindParam(':ventas_id',$this->ventas_id);
		die(var_dump($stmt));

		//execute the queery
		if ($stmt->execute()) {
			return true;
		}
		//print error if something goes wrong
		printf('error %s. \n',$stmt->error);
		return false;
	}
}

?>